<?php

namespace App\Repositories;

use App\Contracts\Repositories\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


class BookRepositories extends GeneralRepositories implements BookRepositoryInterface
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function link($data)
    {
        $user = auth()->user();
        $user->books()->attach($data['book_id'],['start_page' => $data['start_page'],'end_page' => $data['end_page']]);
        return 1;
    }

    public function checkConflict($data)
    {
       return DB::table('book_user')->where('user_id',auth()->user()->id)->whereBetween('start_page',[$data['start_page'],$data['end_page']])
           ->orWhereBetween('end_page',[$data['start_page'],$data['end_page']])->first();
    }

    public function top()
    {
        return DB::select("with recursive  t as(
  select book_id,start_page,max(end_page)end_page
    ,row_number()over(partition by book_id order by start_page) rn
  from book_user
  group by book_id,start_page
)
,r as(
  select 0 lvl,bu.book_id,bu.start_page,bu.end_page,bu.rn
  from t bu
  where not exists(select 1 from t bu2
         where bu2.book_id=bu.book_id and bu2.rn<bu.rn
           and bu.start_page between bu2.start_page and bu2.end_page)
  union all
  select lvl+1,r.book_id,r.start_page,t.end_page,t.rn
  from r inner join t on t.book_id=r.book_id and t.rn>r.rn
       and r.end_page between t.start_page and r.end_page
)
select books.name book_name,book_id,sum(end_page-start_page+1) total_pages
from (select book_id,start_page,max(end_page) end_page
      from r
      group by book_id,start_page
  ) gr JOIN books ON gr.book_id = books.id
group by book_id");
    }
}

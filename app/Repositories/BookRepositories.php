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
        return DB::table(`book_user`)->select(DB::raw("'book_id',books.name as book_name,SUM(end_page - start_page) AS num_of_read_pages FROM book_user JOIN books ON books.id=book_user.book_id GROUP BY book_id ORDER BY num_of_read_pages DESC"))->get();
    }
}

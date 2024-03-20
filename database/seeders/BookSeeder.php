<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [['id'=>'1','name'=>'book 1'],['id'=>'2','name'=>'book 2'],['id'=>'3','name'=>'book 3'],['id'=>'4','name'=>'book 4'],['id'=>'5','name'=>'book 5'],
            ['id'=>'6','name'=>'book 6'],['id'=>'7','name'=>'book 7'],['id'=>'8','name'=>'book 8'],['id'=>'9','name'=>'book 9'],['id'=>'10','name'=>'book 10']];
        DB::table('books')->insert($data);
    }
}

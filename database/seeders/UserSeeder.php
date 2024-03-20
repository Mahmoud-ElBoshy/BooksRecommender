<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id'=>'1','name'=>'user 1','email'=>'user1@users.com','password'=>Hash::make('password')],
            ['id'=>'2','name'=>'user 2','email'=>'user2@users.com','password'=>Hash::make('password')],
            ['id'=>'3','name'=>'user 3','email'=>'user3@users.com','password'=>Hash::make('password')]
        ];
        DB::table('users')->insert($data);
    }
}

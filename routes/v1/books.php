<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Book', 'as' => 'book.','middleware'=>'auth:sanctum'], function () {
    Route::post('read', 'BookController@submit')
        ->name('books.submit');

    Route::get('read/top', 'BookController@top')
        ->name('books.top');
});

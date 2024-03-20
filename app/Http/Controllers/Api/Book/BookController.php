<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\BookReaderRequest;
use App\Services\BookService;

class BookController extends BaseApiController
{
    private $bookService;


    public function __construct(BookService $bookService)
    {
        parent::__construct();
        $this->bookService = $bookService;
    }
    public function submit(BookReaderRequest $request)
    {
        $data = $request->validated();
        $submitted = $this->bookService->submit($data);
        return response()->json($submitted);

    }



    public function top()
    {

    }


}

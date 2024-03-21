<?php

namespace App\Services;

use App\Contracts\Repositories\BookRepositoryInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class BookService
{
    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function submit($data)
    {
       if ($this->bookRepository->checkConflict($data))
           return "you can't read the same page twice";
       if ($this->bookRepository->link($data))
       {
           if(App::environment('local'))
          $sent_sms = Http::post(config('booksrecommender.sms_key_test'),['success' => 1]);
              else
          $sent_sms = Http::post(config('booksrecommender.sms_key_prod'),['success' => 1]);
       }
        else
            'something went wrong';
        return 'Your pages interval has been submitted successfully';

    }

    public function top()
    {
        return $this->bookRepository->top();
    }
}

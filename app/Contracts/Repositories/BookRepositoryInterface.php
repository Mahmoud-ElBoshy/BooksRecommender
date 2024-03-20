<?php

namespace App\Contracts\Repositories;

interface BookRepositoryInterface
{
    public function checkConflict($data);
    public function link($data);

}

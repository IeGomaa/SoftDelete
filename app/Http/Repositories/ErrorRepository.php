<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ErrorInterface;

class ErrorRepository implements ErrorInterface
{

    public function page_not_found()
    {
        return view('error.404');
    }
}

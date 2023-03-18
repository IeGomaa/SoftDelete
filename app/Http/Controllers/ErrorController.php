<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ErrorInterface;

class ErrorController extends Controller
{
    private $errorInterface;
    public function __construct(ErrorInterface $interface)
    {
        $this->errorInterface = $interface;
    }

    public function page_not_found()
    {
        return $this->errorInterface->page_not_found();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\HomeInterface;

class HomeController extends Controller
{
    private $homeInterface;
    public function __construct(HomeInterface $interface)
    {
        $this->homeInterface = $interface;
    }

    public function index()
    {
        return $this->homeInterface->index();
    }
}

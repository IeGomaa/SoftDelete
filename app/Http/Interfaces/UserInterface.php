<?php

namespace App\Http\Interfaces;

interface UserInterface
{
    public function index();
    public function create();
    public function store($request);
    public function delete($request);
}

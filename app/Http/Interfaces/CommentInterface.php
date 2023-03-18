<?php

namespace App\Http\Interfaces;

interface CommentInterface
{
    public function index();
    public function create();
    public function store($request);
    public function delete($request);
    public function forceDelete($request);
    public function edit($request);
    public function update($request);
}

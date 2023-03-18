<?php

namespace App\Http\Interfaces;

interface PostInterface
{
    public function index();
    public function create();
    public function store($request, $service);
    public function delete($request);
    public function forceDelete($request, $service);
    public function edit($request);
    public function update($request, $service);
}

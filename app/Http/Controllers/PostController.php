<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PostInterface;
use App\Http\Requests\Post\CheckPostIdRequest;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Services\Post\PostCheckImageService;
use App\Http\Services\Post\PostDeleteImageService;
use App\Http\Services\Post\PostUploadImageService;

class PostController extends Controller
{
    private $postInterface;
    public function __construct(PostInterface $interface)
    {
        $this->postInterface = $interface;
    }

    public function index()
    {
        return $this->postInterface->index();
    }

    public function create()
    {
        return $this->postInterface->create();
    }

    public function store(CreatePostRequest $request, PostUploadImageService $service)
    {
        return $this->postInterface->store($request, $service);
    }

    public function delete(CheckPostIdRequest $request)
    {
        return $this->postInterface->delete($request);
    }

    public function forceDelete(CheckPostIdRequest $request, PostDeleteImageService $service)
    {
        return $this->postInterface->forceDelete($request, $service);
    }

    public function edit(CheckPostIdRequest $request)
    {
        return $this->postInterface->edit($request);
    }

    public function update(UpdatePostRequest $request, PostCheckImageService $service)
    {
        return $this->postInterface->update($request, $service);
    }
}

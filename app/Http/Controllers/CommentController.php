<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CommentInterface;
use App\Http\Requests\Comment\CheckCommentIdRequest;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;

class CommentController extends Controller
{
    private $commentInterface;
    public function __construct(CommentInterface $interface)
    {
        $this->commentInterface = $interface;
    }

    public function index()
    {
        return $this->commentInterface->index();
    }

    public function create()
    {
        return $this->commentInterface->create();
    }

    public function store(CreateCommentRequest $request)
    {
        return $this->commentInterface->store($request);
    }

    public function delete(CheckCommentIdRequest $request)
    {
        return $this->commentInterface->delete($request);
    }

    public function forceDelete(CheckCommentIdRequest $request)
    {
        return $this->commentInterface->forceDelete($request);
    }

    public function edit(CheckCommentIdRequest $request)
    {
        return $this->commentInterface->edit($request);
    }

    public function update(UpdateCommentRequest $request)
    {
        return $this->commentInterface->update($request);
    }
}

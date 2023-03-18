<?php

namespace App\Http\Traits;

trait CommentTrait
{
    private function getComments()
    {
        return $this->commentModel::withTrashed()->with(['user', 'post'])->get();
    }

    private function findCommentById($id)
    {
        return $this->commentModel::with(['user', 'post'])->find($id);
    }
}

<?php

namespace App\Http\Traits;

trait PostTrait
{
    private function getPosts()
    {
        return $this->postModel::withTrashed()->get();
    }

    private function findPostById($id)
    {
        return $this->postModel::find($id);
    }
}

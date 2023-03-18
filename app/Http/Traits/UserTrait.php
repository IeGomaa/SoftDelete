<?php

namespace App\Http\Traits;

trait UserTrait
{
    private function getUsers()
    {
        return $this->userModel::get();
    }

    private function findUserById($id)
    {
        return $this->userModel::find($id);
    }
}

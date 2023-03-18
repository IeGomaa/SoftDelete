<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UserInterface;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
    private $userInterface;
    public function __construct(UserInterface $interface)
    {
        $this->userInterface = $interface;
    }

    public function index()
    {
        return $this->userInterface->index();
    }

    public function create()
    {
        return $this->userInterface->create();
    }

    public function store(CreateUserRequest $request)
    {
        return $this->userInterface->store($request);
    }

    public function delete(DeleteUserRequest $request)
    {
        return $this->userInterface->delete($request);
    }
}

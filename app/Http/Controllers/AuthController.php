<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $authInterface;
    public function __construct(AuthInterface $interface)
    {
        $this->authInterface = $interface;
    }

    public function index()
    {
        return $this->authInterface->index();
    }

    public function login(LoginRequest $request)
    {
        return $this->authInterface->login($request);
    }

    public function logout()
    {
        return $this->authInterface->logout();
    }
}

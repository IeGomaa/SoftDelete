<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface
{
    public function index()
    {
        return view('auth.index');
    }

    public function login($request)
    {
        $credentials = $request->only(['email', 'password']);
        if (auth()->attempt($credentials)) {
            return redirect(route('admin.index'));
        }
        return redirect(route('auth.index'));
    }

    public function logout()
    {
        Session::flush();
        auth()->logout();
        return redirect(route('auth.index'));
    }
}

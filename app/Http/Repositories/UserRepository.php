<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UserInterface;
use App\Http\Traits\UserTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    private $userModel;
    use UserTrait;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index()
    {
        $users = $this->getUsers();
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store($request)
    {
        $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect(route('admin.user.index'));
    }

    public function delete($request)
    {
        $this->findUserById($request->id)->delete();
        return back();
    }
}

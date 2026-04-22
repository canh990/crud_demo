<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash ;


class CrudUserController extends Controller
{
    public function listUser()
    {
        return view('dashboard');
    }

    public function createUser()
    {
        return view('auth.register');
    }
      public function showRegister()
    {
        return view('crud_user.register');
    }

    public function readUser(User $user)
    {
        return view('crud_user.show', ['user' => $user]);
    }

    public function editUser(User $user)
    {
        return view('crud_user.edit', ['user' => $user]);
    }

    public function saveUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email,' . $user->id],
            'like' => ['nullable', 'string', 'max:255'],
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

}

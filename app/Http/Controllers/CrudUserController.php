<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
     public function login()
    {
        return view('crud_user.login');
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')->withSuccess('Signed in');
        }
        return redirect()->back()->withErrors(['email' => 'Login details are not valid']);
    }

    public function createUser()
    {
        return view('auth.register');
    }
      public function showRegister()
    {
        return view('crud_user.register');
    }
       /**
     * List of users
     */
   public function listUser()
{
    $users = User::all();
    return view('crud_user.list', compact('users'));
}
    /**
     * Sign out
     */

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

}

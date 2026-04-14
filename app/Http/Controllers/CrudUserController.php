<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    public function listUser()
    {
        $users = User::all();
        return view('crud_user.list', ['users' => $users]);
    }
  
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}

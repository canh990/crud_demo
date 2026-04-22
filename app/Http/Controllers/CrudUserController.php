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
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
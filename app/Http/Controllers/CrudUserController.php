<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CrudUserController extends Controller
{
    public function listUser()
    {
        $users = User::orderBy('id')->paginate(10);

        return view('crud_user.list', ['users' => $users]);
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

        $user->update($validated);

        return redirect()
            ->route('user.list')
            ->with('success', 'Cập nhật người dùng thành công.');
    }

    public function deleteUser(User $user)
    {
        $userName = $user->name;
        $user->delete();

        return redirect()
            ->route('user.list')
            ->with('success', "Đã xóa người dùng {$userName}.");
    }
    //  public function signOut()
    // {
    //     Session::flush();
    //     Auth::logout();
    //     return Redirect('login');
    // }
}

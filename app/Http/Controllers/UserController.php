<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index() 
    {
        $users = User::all();
        return view('crud_users.index', compact('users'));
    }

    // Hiển thị form đăng ký
    public function create() 
    {
        return view('crud_users.register');
    }

    // Lưu người dùng mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/users')->with('success', 'Người dùng được tạo thành công!');
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('crud_users.edit', compact('user'));
    }

    // Cập nhật người dùng
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'phone', 'address'));

        return redirect('/users')->with('success', 'Cập nhật thành công!');
    }

    // Xóa người dùng
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/users')->with('success', 'Xóa thành công!');
    }

    // Hiển thị chi tiết người dùng
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('crud_users.show', compact('user'));
    }
}

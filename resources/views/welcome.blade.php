<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        body { background: white; color: black; }
        a { color: black; text-decoration: none; }
        a:hover { color: white; background: black; padding: 2px 5px; }
        button, .btn { background: white; color: black; border: 1px solid black; padding: 5px 10px; cursor: pointer; }
        button:hover, .btn:hover { background: black; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hệ thống quản lý người dùng</h1>
        <p>Chào mừng bạn đến với ứng dụng quản lý người dùng!</p>
        <p>Sử dụng các chức năng dưới đây để quản lý dữ liệu người dùng.</p>
        
        <div class="links">
            <a href="{{ route('users.index') }}">Danh sách người dùng</a>
            <a href="{{ route('users.create') }}">Thêm người dùng</a>
            <a href="{{ route('register') }}">Đăng ký</a>
        </div>
    </div>
</body>
</html>
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.read', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);

       $user = User::find($input['id']);
       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = $input['password'];
       $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * List of users
     */
    public function listUser()
    {
//        $users = [
//                'users' => User::all()
//        ];
//        return view('crud_user.ronaldo', $users);

        if(Auth::check()){
            $users = User::all();
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
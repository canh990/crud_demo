<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa người dùng</title>
    <style>
        body { background: white; color: black; }
        a { color: black; text-decoration: none; }
        a:hover { color: white; background: black; padding: 2px 5px; }
        button, .btn { background: white; color: black; border: 1px solid black; padding: 5px 10px; cursor: pointer; }
        button:hover, .btn:hover { background: black; color: white; }
        input, textarea { background: white; color: black; border: 1px solid black; padding: 5px; }
        input:focus, textarea:focus { outline: 2px solid black; }
        label { display: block; margin: 5px 0; }
    </style>
</head>
<body>
    <div class="header">
        <a href="/">← Trang chủ</a>
        <a href="{{ route('users.index') }}">← Danh sách</a>
    </div>

    <div class="container">
        <h2>Chỉnh sửa người dùng</h2>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" placeholder="Nhập tên" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Nhập email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Điện thoại:</label>
                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <textarea id="address" name="address" placeholder="Nhập địa chỉ" rows="3">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">Cập nhật</button>
                <a href="{{ route('users.index') }}" class="btn btn-cancel">Hủy</a>
            </div>
        </form>
    </div>
</body>
</html>
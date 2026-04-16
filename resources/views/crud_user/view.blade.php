<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết người dùng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    <header class="navbar">
        <a href="{{ route('home') }}">Home</a> |
        <a href="{{ route('signout') }}">Đăng xuất</a>
    </header>

    <main class="login-box">
        <h2>Màn hình chi tiết</h2>

        <div class="info-group">
            <span class="label">Username</span>
            <span class="value">{{ $user->name }}</span>
        </div>

        <div class="info-group">
            <span class="label">Email</span>
            <span class="value">{{ $user->email }}</span>
        </div>

        <div class="actions">
            <a href="{{ route('user.updateUser', $user->id) }}">
                <button class="btn-login">Chỉnh sửa</button>
            </a>
        </div>
    </main>

    <footer class="footer">Lập trình web @03/2026</footer>
</div>

</body>
</html>
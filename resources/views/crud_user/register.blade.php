<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Màn hình đăng ký</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .nav-bar {
            border: 1px solid #999;
            text-align: center;
            padding: 10px;
            margin-bottom: 40px;
            font-size: 14px;
        }

        .nav-bar strong {
            font-weight: bold;
        }

        .form-box {
            border: 1px solid #999;
            max-width: 450px;
            margin: 0 auto 40px auto;
            padding: 30px;
        }

        .form-box h2 {
            text-align: center;
            font-size: 18px;
            font-weight: normal;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 100px;
            font-size: 14px;
            color: #333;
            line-height: 1.4;
        }

        .form-group input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            outline: none;
        }

        .form-group input:focus {
            border-color: #0056b3;
        }

        .error-text {
            display: block;
            margin-top: 6px;
            color: #d9534f;
            font-size: 13px;
        }

        .alert {
            border: 1px solid #d4edda;
            background-color: #d4edda;
            color: #155724;
            padding: 12px 14px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
            margin-top: 30px;
        }

        .actions a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .actions button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 8px 20px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #004494;
        }

        .footer {
            border: 1px solid #999;
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="nav-bar">
           <a href="{{ route('login') }}">Home</a> | <a href="{{ route('login') }}">Đăng nhập</a> | <strong>Đăng ký</strong>
        </div>

        <div class="form-box">
            <h2>Màn hình đăng ký</h2>

            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                @error('name')
                    <span class="error-text">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" required>
                </div>
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="password_confirmation">Nhập lại<br>mật khẩu</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="actions">
                    <a href="{{ route('login') }}">Đã có tài khoản</a>
                    <button type="submit">Đăng ký</button>
                </div>
            </form>
        </div>

        <div class="footer">
            Lập trình web @01/2024
        </div>
    </div>

</body>
</html>

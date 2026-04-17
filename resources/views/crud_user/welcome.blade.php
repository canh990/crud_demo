<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - CRUD Demo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: white;
            padding: 60px 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 600px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 32px;
        }

        p {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
            line-height: 1.6;
        }

        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background-color: #764ba2;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #653a7e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
        }

        .features {
            margin-top: 50px;
            text-align: left;
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 5px;
        }

        .features h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .features ul {
            list-style: none;
            color: #666;
        }

        .features li {
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .features li:before {
            content: "✓ ";
            color: #667eea;
            font-weight: bold;
            margin-right: 10px;
        }

        .features li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 Welcome to CRUD Demo</h1>
        <p>Ứng dụng quản lý người dùng hoàn chỉnh với chức năng thêm, sửa, xóa và xem chi tiết.</p>
        
        <div class="buttons">
            <a href="/login" class="btn btn-primary">Đăng Nhập</a>
            <a href="/register" class="btn btn-secondary">Đăng Ký</a>
        </div>

        <div class="features">
            <h2>✨ Tính Năng</h2>
            <ul>
                <li>Quản lý người dùng</li>
                <li>Đăng nhập/Đăng ký</li>
                <li>Xem danh sách</li>
                <li>Xem chi tiết</li>
                <li>Chỉnh sửa thông tin</li>
                <li>Xóa người dùng</li>
            </ul>
        </div>
    </div>
</body>
</html>

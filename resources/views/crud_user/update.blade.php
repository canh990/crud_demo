<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa người dùng</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #333;
            padding: 15px 20px;
            color: white;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #667eea;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: 'Arial', sans-serif;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #FF9800;
            box-shadow: 0 0 5px rgba(255, 152, 0, 0.3);
        }

        .btn-submit {
            background-color: #FF9800;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .btn-submit:hover {
            background-color: #e68900;
        }

        .btn-cancel {
            background-color: #999;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-cancel:hover {
            background-color: #777;
        }

        .help-text {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/list">← Quay lại</a> | 
        <a href="/list"><strong>Danh sách</strong></a> | 
        <a href="/logout">Đăng xuất</a>
    </div>

    <div class="container">
        <h2>Chỉnh sửa người dùng</h2>

        <?php if($user): ?>
            <form action="/update" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="name" placeholder="Nhập tên" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="phone">Điện thoại:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <textarea id="address" name="address" placeholder="Nhập địa chỉ" rows="3"><?php echo htmlspecialchars($user['address'] ?? ''); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu mới (để trống nếu không thay đổi)">
                    <div class="help-text">Để trống nếu không muốn thay đổi mật khẩu</div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-submit">Cập nhật</button>
                    <a href="/list" class="btn-cancel">Hủy</a>
                </div>
            </form>
        <?php else: ?>
            <p>Không tìm thấy người dùng</p>
        <?php endif; ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết người dùng</title>
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

        .detail-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
        }

        .info-row {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-row:last-of-type {
            border-bottom: none;
        }

        .info-label {
            font-weight: bold;
            color: #666;
            min-width: 120px;
        }

        .info-value {
            color: #333;
            flex: 1;
            text-align: right;
        }

        .button-group {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            background-color: #FF9800;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-edit:hover {
            background-color: #e68900;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-delete:hover {
            background-color: #da190b;
        }

        .btn-back {
            background-color: #999;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #777;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/list">← Quay lại</a> | 
        <a href="/list"><strong>Danh sách</strong></a> | 
        <a href="/logout">Đăng xuất</a>
    </div>

    <div class="detail-container">
        <h2>Chi tiết người dùng</h2>

        <?php if($user): ?>
            <div class="info-row">
                <span class="info-label">ID:</span>
                <span class="info-value"><?php echo htmlspecialchars($user['id']); ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Tên:</span>
                <span class="info-value"><?php echo htmlspecialchars($user['name']); ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value"><?php echo htmlspecialchars($user['email']); ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Điện thoại:</span>
                <span class="info-value"><?php echo htmlspecialchars($user['phone'] ?? '-'); ?></span>
            </div>

            <div class="info-row">
                <span class="info-label">Địa chỉ:</span>
                <span class="info-value"><?php echo htmlspecialchars($user['address'] ?? '-'); ?></span>
            </div>

            <div class="button-group">
                <a href="/update?id=<?php echo $user['id']; ?>" class="btn-edit">Chỉnh sửa</a>
                <a href="/delete?id=<?php echo $user['id']; ?>" class="btn-delete" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                <a href="/list" class="btn-back">Quay lại</a>
            </div>
        <?php else: ?>
            <p>Không tìm thấy người dùng</p>
        <?php endif; ?>
    </div>
</body>
</html>

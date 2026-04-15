-- ==========================================
-- 0. CHUẨN BỊ HỆ THỐNG (ĐỨNG TỪ MASTER ĐỂ TẠO MỚI)
-- ==========================================

USE master;
GO

-- Kiểm tra nếu database đã tồn tại thì xóa đi để làm mới hoàn toàn
IF EXISTS (SELECT name FROM sys.databases WHERE name = 'laptrinhweb')
BEGIN
    -- Ngắt kết nối tất cả người dùng khác để có thể xóa database mà không bị lỗi "in use"
    ALTER DATABASE laptrinhweb SET SINGLE_USER WITH ROLLBACK IMMEDIATE;
    DROP DATABASE laptrinhweb;
END
GO

-- Tạo database mới
CREATE DATABASE laptrinhweb;
GO

-- Sử dụng database vừa tạo để bắt đầu tạo bảng
USE laptrinhweb;
GO

-- ==========================================
-- 1. XÓA BẢNG CŨ NẾU ĐÃ TỒN TẠI (ĐỂ TRÁNH LỖI TRÙNG TÊN)
-- ==========================================
IF OBJECT_ID('order_details', 'U') IS NOT NULL DROP TABLE order_details;
IF OBJECT_ID('orders', 'U') IS NOT NULL DROP TABLE orders;
IF OBJECT_ID('products', 'U') IS NOT NULL DROP TABLE products;
IF OBJECT_ID('users', 'U') IS NOT NULL DROP TABLE users;
GO

-- ==========================================
-- 2. TẠO CẤU TRÚC BẢNG (CHO SQL SERVER)
-- ==========================================

-- Tạo bảng Users
CREATE TABLE users (
    user_id INT IDENTITY(1,1) PRIMARY KEY,
    user_name NVARCHAR(25) NOT NULL,
    user_email NVARCHAR(55) NOT NULL,
    user_pass NVARCHAR(255) NOT NULL,
    updated_at DATETIME DEFAULT GETDATE(),
    created_at DATETIME DEFAULT GETDATE()
);

-- Tạo bảng Products
CREATE TABLE products (
    product_id INT IDENTITY(1,1) PRIMARY KEY,
    product_name NVARCHAR(255) NOT NULL,
    product_price FLOAT NOT NULL,
    product_description NVARCHAR(MAX) NOT NULL,
    updated_at DATETIME DEFAULT GETDATE(),
    created_at DATETIME DEFAULT GETDATE()
);

-- Tạo bảng Orders
CREATE TABLE orders (
    order_id INT IDENTITY(1,1) PRIMARY KEY,
    user_id INT NOT NULL,
    updated_at DATETIME DEFAULT GETDATE(),
    created_at DATETIME DEFAULT GETDATE(),
    CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Tạo bảng Order Details
CREATE TABLE order_details (
    order_detail_id INT IDENTITY(1,1) PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    updated_at DATETIME DEFAULT GETDATE(),
    created_at DATETIME DEFAULT GETDATE(),
    CONSTRAINT fk_details_order FOREIGN KEY (order_id) REFERENCES orders(order_id),
    CONSTRAINT fk_details_product FOREIGN KEY (product_id) REFERENCES products(product_id)
);
GO

-- ==========================================
-- 3. CHÈN DỮ LIỆU MẪU (DUMMY DATA)
-- ==========================================

-- Chèn mẫu Users
INSERT INTO users (user_name, user_email, user_pass) VALUES 
(N'minh_anh', N'minh_anh@gmail.com', N'123456'),
(N'mạnh_hùng', N'hung@gmail.com', N'123456'),
(N'thu_thủy', N'thuy@yahoo.com', N'123456'),
(N'hoàng_nam', N'nam_i@gmail.com', N'123456'),
(N'anh_tuan', N'tuan@gmail.com', N'123456');

-- Chèn mẫu Products
INSERT INTO products (product_name, product_price, product_description) VALUES 
(N'iPhone 15 Pro Max', 30000000, N'Apple product'),
(N'Samsung Galaxy S24', 25000000, N'Samsung product'),
(N'Oppo Reno 11', 15000000, N'Oppo product'),
(N'Macbook M3', 45000000, N'Apple product');

-- Chèn mẫu Orders
INSERT INTO orders (user_id) VALUES (1), (1), (2), (4);

-- Chèn mẫu Order Details
INSERT INTO order_details (order_id, product_id) VALUES 
(1, 1), (1, 2),
(2, 4),
(3, 1),
(4, 2);
GO
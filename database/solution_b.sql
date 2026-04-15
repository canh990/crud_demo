
USE laptrinhweb;
GO

-- 1. Liệt kê các hóa đơn của khách hàng, thông tin hiển thị gồm: mã user, tên user, mã hóa đơn
SELECT u.user_id, u.user_name, o.order_id 
FROM users u 
INNER JOIN orders o ON u.user_id = o.user_id;

-- 2. Liệt kê số lượng các hóa đơn của khách hàng: mã user, tên user, số đơn hàng
SELECT u.user_id, u.user_name, COUNT(o.order_id) AS so_don_hang
FROM users u 
LEFT JOIN orders o ON u.user_id = o.user_id 
GROUP BY u.user_id, u.user_name;

-- 3. Liệt kê thông tin hóa đơn: mã đơn hàng, số sản phẩm trong đơn đó
SELECT order_id, COUNT(product_id) AS so_san_pham
FROM order_details
GROUP BY order_id;

-- 4. Liệt kê thông tin mua hàng của người dùng: mã user, tên user, mã đơn hàng, tên sản phẩm. 
-- Lưu ý: gom nhóm theo đơn hàng, tránh hiển thị xen kẽ các đơn hàng với nhau
SELECT u.user_id, u.user_name, o.order_id, p.product_name
FROM users u
INNER JOIN orders o ON u.user_id = o.user_id
INNER JOIN order_details od ON o.order_id = od.order_id
INNER JOIN products p ON od.product_id = p.product_id
ORDER BY o.order_id;

-- 5. Liệt kê 7 người dùng có số lượng đơn hàng nhiều nhất, thông tin hiển thị gồm: mã user, tên user, số lượng đơn hàng
SELECT TOP 7 u.user_id, u.user_name, COUNT(o.order_id) AS so_luong_don_hang
FROM users u
INNER JOIN orders o ON u.user_id = o.user_id
GROUP BY u.user_id, u.user_name
ORDER BY so_luong_don_hang DESC;

-- 6. Liệt kê 7 người dùng mua sản phẩm có tên: Samsung hoặc Apple trong tên sản phẩm, 
-- thông tin hiển thị gồm: mã user, tên user, mã đơn hàng, tên sản phẩm
SELECT DISTINCT TOP 7 u.user_id, u.user_name, o.order_id, p.product_name
FROM users u
INNER JOIN orders o ON u.user_id = o.user_id
INNER JOIN order_details od ON o.order_id = od.order_id
INNER JOIN products p ON od.product_id = p.product_id
WHERE p.product_name LIKE '%Samsung%' OR p.product_name LIKE '%Apple%';

-- 7. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, 
-- thông tin hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền
SELECT u.user_id, u.user_name, o.order_id, SUM(p.product_price) AS tong_tien
FROM users u
INNER JOIN orders o ON u.user_id = o.user_id
INNER JOIN order_details od ON o.order_id = od.order_id
INNER JOIN products p ON od.product_id = p.product_id
GROUP BY u.user_id, u.user_name, o.order_id;

-- 8. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, 
-- hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền. Mỗi user chỉ chọn ra 1 đơn hàng có giá tiền lớn nhất.
SELECT user_id, user_name, order_id, tong_tien
FROM (
    SELECT u.user_id, u.user_name, o.order_id, SUM(p.product_price) AS tong_tien,
           ROW_NUMBER() OVER(PARTITION BY u.user_id ORDER BY SUM(p.product_price) DESC) as rn
    FROM users u
    INNER JOIN orders o ON u.user_id = o.user_id
    INNER JOIN order_details od ON o.order_id = od.order_id
    INNER JOIN products p ON od.product_id = p.product_id
    GROUP BY u.user_id, u.user_name, o.order_id
) AS t WHERE rn = 1;

-- 9. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, 
-- hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền, số sản phẩm. 
-- Mỗi user chỉ chọn ra 1 đơn hàng có giá tiền nhỏ nhất.
SELECT user_id, user_name, order_id, tong_tien, so_sp
FROM (
    SELECT u.user_id, u.user_name, o.order_id, SUM(p.product_price) AS tong_tien, COUNT(od.product_id) as so_sp,
           ROW_NUMBER() OVER(PARTITION BY u.user_id ORDER BY SUM(p.product_price) ASC) as rn
    FROM users u
    INNER JOIN orders o ON u.user_id = o.user_id
    INNER JOIN order_details od ON o.order_id = od.order_id
    INNER JOIN products p ON od.product_id = p.product_id
    GROUP BY u.user_id, u.user_name, o.order_id
) AS t WHERE rn = 1;

-- 10. Liệt kê danh sách mua hàng của user bao gồm giá tiền của mỗi đơn hàng, 
-- hiển thị gồm: mã user, tên user, mã đơn hàng, tổng tiền, số sản phẩm. 
-- Mỗi user chỉ chọn ra 1 đơn hàng có số sản phẩm nhiều nhất.
SELECT user_id, user_name, order_id, tong_tien, so_sp
FROM (
    SELECT u.user_id, u.user_name, o.order_id, SUM(p.product_price) AS tong_tien, COUNT(od.product_id) as so_sp,
           ROW_NUMBER() OVER(PARTITION BY u.user_id ORDER BY COUNT(od.product_id) DESC) as rn
    FROM users u
    INNER JOIN orders o ON u.user_id = o.user_id
    INNER JOIN order_details od ON o.order_id = od.order_id
    INNER JOIN products p ON od.product_id = p.product_id
    GROUP BY u.user_id, u.user_name, o.order_id
) AS t WHERE rn = 1;
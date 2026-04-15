
USE laptrinhweb;
GO

-- 1. Lấy ra danh sách người dùng theo thứ tự tên theo Alphabet (A->Z)
SELECT * FROM users 
ORDER BY user_name ASC;

-- 2. Lấy ra 07 người dùng theo thứ tự tên theo Alphabet (A->Z)
-- Trong SQL Server dùng TOP thay cho LIMIT
SELECT TOP 7 * FROM users 
ORDER BY user_name ASC;

-- 3. Lấy ra danh sách người dùng theo thứ tự tên theo Alphabet (A->Z), tên có chứa chữ 'a'
SELECT * FROM users 
WHERE user_name LIKE '%a%' 
ORDER BY user_name ASC;

-- 4. Lấy ra danh sách người dùng trong đó tên bắt đầu bằng chữ 'm'
SELECT * FROM users 
WHERE user_name LIKE 'm%';

-- 5. Lấy ra danh sách người dùng trong đó tên kết thúc bằng chữ 'i'
SELECT * FROM users 
WHERE user_name LIKE '%i';

-- 6. Lấy ra danh sách người dùng trong đó email là Gmail
SELECT * FROM users 
WHERE user_email LIKE '%@gmail.com';

-- 7. Lấy ra danh sách người dùng trong đó email là Gmail và tên bắt đầu bằng chữ 'm'
SELECT * FROM users 
WHERE user_email LIKE '%@gmail.com' AND user_name LIKE 'm%';

-- 8. Email là Gmail, tên có chứa chữ 'i' và chiều dài tên lớn hơn 5 ký tự
SELECT * FROM users 
WHERE user_email LIKE '%@gmail.com' 
  AND user_name LIKE '%i%' 
  AND LEN(user_name) > 5;

-- 9. Tên có chữ 'a', dài từ 5-9 ký tự, email Gmail, tên email (trước @) có chữ 'i'
SELECT * FROM users 
WHERE user_name LIKE '%a%' 
  AND LEN(user_name) BETWEEN 5 AND 9 
  AND user_email LIKE '%i%@gmail.com';

-- 10. (Tên có 'a' dài 5-9) HOẶC (Tên có 'i' dài < 9) HOẶC (Email Gmail có chữ 'i')
SELECT * FROM users 
WHERE (user_name LIKE '%a%' AND LEN(user_name) BETWEEN 5 AND 9)
   OR (user_name LIKE '%i%' AND LEN(user_name) < 9)
   OR (user_email LIKE '%i%@gmail.com');
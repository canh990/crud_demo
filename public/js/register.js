// register.js

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const emailInput = document.getElementById("email");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // chặn reload trang

        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();
        const confirmPassword = confirmPasswordInput.value.trim();
        const email = emailInput.value.trim();
        // Kiểm tra rỗng
        if (username === "" || password === "" || confirmPassword === "" || email === "") {
            alert("Vui lòng nhập đầy đủ thông tin!");
            return;
        }
        // Kiểm tra mật khẩu khớp
        if (password !== confirmPassword) {
            alert("Mật khẩu không khớp!");
            return;
        }

        // Kiểm tra định dạng email đơn giản
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Email không hợp lệ!");
            return;
        }

        // Nếu tất cả các điều kiện đều được thỏa mãn, có thể gửi dữ liệu lên server ở đây
        // Ví dụ: sử dụng fetch hoặc XMLHttpRequest để gửi dữ liệu
        alert("Đăng ký thành công!");
        window.location.href = './index.html';
    });
});
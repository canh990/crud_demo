// Simple login simulation
document.addEventListener('DOMContentLoaded', function() {
    console.log('Login script loaded');
    const form = document.querySelector('form');
    console.log('Form found:', form);
    form.addEventListener('submit', function(e) {
        console.log('Form submitted');
        e.preventDefault();
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        console.log('Username:', username, 'Password:', password);
        // Simple validation (in real app, check with server)
        if (username && password) {
            // Simulate successful login
            alert('Đăng nhập thành công!');
            window.location.href = './list.html';
        } else {
            alert('Vui lòng nhập username và mật khẩu!');
        }
    });
});
// update.js

const STORAGE_KEY = 'crud_demo_users';

function loadUsers() {
    const data = localStorage.getItem(STORAGE_KEY);
    return data ? JSON.parse(data) : [
        { id: 1, username: 'UPVH', email: 'ATJW@gmail.com', password: '123456' },
        { id: 2, username: 'IFUK', email: 'KULB@gmail.com', password: '123456' },
        { id: 3, username: 'DZZQ', email: 'ERNB@gmail.com', password: '123456' },
        { id: 4, username: 'NJYY', email: 'ROIF@gmail.com', password: '123456' },
        { id: 5, username: 'YUMG', email: 'KITN@gmail.com', password: '123456' },
        { id: 6, username: 'WZSU', email: 'CVTL@gmail.com', password: '123456' },
        { id: 7, username: 'WXFQ', email: 'MIUZ@gmail.com', password: '123456' },
        { id: 8, username: 'XZOR', email: 'YZLV@gmail.com', password: '123456' },
        { id: 9, username: 'HGGO', email: 'OYYX@gmail.com', password: '123456' },
        { id: 10, username: 'PXZX', email: 'YSML@gmail.com', password: '123456' }
    ];
}

function saveUsers(users) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(users));
}

function getUserIdFromQuery() {
    return parseInt(new URLSearchParams(window.location.search).get('id'), 10);
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const emailInput = document.getElementById('email');
    const userIdInput = document.getElementById('userId');

    const users = loadUsers();
    const userId = getUserIdFromQuery();
    const user = users.find(item => item.id === userId);

    if (!user) {
        alert('Không tìm thấy người dùng cần sửa.');
        window.location.href = './list.html';
        return;
    }

    usernameInput.value = user.username;
    passwordInput.value = user.password || '';
    confirmPasswordInput.value = user.password || '';
    emailInput.value = user.email;
    userIdInput.value = user.id;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();
        const confirmPassword = confirmPasswordInput.value.trim();
        const email = emailInput.value.trim();

        if (username === '' || password === '' || confirmPassword === '' || email === '') {
            alert('Vui lòng nhập đầy đủ thông tin!');
            return;
        }
        if (password !== confirmPassword) {
            alert('Mật khẩu không khớp!');
            return;
        }
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Email không hợp lệ!');
            return;
        }

        const index = users.findIndex(item => item.id === user.id);
        if (index === -1) {
            alert('Không tìm thấy người dùng để cập nhật.');
            return;
        }

        users[index] = {
            id: user.id,
            username,
            email,
            password
        };

        saveUsers(users);
        alert('Cập nhật thành công!');
        window.location.href = './list.html';
    });
});

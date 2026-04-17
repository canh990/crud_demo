<?php

// Simple session start
session_start();

// Database
$db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Parse request
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$query = [];
parse_str($_SERVER['QUERY_STRING'] ?? '', $query);

// Routes
$route = null;
$found = false;

// Handle routes
switch ($uri) {
    case '/':
        $route = 'welcome';
        $found = true;
        break;
    case '/login':
        if ($method === 'GET') {
            $route = 'login';
            $found = true;
        }
        break;
    case '/auth-user':
        if ($method === 'POST') {
            // Handle login
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: /list');
                exit;
            } else {
                $_SESSION['error'] = 'Invalid credentials';
                header('Location: /login');
                exit;
            }
        }
        break;
    case '/register':
        if ($method === 'GET') {
            $route = 'register';
            $found = true;
        } elseif ($method === 'POST') {
            // Handle registration
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            
            try {
                $stmt = $db->prepare('INSERT INTO users (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$name, $email, password_hash($password, PASSWORD_BCRYPT), $phone, $address]);
                $_SESSION['success'] = 'Registration successful! Please login.';
                header('Location: /login');
                exit;
            } catch (Exception $e) {
                $_SESSION['error'] = 'Email already exists';
                header('Location: /register');
                exit;
            }
        }
        break;
    case '/list':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $stmt = $db->query('SELECT * FROM users');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $route = 'list';
        $found = true;
        break;
    case '/logout':
        session_destroy();
        header('Location: /login');
        exit;
        break;
    case '/read':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $id = $query['id'] ?? 0;
        $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $route = 'read';
        $found = true;
        break;
    case '/update':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        if ($method === 'GET') {
            $id = $query['id'] ?? 0;
            $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $route = 'update';
            $found = true;
        } elseif ($method === 'POST') {
            $id = $_POST['id'] ?? 0;
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $address = $_POST['address'] ?? '';
            $password = $_POST['password'] ?? '';
            
            try {
                if ($password) {
                    $stmt = $db->prepare('UPDATE users SET name = ?, email = ?, phone = ?, address = ?, password = ? WHERE id = ?');
                    $stmt->execute([$name, $email, $phone, $address, password_hash($password, PASSWORD_BCRYPT), $id]);
                } else {
                    $stmt = $db->prepare('UPDATE users SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?');
                    $stmt->execute([$name, $email, $phone, $address, $id]);
                }
                $_SESSION['success'] = 'User updated successfully!';
                header('Location: /list');
                exit;
            } catch (Exception $e) {
                $_SESSION['error'] = 'Error updating user';
                header('Location: /update?id=' . $id);
                exit;
            }
        }
        break;
    case '/delete':
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $id = $query['id'] ?? 0;
        try {
            $stmt = $db->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$id]);
            $_SESSION['success'] = 'User deleted successfully!';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error deleting user';
        }
        header('Location: /list');
        exit;
        break;
}

if (!$found) {
    // Try to serve static file
    if (file_exists(__DIR__ . $uri) && is_file(__DIR__ . $uri)) {
        return false;
    }
    http_response_code(404);
    echo "404 - Not Found";
    exit;
}

// Load view
$viewPath = __DIR__ . '/../resources/views/crud_user/' . $route . '.blade.php';
if (file_exists($viewPath)) {
    ob_start();
    include $viewPath;
    echo ob_get_clean();
} else {
    echo "View not found: " . $route;
}
?>

<?php
// Tạo database SQLite
$dbPath = __DIR__ . '/database/database.sqlite';

try {
    // Tạo file database nếu chưa tồn tại
    if (!file_exists($dbPath)) {
        touch($dbPath);
    }
    
    // Kết nối tới SQLite
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Tạo bảng users
    $sql = "
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        phone VARCHAR(20),
        address TEXT,
        remember_token VARCHAR(100),
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )
    ";
    
    $pdo->exec($sql);
    
    echo "✓ Database created successfully!\n";
    echo "✓ Users table created!\n";
    
    // Insert sample data
    $stmt = $pdo->prepare("INSERT OR IGNORE INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
    $stmt->execute(['Test User', 'test@example.com', password_hash('password123', PASSWORD_BCRYPT), '0123456789']);
    
    echo "✓ Sample user added!\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\nDatabase setup completed!\n";
?>

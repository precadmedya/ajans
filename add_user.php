<?php
// Örnek kullanıcı ekleme dosyası. Gerçek projede yönetici paneli üzerinden eklenebilir.
$dsn = 'mysql:host=localhost;dbname=ajans;charset=utf8';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Veritabanı bağlantı hatası: ' . $e->getMessage());
}

// Yeni kullanıcı bilgileri
$agency_name = 'Örnek Ajans';
$email = 'test@example.com';
$password = password_hash('parola', PASSWORD_BCRYPT);

$stmt = $pdo->prepare('INSERT INTO users (agency_name, email, password) VALUES (?,?,?)');
$stmt->execute([$agency_name, $email, $password]);

echo "Kullanıcı eklendi";

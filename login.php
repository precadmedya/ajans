<?php
session_start();
// Basit PDO baglantisi
$dsn = 'mysql:host=localhost;dbname=ajans;charset=utf8';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Veritabanı bağlantı hatası: ' . $e->getMessage());
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['agency_name'] = $user['agency_name'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Hatalı e-posta veya şifre';
        }
    } else {
        $error = 'Lütfen tüm alanları doldurun';
    }
}
?>
<?php include 'header.php'; ?>
<form method="POST" action="">
    <h2>Giriş Yap</h2>
    <?php if($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <input type="email" name="email" placeholder="E-posta" required>
    <input type="password" name="password" placeholder="Şifre" required>
    <button type="submit">Giriş Yap</button>
</form>
<?php include 'footer.php'; ?>

<?php
// Basit header dosyasi. session_start bu dosyada cagirilmaz.
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Yazilim Ustasi Panel</title>
</head>
<body>
<header>
    <div>
        <img src="logo-placeholder.png" alt="Yazilim Ustasi">
    </div>
    <div>
        <?php if(isset($_SESSION['agency_name'])): ?>
        <a href="logout.php">
            <?php echo htmlspecialchars($_SESSION['agency_name']); ?> - Çıkış
        </a>
        <?php endif; ?>
    </div>
</header>
<main>

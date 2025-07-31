<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<?php include 'header.php'; ?>
<h1>Hoş geldiniz</h1>
<?php include 'footer.php'; ?>

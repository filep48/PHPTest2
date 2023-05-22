<?php
session_start();

$admin_username = 'admin';
$admin_password = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['username'] = $username;
        header('Location: form.php');
        exit();
    } else {
        $message = 'Usuario o contraseña incorrectos.';
        header('Location: index.php?message=' . urlencode($message));
        exit();
    }
}
?>
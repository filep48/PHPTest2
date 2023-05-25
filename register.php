<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //Guardado de datos en la sesion
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    
    header('Location: form.php?message=Registro exitoso');
    exit();
}
?>

<!DOCTYPE html>
<html lang ="es">
<head>
    <meta charset='utf-8'>
    <title>Registro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-container">
        <h1>Registro de Usuario</h1>
        <form method="POST" action="">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <br>
        <input type="password" name="password" placeholder="Contraseña" required>
        <br>
        <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>

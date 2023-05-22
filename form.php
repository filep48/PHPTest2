<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <title>Bienvenido/a!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php if (isset($_SESSION['username'])) : ?>
        <header>Bienvenido/a <?php echo $_SESSION['username']; ?>!</header>
        <p>Has iniciado sesión correctamente.</p>
        <p>Esto es una página de ejemplo.</p>
        <p>Para cerrar sesión, haz clic en el siguiente botón:</p>
        <a href="logout.php"><button>Cerrar sesión</button></a>
    <?php else : ?>
        <p>No has iniciado sesión.</p>
        <a href="index.php"><button>Iniciar sesión</button></a>
    <?php endif; ?>
</body>
</html>
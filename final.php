<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header('Location: index.php');
    exit();
}

// Función para cerrar la sesión
function tancarSessio() {
    session_unset();
    session_destroy();
    header('Location: exitSession.php');
    exit();
}

// Verificar si se ha solicitado cerrar la sesión
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    tancarSessio();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Final</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="?logout=true">Cerrar sesión</a>
    </header>

    <h1>Datos del formulario:</h1>
    <div>
        <p>Correo electronico: <?php echo $_SESSION['email']; ?></p>
    </div>
    <div>
        <p>Data: <?php echo $_SESSION['date']; ?></p>
    </div>
    <div>
        <p>Opción seleccionada:
        <?php echo $_SESSION['radio']; ?></p>
    </div>
    <div>
        <p>Opciones del radio seleccionada s:
        <?php echo implode(', ', $_SESSION['checkbox']); ?></p>
    </div>
    <div>
        <p>Opciones del select:
        <?php echo implode(', ', $_SESSION['select']); ?></p>
    </div>
</body>

</html>

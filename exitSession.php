<?php
session_start();

// Verificar si la sesión está activa
if (!isset($_SESSION['username'])) {
    // Si la sesión no está activa, redirigir al inicio
    header("Location: index.php");
    exit();
}

// Obtener el nombre de usuario de la sesión
$usuari = $_SESSION['username'];

// Destruir la sesión
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Despedida</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header></header>
    <div class="login-container">
        <h1>Despedida</h1>
        <div class="despedida">
            <p>Hasta otra,
                <?php echo $usuari; ?>!
            </p>
        </div>
        <a href="index.php" class="register">Volver al inicio</a>
    </div>
</body>

</html>
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
<html>
<head>
    <title>Final</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Benvingut, <?php echo $_SESSION['usuari']; ?>!</h1>
        <a href="?logout=true">Tanca sessió</a>
    </header>

    <h1>Dades del formulari:</h1>
    <div>
        <p>Correu electrònic: <?php echo $_SESSION['email']; ?></p>
    </div>
    <div>
        <p>Data: <?php echo $_SESSION['date']; ?></p>
    </div>
    <div>
        <p>Opció seleccionada:
        <?php echo $_SESSION['radio']; ?></p>
    </div>
    <div>
        <p>Opcions seleccionades:
        <?php echo implode(', ', $_SESSION['checkbox']); ?></p>
    </div>
    <div>
        <p>Opcions del select:
        <?php echo implode(', ', $_SESSION['select']); ?></p>
    </div>
</body>
</html>

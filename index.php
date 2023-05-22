<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio de sesión</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="login-container">
        <h1>Inicio de sesión</h1>
        <?php if (isset($_GET['message'])): ?>
            <p class="message">
                <?php echo $_GET['message']; ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>

</html>
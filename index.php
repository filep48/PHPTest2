<?php
session_start();
$admin_username = 'admin';
$admin_password = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username === $admin_username && $password === $admin_password) {
		$_SESSION['username'] = $username;
		header('Location: form.php?message=Inicio de sesión exitoso');
		exit();
	} else {
		$message = 'Usuario o contraseña incorrectos.';
	}
}
function isUserLoggedIn()
{
	return isset($_SESSION['username']);
}

// Comprobar si el usuario ya ha iniciado sesión
if (isUserLoggedIn()) {
	header('Location: form.php?message=Ya has iniciado sesión');
	exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset='utf-8'>
	<title>Iniciar sesión</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<header></header>
	<div class="login-container">
		<h1>Iniciar sesión</h1>
		<?php if (isset($message)): ?>
			<p class="message">
				<?php echo $message; ?>
			</p>
		<?php endif; ?>
		<form method="POST" action="index.php">
			<input type="text" name="username" placeholder="Nombre de usuario" required>
			<br>
			<input type="password" name="password" placeholder="Contraseña" required>
			<br>
			<button type="submit">Iniciar sesión</button>
			<div class="a-button-container">
				<p>¿No tienes cuenta?</p>
				<a href="register.php" class="register">Regístrate aquí</a>
			</div>
		</form>
	</div>
</body>

</html>
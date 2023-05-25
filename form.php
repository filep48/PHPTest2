<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header('Location: index.php');
    exit();
} elseif (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    tancarSessio();
}


// Función para verificar el formato del correo electrónico
function verificarCorreo($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para cerrar la sesión
function tancarSessio()
{
    session_unset();
    session_destroy();
    header('Location: exitSession.php');
    exit();
}

// Función para hacer que la sesión caduque después de 5 minutos de inactividad
function caducarSessio()
{
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
        session_unset();
        session_destroy();
        header('Location: index.php?message=La sessió ha caducat');
        exit();
    }

    $_SESSION['last_activity'] = time();
}
caducarSessio();

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $email = $_POST['email'];
    $date = $_POST['date'];
    $radio = $_POST['radio'];
    $checkbox = isset($_POST['checkbox']) ? $_POST['checkbox'] : [];
    $select = isset($_POST['select']) ? $_POST['select'] : [];

    // Verificar el formato del correo electrónico
    if (!verificarCorreo($email)) {
        $errorMessage = 'L\'adreça no és correcta.';
    } else {
        // Guardar los valores en la sesión
        $_SESSION['email'] = $email;
        $_SESSION['date'] = $date;
        $_SESSION['radio'] = $radio;
        $_SESSION['checkbox'] = $checkbox;
        $_SESSION['select'] = $select;

        // Redireccionar a la página final.php
        header('Location: final.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulari</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <?php echo $_SESSION['username']; ?>
        <a href="exitSession.php">Tancar Sessió</a>
    </header>

    <div class="login-container">
        <?php if (isset($errorMessage)): ?>
            <p class="message">
                <?php echo $errorMessage; ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="form.php">
            <input type="text" name="email" placeholder="Correu electrònic"
                value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
            <input type="date" name="date" value="<?php echo isset($_SESSION['date']) ? $_SESSION['date'] : ''; ?>"
                required>

            <p>Opcions de radio:</p>
            <input type="radio" name="radio" value="1" 
            <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == '1') ? 'checked' : ''; ?>>
            <input type="radio" name="radio" value="2" 
            <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == '2') ? 'checked' : ''; ?>>
            <input type="radio" name="radio" value="3" 
            <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == '3') ? 'checked' : ''; ?>>
            <input type="radio" name="radio" value="4" 
            <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == '4') ? 'checked' : ''; ?>>
            <input type="radio" name="radio" value="5" 
            <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == '5') ? 'checked' : ''; ?>>

            <p>Opcions de checkbox:</p>
            <input type="checkbox" name="checkbox[]" value="1" 
            <?php echo (isset($_SESSION['checkbox']) && in_array('1', $_SESSION['checkbox'])) ? 'checked' : ''; ?>>
            <input type="checkbox" name="checkbox[]" value="2" 
            <?php echo (isset($_SESSION['checkbox']) && in_array('2', $_SESSION['checkbox'])) ? 'checked' : ''; ?>>
            <input type="checkbox" name="checkbox[]" value="3" 
            <?php echo (isset($_SESSION['checkbox']) && in_array('3', $_SESSION['checkbox'])) ? 'checked' : ''; ?>>
            <input type="checkbox" name="checkbox[]" value="4" 
            <?php echo (isset($_SESSION['checkbox']) && in_array('4', $_SESSION['checkbox'])) ? 'checked' : ''; ?>>
            <input type="checkbox" name="checkbox[]" value="5" 
            <?php echo (isset($_SESSION['checkbox']) && in_array('5', $_SESSION['checkbox'])) ? 'checked' : ''; ?>>

            <select name="select[]" multiple>
                <option value="1" 
                <?php echo (isset($_SESSION['select']) && 
                in_array('1', $_SESSION['select'])) ? 'selected' : ''; ?>>Opció 1</option>
                <option value="2" 
                <?php echo (isset($_SESSION['select']) && 
                in_array('2', $_SESSION['select'])) ? 'selected' : ''; ?>>Opció 2</option>
                <option value="3" 
                <?php echo (isset($_SESSION['select']) && 
                in_array('3', $_SESSION['select'])) ? 'selected' : ''; ?>>Opció 3</option>
                <option value="4" 
                <?php echo (isset($_SESSION['select']) && 
                in_array('4', $_SESSION['select'])) ? 'selected' : ''; ?>>Opció 4</option>
                <option value="5" 
                <?php echo (isset($_SESSION['select']) && 
                in_array('5', $_SESSION['select'])) ? 'selected' : ''; ?>>Opció 5</option>
            </select>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>

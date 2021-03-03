<?php
/**
 * 
 * @author Rafa Caballero
 */
require('Usuario.php');
$userInstance = Usuario::getInstancia();
session_start();

function clearData($cadena) {
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena_limpia);
    $cadena_limpia = stripslashes($cadena_limpia);
    return $cadena;
}

// Inicio de sesión en la recarga
if (isset($_POST['user'])) {
    $user = clearData($_POST['user']);
    $pass = clearData($_POST['pass']);
    $userDB = $userInstance->getByUser($user);
    if ($userDB[0]['pass'] == $pass) {
        $_SESSION['id'] = $userDB[0]['id'];
        $_SESSION['username'] = $userDB[0]['user'];
        $_SESSION['userrole'] = $userDB[0]['role'];
        header('Location: index.php');
    } else {
        $error = "Datos incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión - Superhéroes</h1>
    <?php
    echo "<form method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
    ?>
        <input type="text" name="user" id="user" placeholder="Usuario"><br/>
        <input type="password" name="pass" id="pass" placeholder="Contraseña"><br/>
        <input type="submit" value="Iniciar sesión">
    </form>
    <p><?php $error; ?></p>
</body>
</html>
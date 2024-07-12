<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 06 - Login - Error</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_error.css'>
</head>

<body>
<?php

// Da fallo de exceso de redirecciones
// include 'proceso.php';

$user = 'user12345';
$password = 'admin12345';
$receivedUser = $_GET['user'];
$receivedPassword = $_GET['password'];
$error = '';

if (empty($receivedUser)) {
    $error .= 'No has introducido el usuario' . '<br>';
} else if ($receivedUser != $user) {
    $error .= 'Usuario incorrecto' . '<br>';
}

if (empty($receivedPassword)) {
    $error .= 'No has introducido la contraseña' . '<br>';
} else if ($receivedPassword != $password) {
    $error .= 'Contraseña incorrecta';
}

echo '<p>' . $error . '</p>';

?>
<a href="home.php">Volver</a>
</body>

</html>

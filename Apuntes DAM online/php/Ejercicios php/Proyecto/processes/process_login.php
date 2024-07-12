<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Process</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../processes_styles/process_style.css'>
</head>

<body>
<a href="../pages/login.html">Volver</a>

<?php

if (!isset($_POST['submit'])) {
    echo '<h2>ERROR 404: NOT FOUND</h2>';
    exit();
}

if (!isset($_POST['user']) || !isset($_POST['password'])) {
    echo '<h2>ERROR AL PROCESAR EL FORMULARIO</h2>';
    exit();
}

$user = 'user12345';
$password = 'admin12345';
$userEntered = $_POST['user'];
$passwordEntered = $_POST['password'];

if ($userEntered === $user && $passwordEntered === $password) {
    header('location: ../pages/panel.php?submit=submit');
} else {
    showErrors($userEntered, $user, $passwordEntered, $password);
}

function showErrors(mixed $userEntered, string $user, mixed $passwordEntered, string $password): void
{
    $errorOutput = '';

    if (empty($userEntered)) {
        $errorOutput .= 'No has introducido el usuario' . '</br>';
    } else if ($userEntered != $user) {
        $errorOutput .= 'Usuario incorrecto' . '</br>';
    }

    if (empty($passwordEntered)) {
        $errorOutput .= 'No has introducido la contraseña';
    } else if ($passwordEntered != $password) {
        $errorOutput .= 'Contraseña incorrecta';
    }

    echo '<h2>' . $errorOutput . '</h2>';
}

?>

</body>

</html>

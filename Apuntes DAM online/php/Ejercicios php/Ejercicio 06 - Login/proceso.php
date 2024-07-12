<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 06 - Login - Proceso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

<?php

$user = 'user12345';
$password = 'admin12345';

if (isset($_GET['user']) && isset($_GET['password'])) {
    if (($_GET['user'] === $user) && ($_GET['password'] === $password)) {
        header('location: mipagina.php');
    } else {
        header("location: error_login.php?user=$_GET[user]&password=$_GET[password]");
    }
}

?>
</body>

</html>

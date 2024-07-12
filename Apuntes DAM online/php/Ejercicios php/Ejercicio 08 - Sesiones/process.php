<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Ejercicio 08 - Sesiones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
            rel="stylesheet"
            type="text/css"
            media="screen"
            href="process_style.css"
    />
</head>

<body>
<main>
    <a href="login.html">Volver</a>
</main>
</body>

</html>

<?php

if (isset($_GET['send'])) {
    session_start();

    if (isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
    } else {
        $_SESSION['attempts'] = 1;
    }

    $attempts = 5;
    $login = 'user12345';
    $password = 'admin12345';

    if (isset($_COOKIE['waitTwoMinutes'])) {
        echo "<h2>Debes esperar 2 minutos para que puedas volver a hacer login</h2>";
    } else {
        $loginEntered = $_GET['login'];
        $passwordEntered = $_GET['password'];

        if (empty($loginEntered) || ($loginEntered != $login) ||
            empty($passwordEntered) || ($passwordEntered != $password)) {
            $errors = '';
            $attempts = 5 - $_SESSION['attempts'];

            if (empty($loginEntered)) {
                $errors = '<h3>Usuario vacío</h3>';

            } else if ($loginEntered != $login) {
                $errors .= '<h3>Usuario incorrecto</h3>';
            }

            if (empty($passwordEntered)) {
                $errors .= '<h3>Contraseña vacía</h3>';
            } else if ($passwordEntered != $password) {
                $errors .= '<h3>Contraseña incorrecta</h3>';
            }

            echo $errors;

            if ($attempts <= 0) {
                echo "<p>Ya no te queda ningún intento</p>";

                setcookie("waitTwoMinutes", $attempts, time() + 60 * 2);

                // Se resetea el valor de la variable
                $_SESSION['attempts'] = 1;
            } else {
                echo "<p>Número de intentos restantes: $attempts</p>";
            }
        } else {
            echo "<h2>Bienvenido $loginEntered</h2>";

            // Se destruye la variable
            unset($_SESSION['attempts']);
        }
    }
} else {
    echo "<h2>ERROR 404: NOT FOUND</h2>";
}
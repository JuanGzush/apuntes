<?php

// Comprobar si se ha aceptado (si he pulsado)
// Si se ha generado defino la cookie.
if (isset($_GET['aceptar'])) {
    // Definimos la caducidad por un año
    $caducidad = time() + (60 * 60 * 24 * 365);
    // Crea una cookie llamada micookie
    setcookie('micookie', '1', $caducidad);
}

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
<div>
    <!-- Si no hemos definido la variable aceptar y no he definido la cookie -->
    <!-- Si no está definida en nuestro array de cookies -->
    <?php if (!isset($_GET['aceptar']) && !isset($_COOKIE['micookie'])) : ?>
        <!-- Mensaje de cookies -->
        <div class="cookies">
            <h2>Cookies</h2>
            <p>Debes aceptar las cookies para poder seguir navegando</p>
            <!-- Pasamos el parámetro aceptar=1 -->
            <a href="?aceptar=1">Aceptar</a>
        </div>
    <?php endif; ?>
</div>
</body>

</html>

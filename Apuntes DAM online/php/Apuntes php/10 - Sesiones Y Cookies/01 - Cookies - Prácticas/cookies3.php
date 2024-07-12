<?php

// ¿Tenemos habilitadas las cookies en el navegador?
// ¿Nuestro array Cookie tiene alguna definida?
if (count($_COOKIE) > 0) {
    echo "Cookies habilitadas.";
} else {
    echo "Cookies deshabilitadas.";
}

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
Cambiar la configuración de Cookies en Chrome
</body>

</html>

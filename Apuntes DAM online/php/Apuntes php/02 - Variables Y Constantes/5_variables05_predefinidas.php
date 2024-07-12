<?php
//VARIABLES PREDEFINIDAS, SUPERGLOBALES

/*
 En php hay muchas variables predefinidas disponibles. Contienen información
 sobre el servidor, datos enviados por el cliente o variables de retorno.
 Dentro de ellas hay un grupo que son las superglobales, que están disponible en
 Cualquier ámbito.
 Por ejemplo, en $_SERVER hay información sobre el servidor que está alojada la página.

https://www.php.net/manual/es/language.variables.superglobals
*/

echo "Ruta dentro de htdocs: " . $_SERVER['PHP_SELF'];
echo "<br>";
echo "Nombre del servidor: " . $_SERVER['SERVER_NAME'];
echo "<br>";
echo "Software del servidor: " . $_SERVER['SERVER_SOFTWARE'];
echo "<br>";
echo "Protocolo: " . $_SERVER['SERVER_PROTOCOL'];
echo "<br>";
echo "Método de la petición: " . $_SERVER['REQUEST_METHOD'];
echo "<br>";

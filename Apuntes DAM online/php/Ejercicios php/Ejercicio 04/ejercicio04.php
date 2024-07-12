<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 04</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
<?php

/*
 * 01. Crea un Array con valores de distinto tipo (int, float, string, null) e imprime en pantalla
 * el tipo de cada uno de sus valores. Cada tipo debe aparecer en una línea diferente.
 */

$array = [1, 1.1, "Hola", null];

echo "<pre>";
var_dump($array);
echo "</pre>";

echo "<br><br>";

/*
 * 02. Dado el siguiente array:

 $capitales = array(
    "espana" => "madrid",
    "francia" => "paris",
    "escocia" => "edimburgo",
    "Gales" => "Cardiff"
 );

 * y haciendo uso de las estructuras de control iterativas que conozcas imprime lo siguiente:
 * ​ El pais/nación ___ tiene como capital. (la capital debe estar en negrita)
 * Imprime una frase por cada iteración del array.
 */

$capitales = array(
    "espana" => "madrid",
    "francia" => "paris",
    "escocia" => "edimburgo",
    "Gales" => "Cardiff"
);

foreach ($capitales as $key => $value) {
    echo "El país $key tiene como capital <strong>$value</strong><br>";
}

?>
</body>

</html>

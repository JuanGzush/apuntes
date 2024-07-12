<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 02</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<main>
    <a href="index.html">Volver</a>
</main>
</body>

</html>

<?php

use Medoo\Medoo;

include('utils.php');
include('Medoo.php');

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'ejemplo',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

$result = $database->select(
    'hospitales',
    '*',
    ['ORDER' => 'num_plazas']);

$caption = 'listado de los hospitales';
$headers = ['COD HOSPITAL', 'NOMBRE', 'DIRECCIÓN', 'NUM_PLAZAS'];
$numHosp = sizeof($result);

echo createTableFromArray($result, $caption, $headers);

echo "<p>Número de hospitales: $numHosp</p>";

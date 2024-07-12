<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 01</title>
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
    'emple',
    ['apellido', 'oficio', 'dept_no', 'salario'],
    ['ORDER' => 'dept_no']);

$caption = 'listado de los empleados';
$headers = ['Apellido', 'Oficio', 'Departamento', 'Salario'];
$numEmp = sizeof($result);

echo createTableFromArray($result, $caption, $headers);

echo "<p>Número de empleados: $numEmp</p>";

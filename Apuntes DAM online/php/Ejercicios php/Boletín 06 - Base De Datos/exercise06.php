<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 06</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<main>
    <a href="exercise06.html">Volver</a>
</main>
</body>

</html>

<?php

use Medoo\Medoo;

include('utils.php');
include('Medoo.php');

if (isset($_POST['send'])) {
    $numDep = $_POST['num_dep'];
    $office = strtoupper($_POST['office']);

    if (empty($numDep) && empty($office)) {
        echo '<h3>NO HAS INTRODUCIDO NI UN NÚMERO DE DEPARTAMENTO NI UN OFICIO</h3>';
        exit();
    } else if (empty($numDep)) {
        echo '<h3>NO HAS INTRODUCIDO UN NÚMERO DE DEPARTAMENTO</h3>';
        exit();
    } else if (empty($office)) {
        echo '<h3>NO HAS INTRODUCIDO UN OFICIO CONCRETO</h3>';
        exit();
    } else if (!is_numeric($numDep)) {
        echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DE DEPARTAMENTO</h3>';
        exit();
    } else if ($numDep <= 0) {
        echo '<h3>DEBES INTRODUCIR UN NÚMERO POSITIVO PARA EL NÚMERO DE DEPARTAMENTO</h3>';
        exit();
    }

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'ejemplo',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'depart',
        ['dnombre'], ['dept_no' => $numDep]);

    $depName = '';
    if (empty($result)) {
        echo '<h3>EL NÚMERO DE DEPARTAMENTO NO SE ENCUENTRA EN LA BASE DE DATOS</h3>';
        exit();
    } else {
        $depName = strtoupper($result[0]['dnombre']);
    }

    $result = $database->select(
        'emple',
        ['emp_no', 'apellido', 'salario'], ['dept_no' => $numDep, 'oficio' => $office]);

    $numEmp = sizeof($result);

    if (empty($numEmp)) {
        echo "<h3>NO EXISTEN EMPLEADOS EN EL DEPARTAMENTO DE $depName CON EL OFICIO DE $office</h3>";
        exit();
    }

    $caption = "listado de los empleados del departamento de $depName con el oficio de $office";
    $headers = ['EMPLEADO', 'APELLIDO', 'SALARIO'];

    echo createTableFromArray($result, $caption, $headers);


    echo "<p>Número de empleados: $numEmp</p>";
} else {
    echo '<h3>ERROR 404: NOT FOUND</h3>';
}

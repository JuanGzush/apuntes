<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 04</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<main>
    <a href="exercise04.html">Volver</a>
</main>
</body>

</html>

<?php

use Medoo\Medoo;

include('utils.php');
include('Medoo.php');

if (isset($_POST['send'])) {
    $hospCode = $_POST['hosp_code'];
    $office = strtoupper($_POST['office']);

    if (empty($hospCode) && empty($office)) {
        echo '<h3>NO HAS INTRODUCIDO NI EL CÓDIGO DE HOSPITAL NI EL OFICIO</h3>';
        exit();
    } else if (empty($hospCode)) {
        echo '<h3>NO HAS INTRODUCIDO UN CÓDIGO DE HOSPITAL</h3>';
        exit();
    } else if (empty($office)) {
        echo '<h3>NO HAS INTRODUCIDO UN OFICIO CONCRETO</h3>';
        exit();
    } else if (!is_numeric($hospCode)) {
        echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL CÓDIGO DE HOSPITAL</h3>';
        exit();
    } else if ($hospCode <= 0) {
        echo '<h3>DEBES INTRODUCIR UN NÚMERO POSITIVO PARA EL CÓDIGO DE HOSPITAL</h3>';
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
        'hospitales',
        ['nombre'], ['cod_hospital' => $hospCode]);

    $hospName = '';
    if (empty($result)) {
        echo '<h3>EL CÓDIGO DE HOSPITAL NO SE ENCUENTRA EN LA BASE DE DATOS</h3>';
        exit();
    } else {
        $hospName = strtoupper($result[0]['nombre']);
    }

    $result = $database->select(
        'personas',
        ['dni', 'apellidos'], ["cod_hospital" => $hospCode, 'funcion' => $office]);

    $numEmp = sizeof($result);

    if (empty($numEmp)) {
        echo "<h3>NO EXISTEN EMPLEADOS EN EL HOSPITAL $hospName CON EL OFICIO DE $office</h3>";
        exit();
    }

    $caption = "listado de los empleados del hospital $hospName con el oficio DE $office";
    $headers = ['DNI', 'APELLIDO'];

    echo createTableFromArray($result, $caption, $headers);


    echo "<p>Número de empleados: $numEmp</p>";
} else {
    echo '<h3>ERROR 404: NOT FOUND</h3>';
}

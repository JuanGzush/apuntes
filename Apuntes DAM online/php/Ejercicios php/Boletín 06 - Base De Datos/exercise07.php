<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 07</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<main>
    <a href="exercise07.html">Volver</a>
</main>
</body>
</html>
<?php

use Medoo\Medoo;

include('utils.php');
include('Medoo.php');

if (isset($_POST['insert'])) {
    $hospCode = $_POST['hosp_code'];
    $name = $_POST['name'];
    $direction = $_POST['direction'];
    $numPlaces = $_POST['num_places'];

    if (empty($hospCode)) {
        echo '<h3>NO HAS INTRODUCIDO EL NÚMERO DEL HOSPITAL</h3>';
        exit();
    } else if (empty($name)) {
        echo '<h3>NO HAS INTRODUCIDO EL NOMBRE DEL HOSPITAL</h3>';
        exit();
    } else if (empty($direction)) {
        echo '<h3>NO HAS INTRODUCIDO LA DIRECCIÓN DEL HOSPITAL</h3>';
        exit();
    } else if (empty($numPlaces)) {
        echo '<h3>NO HAS INTRODUCIDO EL NÚMERO DE PLAZAS DEL HOSPITAL</h3>';
        exit();
    } else if (!is_numeric($hospCode)) {
        echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DEL HOSPITAL</h3>';
        exit();
    } else if ($hospCode <= 0) {
        echo '<h3>DEBES INTRODUCIR UN NÚMERO POSITIVO PARA EL NÚMERO DEL HOSPITAL</h3>';
        exit();
    } else if (!is_numeric($numPlaces)) {
        echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DE PLAZAS DEL HOSPITAL</h3>';
        exit();
    } else if ($numPlaces <= 0) {
        echo '<h3>DEBES INTRODUCIR UN NÚMERO POSITIVO PARA EL NÚMERO DE PLAZAS DEL HOSPITAL</h3>';
        exit();
    }

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'ejemplo',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select('hospitales', ['cod_hospital']);
    $isCodeInserted = false;

    foreach ($result as $auxArray) {
        if (in_array($hospCode, $auxArray)) {
            $isCodeInserted = true;
            break;
        }
    }

    if ($isCodeInserted) {
        echo '<h3>El código de hospital indicado ya se encuentra insertado en la base de datos</h3>';
    } else {
        $result = $database->insert('hospitales',
            ['cod_hospital' => $hospCode, 'nombre' => $name, 'direccion' => $direction, 'num_plazas' => $numPlaces]);

        $errorInfo = $result->errorInfo()[0];
        $errorCode = $result->errorInfo()[2];

        if ($errorCode == 0) {
            echo '<h3>Registro INSERTADO</h3>';
        } else {
            echo "<h3>ERROR Nº $errorCode, DESCRIPCIÓN: $errorInfo</h3>";
        }
    }
} else if (isset($_POST['list'])) {
    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'ejemplo',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'hospitales',
        '*', true);

    $caption = 'listado de los hospitales';
    $headers = ['COD HOSPITAL', 'NOMBRE', 'DIRECCIÓN', 'NUM_PLAZAS'];
    $numHosp = sizeof($result);

    echo createTableFromArray($result, $caption, $headers);

    echo "<p>Número de hospitales: $numHosp</p>";
} else {
    echo '<h3>ERROR 404: NOT FOUND</h3>';
}

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 08</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<main>
    <a href="exercise08.html">Volver</a>
</main>
</body>

</html>

<?php

use Medoo\Medoo;

include('utils.php');
include('Medoo.php');

$hospCode = $_POST['hosp_code'];

if (empty($hospCode)) {
    echo '<h3>NO HAS INTRODUCIDO EL NÚMERO DEL HOSPITAL</h3>';
    exit();
} else if (!is_numeric($hospCode)) {
    echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DEL HOSPITAL</h3>';
    exit();
} else if ($hospCode <= 0) {
    echo '<h3>DEBES INTRODUCIR UN NÚMERO POSITIVO PARA EL NÚMERO DEL HOSPITAL</h3>';
    exit();
}

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'ejemplo',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

if (isset($_POST['delete'])) {
    $result = $database->delete('hospitales', ['cod_hospital' => $hospCode]);
    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($affectedRows == 0) {
        echo '<h3>EL NÚMERO DE HOSPITAL NO SE ENCUENTRA EN LA BASE DE DATOS</h3>';
        exit();
    }

    if ($errorCode == 0) {
        echo "<h3>FILAS ELIMINADAS: $affectedRows</h3>";
    } else {
        echo "<h3>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h3>";
    }
} else if (isset($_POST['display'])) {
    $result = $database->select(
        'hospitales',
        ['nombre', 'direccion', 'num_plazas'],
        ['cod_hospital' => $hospCode]);

    if (empty($result)) {
        echo '<h3>EL NÚMERO DE HOSPITAL NO SE ENCUENTRA EN LA BASE DE DATOS</h3>';
        exit();
    }

    $hospName = $result[0]['nombre'];
    $direction = $result[0]['direccion'];
    $numPlaces = $result[0]['num_plazas'];

    echo "<h3>NOMBRE DEL HOSPITAL A ELIMINAR: $hospName</h3>";
    echo "<h3>DIRECCIÓN DEL HOSPITAL A ELIMINAR: $direction</h3>";
    echo "<h3>NÚMERO DE PLAZAS DEL HOSPITAL A ELIMINAR: $numPlaces</h3>";

    $result = $database->select('medicos',
        ['dni', 'apellidos', 'especialidad'],
        ['cod_hospital' => $hospCode]);

    if (empty($result)) {
        echo "<h3>NO EXISTEN MÉDICOS EN EL HOSPITAL $hospName</h3>";
        exit();
    }

    $caption = "listado de los médicos del hospital $hospName";
    $headers = ['DNI', 'APELLIDOS', 'ESPECIALIDAD'];
    $numDoctors = sizeof($result);

    echo createTableFromArray($result, $caption, $headers);

    echo "<p>Número de médicos: $numDoctors</p>";
} else {
    echo '<h3>ERROR 404: NOT FOUND</h3>';
}

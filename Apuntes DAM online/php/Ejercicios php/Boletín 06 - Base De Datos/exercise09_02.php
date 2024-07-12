<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 09</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<?php

use Medoo\Medoo;

include('utils.php');
include('Medoo.php');

if (isset($_POST['update'])) {
    $hospCode = $_POST['hosp_code'];

    echo <<<EOF
    <form action="exercise09_01.php" method="POST">
        <ul>
            <li>
                <!-- Para recoger de nuevo el valor del código del hospital -->
                <input type="hidden" name="hosp_code" value="$hospCode"/>
            </li>
            <li>
                <button type="submit" name="return">Volver</button>
            </li>
        </ul>
    </form>
EOF;

    $hospName = $_POST['hosp_name'];
    $direction = $_POST['hosp_direction'];
    $numPlaces = $_POST['num_places'];

    if (empty($hospName)) {
        echo '<h3>NO HAS INTRODUCIDO EL NOMBRE DEL HOSPITAL</h3>';
        exit();
    } else if (empty($direction)) {
        echo '<h3>NO HAS INTRODUCIDO LA DIRECCIÓN DEL HOSPITAL</h3>';
        exit();
    } else if (empty($numPlaces)) {
        echo '<h3>NO HAS INTRODUCIDO EL NÚMERO DE PLAZAS DEL HOSPITAL</h3>';
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

    $result = $database->update('hospitales',
        ['nombre' => $hospName, 'direccion' => $direction, 'num_plazas' => $numPlaces],
        ['cod_hospital' => $hospCode]);

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo "<h3>FILAS ACTUALIZADAS: $affectedRows</h3>";
    } else {
        echo "<h3>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h3>";
    }
} else {
    echo '<h3>ERROR 404: NOT FOUND</h3>';
}

?>
</body>

</html>

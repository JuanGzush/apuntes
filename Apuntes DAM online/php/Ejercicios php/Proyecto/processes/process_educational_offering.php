<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Educational Offering Process</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen'
          href='../processes_styles/process_style.css'>
</head>

<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_POST['add'])) {
    insertEducationalOffering();
} else if (isset($_POST['update'])) {
    updateEducationalOffering();
} else if (isset($_GET['operation']) && ($_GET['operation'] === 'delete')) {
    deleteEducationalOffering();
} else {
    echo '<a href="../pages/login.html">Volver</a>';
    echo '<h2>ERROR 404: NOT FOUND</h2>';
}

function insertEducationalOffering(): void
{
    $codOe = $_POST['codOe'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $fechaLey = $_POST['fechaLey'];

    if (empty($codOe)) {
        echo '<a href="../pages/educational_offering_add.php?submit=submit">Volver</a>';
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DE LA OFERTA EDUCATIVA</h2>';
        exit();
    }


    if (empty($fechaLey)) {
        echo '<a href="../pages/educational_offering_add.php?submit=submit">Volver</a>';
        echo '<h2>NO HAS INTRODUCIDO LA FECHA EN LA QUE ENTRÓ EN VIGOR LA LEY</h2>';
        exit();
    }


    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select('ofertaeducativa', ['codOe']);
    $isCodeInserted = false;

    foreach ($result as $auxArray) {
        if (in_array($codOe, $auxArray)) {
            $isCodeInserted = true;
            break;
        }
    }

    if ($isCodeInserted) {
        echo '<a href="../pages/educational_offering_add.php?submit=submit">Volver</a>';
        echo '<h2>El CÓDIGO DE OFERTA EDUCATIVA INTRODUCIDO YA SE ENCUENTRA INSERTADO EN LA BASE DE DATOS</h2>';
    } else {
        $result = $database->insert(
            'ofertaeducativa',
            ['codOe' => $codOe, 'nombre' => $nombre, 'descripcion' => $descripcion,
                'tipo' => $tipo, 'fechaLey' => $fechaLey]
        );

        $errorInfo = $result->errorInfo()[0];
        $errorCode = $result->errorInfo()[2];

        if ($errorCode == 0) {
            echo '<a href="../pages/educational_offering_list.php?submit=submit">Volver</a>';
            echo '<h2>REGISTRO INSERTADO</h2>';
        } else {
            echo '<a href="../pages/educational_offering_add.php?submit=submit">Volver</a>';
            echo "<h2>ERROR Nº $errorCode, DESCRIPCIÓN: $errorInfo</h2>";
        }

    }
}

function updateEducationalOffering(): void
{
    $codOe = $_POST['codOe'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $fechaLey = $_POST['fechaLey'];

    if (empty($fechaLey)) {
        echo "<a href=\"../pages/educational_offering_edit.php?codOe=$codOe\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO LA FECHA EN LA QUE ENTRÓ EN VIGOR LA LEY</h2>';
        exit();
    }

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->update(
        'ofertaeducativa',
        ['nombre' => $nombre, 'descripcion' => $descripcion, 'tipo' => $tipo, 'fechaLey' => $fechaLey],
        ['codOe' => $codOe]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo '<a href="../pages/educational_offering_list.php?submit=submit">Volver</a>';
        echo "<h2>FILAS ACTUALIZADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/educational_offering_edit.php?codOe=$codOe\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

function deleteEducationalOffering(): void
{
    $codOe = $_GET['codOe'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->delete(
        'ofertaeducativa', ['codOe' => $codOe]
    );
    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo '<a href="../pages/educational_offering_list.php?submit=submit">Volver</a>';
        echo "<h2>FILAS ELIMINADAS: $affectedRows</h2>";
    } else {
        echo '<a href="../pages/educational_offering_list.php?submit=submit">Volver</a>';
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

?>

</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Schedule Process</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../processes_styles/process_style.css'>
</head>

<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_POST['add'])) {
    insertSchedule();
} else if (isset($_GET['operation']) && ($_GET['operation'] === 'delete')) {
    deleteSchedule();
} else {
    echo '<a href="../pages/login.html">Volver</a>';
    echo '<h2>ERROR 404: NOT FOUND</h2>';
}

function insertSchedule(): void
{
    $codOe = $_POST['codOe'];
    $codCurso = $_POST['codCurso'];
    $codTramo = $_POST['codTramo'];
    $codAsig = $_POST['codAsig'];

    if (empty($codTramo)) {
        echo "<a href=\"../pages/schedule_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DEL TRAMO</h2>';
        exit();
    }

    if (empty($codAsig)) {
        echo "<a href=\"../pages/schedule_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DE LA ASIGNATURA</h2>';
        exit();
    }

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'horario',
        ['codOe', 'codCurso', 'codTramo', 'codAsig'],
        ['codOe' => $codOe, 'codCurso' => $codCurso,
            'codTramo' => $codTramo, 'codAsig' => $codAsig]
    );
    $isCodeInserted = false;

    foreach ($result as $auxArray) {
        if (inArray($codOe, $auxArray, $codCurso, $codTramo, $codAsig)) {
            $isCodeInserted = true;
            break;
        }
    }

    if ($isCodeInserted) {
        echo "<a href=\"../pages/schedule_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo '<h2>El HORARIO INTRODUCIDO YA SE ENCUENTRA INSERTADO EN LA BASE DE DATOS</h2>';
    } else {
        $result = $database->insert(
            'horario',
            ['codOe' => $codOe, 'codCurso' => $codCurso,
                'codTramo' => $codTramo, 'codAsig' => $codAsig]
        );

        $errorInfo = $result->errorInfo()[0];
        $errorCode = $result->errorInfo()[2];

        if ($errorCode == 0) {
            echo "<a href=\"../pages/schedule_list.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
            echo '<h2>REGISTRO INSERTADO</h2>';
        } else {
            echo "<a href=\"../pages/schedule_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
            echo "<h2>ERROR Nº $errorCode, DESCRIPCIÓN: $errorInfo</h2>";
        }
    }
}

function inArray(mixed $codOe, mixed $auxArray, mixed $codCurso, mixed $codTramo, mixed $codAsig): bool
{
    return in_array($codOe, $auxArray) && in_array($codCurso, $auxArray) &&
        in_array($codTramo, $auxArray) && in_array($codAsig, $auxArray);
}

function deleteSchedule(): void
{
    $codOe = $_GET['codOe'];
    $codCurso = $_GET['codCurso'];
    $codTramo = $_GET['codTramo'];
    $codAsig = $_GET['codAsig'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->delete(
        'horario',
        ['codOe' => $codOe, 'codCurso' => $codCurso, 'codTramo' => $codTramo, 'codAsig' => $codAsig]
    );
    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo "<a href=\"../pages/schedule_list.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo "<h2>FILAS ELIMINADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/schedule_list.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

?>

</body>

</html>

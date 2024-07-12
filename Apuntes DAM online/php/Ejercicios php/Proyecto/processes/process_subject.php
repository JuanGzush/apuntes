<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Subject Process</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../processes_styles/process_style.css'>
</head>

<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_POST['add'])) {
    insertSubject();
} else if (isset($_POST['update'])) {
    updateSubject();
} else if (isset($_GET['operation']) && ($_GET['operation'] === 'delete')) {
    deleteSubject();
} else {
    echo '<a href="../pages/login.html">Volver</a>';
    echo '<h2>ERROR 404: NOT FOUND</h2>';
}

function insertSubject(): void
{
    $codAsig = $_POST['codAsig'];
    $nombre = $_POST['nombre'];
    $horasSemanales = $_POST['horasSemanales'];
    $horasTotales = $_POST['horasTotales'];

    if (empty($codAsig)) {
        echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DE LA ASIGNATURA</h2>';
        exit();
    }


    if (empty($nombre)) {
        echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
        echo '<h2>NO HAS INTRODUCIDO EL NOMBRE DE LA SIGNATURA</h2>';
        exit();
    }

    if (!empty($horasSemanales) && !is_numeric($horasSemanales)) {
        echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
        echo '<h2>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DE HORAS SEMANALES</h2>';
        exit();
    }

    if (!empty($horasSemanales) && $horasSemanales < 0) {
        echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
        echo '<h2>HAS INTRODUCIDO NÚMEROS NEGATIVOS PARA LAS HORAS SEMANALES</h2>';
        exit();
    }

    if (!empty($horasTotales) && !is_numeric($horasTotales)) {
        echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
        echo '<h2>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DE HORAS TOTALES</h2>';
        exit();
    }

    if (!empty($horasTotales) && $horasTotales < 0) {
        echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
        echo '<h2>HAS INTRODUCIDO NÚMEROS NEGATIVOS PARA LAS HORAS TOTALES</h2>';
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
        'asignatura',
        ['codAsig']
    );

    $isCodeInserted = false;

    foreach ($result as $auxArray) {
        if (in_array($codAsig, $auxArray)) {
            $isCodeInserted = true;
            break;
        }
    }

    if ($isCodeInserted) {
        echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
        echo '<h2>El CÓDIGO DE ASIGNATURA INTRODUCIDO YA SE ENCUENTRA INSERTADO EN LA BASE DE DATOS</h2>';
    } else {
        $result = $database->insert(
            'asignatura',
            ['codAsig' => $codAsig, 'nombre' => $nombre,
                'horasSemanales' => $horasSemanales, 'horasTotales' => $horasTotales]
        );

        $errorInfo = $result->errorInfo()[0];
        $errorCode = $result->errorInfo()[2];

        if ($errorCode == 0) {
            echo '<a href="../pages/subject_list.php?submit=submit">Volver</a>';
            echo '<h2>REGISTRO INSERTADO</h2>';
        } else {
            echo '<a href="../pages/subject_add.php?submit=submit">Volver</a>';
            echo "<h2>ERROR Nº $errorCode, DESCRIPCIÓN: $errorInfo</h2>";
        }

    }
}

function updateSubject(): void
{
    $codAsig = $_POST['codAsig'];
    $nombre = $_POST['nombre'];
    $horasSemanales = $_POST['horasSemanales'];
    $horasTotales = $_POST['horasTotales'];

    if (empty($nombre)) {
        echo "<a href=\"../pages/subject_edit.php?codAsig=$codAsig\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO EL NOMBRE DE LA ASIGNATURA</h2>';
        exit();
    }

    if (!empty($horasSemanales) && !is_numeric($horasSemanales)) {
        echo "<a href=\"../pages/subject_edit.php?codAsig=$codAsig\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DE HORAS SEMANALES</h2>';
        exit();
    }

    if (!empty($horasSemanales) && $horasSemanales < 0) {
        echo "<a href=\"../pages/subject_edit.php?codAsig=$codAsig\">Volver</a>";
        echo '<h2>HAS INTRODUCIDO NÚMEROS NEGATIVOS PARA LAS HORAS SEMANALES</h2>';
        exit();
    }

    if (!empty($horasTotales) && !is_numeric($horasTotales)) {
        echo "<a href=\"../pages/subject_edit.php?codAsig=$codAsig\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DE HORAS TOTALES</h2>';
        exit();
    }

    if (!empty($horasTotales) && $horasTotales < 0) {
        echo "<a href=\"../pages/subject_edit.php?codAsig=$codAsig\">Volver</a>";
        echo '<h2>HAS INTRODUCIDO NÚMEROS NEGATIVOS PARA LAS HORAS TOTALES</h2>';
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
        'asignatura',
        ['nombre' => $nombre, 'horasSemanales' => $horasSemanales, 'horasTotales' => $horasTotales],
        ['codAsig' => $codAsig]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo '<a href="../pages/subject_list.php?submit=submit">Volver</a>';
        echo "<h2>FILAS ACTUALIZADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/suject_edit.php?codAsig=$codAsig\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

function deleteSubject(): void
{
    $codAsig = $_GET['codAsig'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->delete(
        'asignatura',
        ['codAsig' => $codAsig]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo '<a href="../pages/subject_list.php?submit=submit">Volver</a>';
        echo "<h2>FILAS ELIMINADAS: $affectedRows</h2>";
    } else {
        echo '<a href="../pages/subject_list.php?submit=submit">Volver</a>';
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

?>

</body>

</html>

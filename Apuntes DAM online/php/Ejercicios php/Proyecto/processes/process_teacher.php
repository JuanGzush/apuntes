<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Teacher Process</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../processes_styles/process_style.css'>
</head>

<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_POST['add'])) {
    insertTeacher();
} else if (isset($_POST['update'])) {
    updateTeacher();
} else if (isset($_GET['operation']) && ($_GET['operation'] === 'delete')) {
    deleteTeacher();
} else {
    echo '<a href="../pages/login.html">Volver</a>';
    echo '<h2>ERROR 404: NOT FOUND</h2>';
}

function insertTeacher(): void
{
    $codProf = $_POST['codProf'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechaAlta = $_POST['fechaAlta'];

    if (empty($codProf)) {
        echo '<a href="../pages/teacher_add.php?submit=submit">Volver</a>';
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DEL PROFESOR</h2>';
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
        'profesor', ['codProf']
    );

    $isCodeInserted = false;

    foreach ($result as $auxArray) {
        if (in_array($codProf, $auxArray)) {
            $isCodeInserted = true;
            break;
        }
    }

    if ($isCodeInserted) {
        echo '<a href="../pages/teacher_add.php?submit=submit">Volver</a>';
        echo '<h2>El CÓDIGO DE PROFESOR INTRODUCIDO YA SE ENCUENTRA INSERTADO EN LA BASE DE DATOS</h2>';
    } else {
        $result = $database->insert(
            'profesor',
            ['codProf' => $codProf, 'nombre' => $nombre,
                'apellidos' => $apellidos, 'fechaAlta' => $fechaAlta]
        );

        $errorInfo = $result->errorInfo()[0];
        $errorCode = $result->errorInfo()[2];

        if ($errorCode == 0) {
            echo '<a href="../pages/teacher_list.php?submit=submit">Volver</a>';
            echo '<h2>REGISTRO INSERTADO</h2>';
        } else {
            echo '<a href="../pages/teacher_add.php?submit=submit">Volver</a>';
            echo "<h2>ERROR Nº $errorCode, DESCRIPCIÓN: $errorInfo</h2>";
        }

    }
}

function updateTeacher(): void
{
    $codProf = $_POST['codProf'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechaAlta = $_POST['fechaAlta'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->update(
        'profesor',
        ['nombre' => $nombre, 'apellidos' => $apellidos, 'fechaAlta' => $fechaAlta],
        ['codProf' => $codProf]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo '<a href="../pages/teacher_list.php?submit=submit">Volver</a>';
        echo "<h2>FILAS ACTUALIZADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/teacher_edit.php?codAsig=$codProf\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

function deleteTeacher(): void
{
    $codProf = $_GET['codProf'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->delete(
        'profesor', ['codProf' => $codProf]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo '<a href="../pages/teacher_list.php?submit=submit">Volver</a>';
        echo "<h2>FILAS ELIMINADAS: $affectedRows</h2>";
    } else {
        echo '<a href="../pages/teacher_list.php?submit=submit">Volver</a>';
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

?>

</body>

</html>

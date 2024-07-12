<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Distribution Process</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../processes_styles/process_style.css'>
</head>

<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_POST['add'])) {
    insertDistribution();
} else if (isset($_POST['update'])) {
    updateDistribution();
} else if (isset($_GET['operation']) && ($_GET['operation'] === 'delete')) {
    deleteDistribution();
} else {
    echo '<a href="../pages/login.html">Volver</a>';
    echo '<h2>ERROR 404: NOT FOUND</h2>';
}

function insertDistribution(): void
{
    $codOe = $_POST['codOe'];
    $codCurso = $_POST['codCurso'];
    $codAsig = $_POST['codAsig'];
    $codProf = $_POST['codProf'];

    if (empty($codAsig)) {
        echo "<a href=\"../pages/distribution_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DE LA ASIGNATURA</h2>';
        exit();
    }

    if (empty($codProf)) {
        echo "<a href=\"../pages/distribution_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
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
        'reparto',
        ['codOe', 'codCurso', 'codAsig'],
        ['codOe' => $codOe, 'codCurso' => $codCurso, 'codAsig' => $codAsig]
    );

    $isCodeInserted = false;

    foreach ($result as $auxArray) {
        if (inArray($codOe, $auxArray, $codCurso, $codAsig)) {
            $isCodeInserted = true;
            break;
        }
    }

    if ($isCodeInserted) {
        echo "<a href=\"../pages/distribution_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo '<h2>El REPARTO INTRODUCIDO YA SE ENCUENTRA INSERTADO EN LA BASE DE DATOS</h2>';
    } else {
        $result = $database->insert(
            'reparto',
            ['codOe' => $codOe, 'codCurso' => $codCurso,
                'codAsig' => $codAsig, 'codProf' => $codProf]
        );

        $errorInfo = $result->errorInfo()[0];
        $errorCode = $result->errorInfo()[2];

        if ($errorCode == 0) {
            echo "<a href=\"../pages/distribution_list.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
            echo '<h2>REGISTRO INSERTADO</h2>';
        } else {
            echo "<a href=\"../pages/distribution_add.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
            echo "<h2>ERROR Nº $errorCode, DESCRIPCIÓN: $errorInfo</h2>";
        }
    }
}

function inArray(mixed $codOe, mixed $auxArray, mixed $codCurso, mixed $codAsig): bool
{
    return in_array($codOe, $auxArray) && in_array($codCurso, $auxArray) && in_array($codAsig, $auxArray);
}

function updateDistribution(): void
{
    $codOe = $_POST['codOe'];
    $codCurso = $_POST['codCurso'];
    $codAsig = $_POST['codAsig'];
    $codProf = $_POST['codProf'];

    if (empty($codProf)) {
        echo "<a href=\"../pages/distribution_edit.php?codOe=$codOe&codCurso=$codCurso&codAsig=$codAsig&codProf=$codProf\">Volver</a>";
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

    $result = $database->update(
        'reparto',
        ['codProf' => $codProf],
        ['codOe' => $codOe, 'codCurso' => $codCurso, 'codAsig' => $codAsig]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo "<a href=\"../pages/distribution_list.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo "<h2>FILAS ACTUALIZADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/distribution_edit.php?codOe=$codOe&codCurso=$codCurso&codAsig=$codAsig&codProf=$codProf\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

function deleteDistribution(): void
{
    $codOe = $_GET['codOe'];
    $codCurso = $_GET['codCurso'];
    $codAsig = $_GET['codAsig'];
    $codProf = $_GET['codProf'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->delete(
        'reparto',
        ['codOe' => $codOe, 'codCurso' => $codCurso, 'codAsig' => $codAsig, 'codProf' => $codProf]
    );
    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo "<a href=\"../pages/distribution_list.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo "<h2>FILAS ELIMINADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/distribution_list.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

?>

</body>

</html>

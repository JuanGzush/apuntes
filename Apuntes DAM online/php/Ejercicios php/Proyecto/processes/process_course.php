<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Course Process</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../processes_styles/process_style.css'>
</head>

<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_POST['add'])) {
    insertCourse();
} else if (isset($_POST['update'])) {
    updateCourse();
} else if (isset($_GET['operation']) && ($_GET['operation'] === 'delete')) {
    deleteCourse();
} else {
    echo '<a href="../pages/login.html">Volver</a>';
    echo '<h2>ERROR 404: NOT FOUND</h2>';
}

function insertCourse(): void
{
    $codOe = $_POST['codOe'];
    $codCurso = $_POST['codCurso'];
    $codTutor = $_POST['codTutor'];

    if (empty($codCurso)) {
        echo "<a href=\"../pages/course_add.php?codOe=$codOe\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DEL CURSO</h2>';
        exit();
    }

    if (empty($codTutor)) {
        echo "<a href=\"../pages/course_add.php?codOe=$codOe\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DEL TUTOR</h2>';
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
        'curso',
        ['codCurso']
    );

    $isCodeInserted = false;

    foreach ($result as $auxArray) {
        if (in_array($codCurso, $auxArray)) {
            $isCodeInserted = true;
            break;
        }
    }

    if ($isCodeInserted) {
        echo "<a href=\"../pages/course_add.php?codOe=$codOe\">Volver</a>";
        echo '<h2>El CÓDIGO DE CURSO INTRODUCIDO YA SE ENCUENTRA INSERTADO EN LA BASE DE DATOS</h2>';
    } else {
        $result = $database->insert(
            'curso',
            ['codOe' => $codOe, 'codCurso' => $codCurso, 'codTutor' => $codTutor]
        );

        $errorInfo = $result->errorInfo()[0];
        $errorCode = $result->errorInfo()[2];

        if ($errorCode == 0) {
            echo "<a href=\"../pages/course_list.php?codOe=$codOe\">Volver</a>";
            echo '<h2>REGISTRO INSERTADO</h2>';
        } else {
            echo "<a href=\"../pages/course_add.php?codOe=$codOe\">Volver</a>";
            echo "<h2>ERROR Nº $errorCode, DESCRIPCIÓN: $errorInfo</h2>";
        }

    }
}

function updateCourse(): void
{
    $codOe = $_POST['codOe'];
    $codCurso = $_POST['codCurso'];
    $codTutor = $_POST['codTutor'];

    if (empty($codTutor)) {
        echo "<a href=\"../pages/course_edit.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo '<h2>NO HAS INTRODUCIDO EL CÓDIGO DEL TUTOR</h2>';
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
        'curso',
        ['codTutor' => $codTutor],
        ['codOe' => $codOe, 'codCurso' => $codCurso]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo "<a href=\"../pages/course_list.php?codOe=$codOe\">Volver</a>";
        echo "<h2>FILAS ACTUALIZADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/course_edit.php?codOe=$codOe&codCurso=$codCurso\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

function deleteCourse(): void
{
    $codOe = $_GET['codOe'];
    $codCurso = $_GET['codCurso'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->delete(
        'curso',
        ['codOe' => $codOe, 'codCurso' => $codCurso]
    );

    $errorInfo = $result->errorInfo()[0];
    $errorCode = $result->errorInfo()[2];
    $affectedRows = $result->rowCount();

    if ($errorCode == 0) {
        echo "<a href=\"../pages/course_list.php?codOe=$codOe\">Volver</a>";
        echo "<h2>FILAS ELIMINADAS: $affectedRows</h2>";
    } else {
        echo "<a href=\"../pages/course_list.php?codOe=$codOe\">Volver</a>";
        echo "<h2>ERROR Nº $errorCode, DESCRIPCION: $errorInfo</h2>";
    }
}

?>

</body>

</html>

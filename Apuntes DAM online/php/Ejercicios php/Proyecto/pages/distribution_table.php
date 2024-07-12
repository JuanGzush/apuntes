<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Reparto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/distribution_table_style.css'>
</head>
<body>

<?php

use Medoo\Medoo;

include('../utils/medoo_utils.php');
include('../utils/medoo.php');

if (isset($_GET['codOe']) && isset($_GET['codCurso'])) {
    $codOe = $_GET['codOe'];
    $codCurso = $_GET['codCurso'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $teachers = $database->select(
        'reparto',
        [
            '[><]horario' => ['reparto.codAsig' => 'horario.codAsig'],
            '[><]tramoHorario' => ['horario.codTramo' => 'codTramo']
        ],
        ['codProf', 'reparto.codAsig'],
        [
            'reparto.codOe' => $codOe, 'reparto.codCurso' => $codCurso,
            'horario.codOe' => $codOe, 'horario.codCurso' => $codCurso,
            'ORDER' => [
                'horaInicio',
                'dia',
                'codAsig'
            ]
        ]
    );

    $caption = 'REPARTO' . ' ' . $codOe . ' ' . $codCurso;
    $columnHeaders = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES'];

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>reparto</h1>
    </header>
    <main>
    <a href="course_list.php?codOe=$codOe" class="return">Volver</a>
EOF;

    echo createDistributionTable($teachers, $caption, $columnHeaders);

    echo <<<EOF
    </main>
    <footer>
        <h4>© Iván López Bermúdez</h4>
    </footer>
</div>
EOF;
} else {
    echo '<a href="login.html">Volver</a>';
    echo '<h2 class="error">ERROR 404: NOT FOUND</h2>';
}

?>


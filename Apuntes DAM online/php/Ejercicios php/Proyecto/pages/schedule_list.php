<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Horario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/schedule_list_style.css'>
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

    $result = $database->select(
        'asignatura',
        ['[><]horario' => ['asignatura.codAsig' => 'horario.codAsig'],
            '[><]tramohorario' => ['horario.codTramo' => 'codTramo']],
        ['codOe', 'codCurso', 'nombre', 'dia', 'horaInicio', 'horaFin', 'horario.codTramo', 'horario.codAsig'],
        ['codOe' => $codOe, 'codCurso' => $codCurso,
            'ORDER' => [
                'dia',
                'horaInicio',
                'codAsig'
            ]]
    );

    $schedules = getScheduleEntries($result);

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>horario</h1>
        <a href="schedule_add.php?codOe=$codOe&codCurso=$codCurso" class="insert"></a>
    </header>
    <main>
    <a href="course_list.php?codOe=$codOe" class="return">Volver</a>
EOF;

    if (empty($schedules)) {
        echo "<h2>EL CURSO $codOe $codCurso NO TIENE ASIGNADO NINGÚN HORARIO</h2>";
    } else {
        echo $schedules;
    }

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

</body>

</html>

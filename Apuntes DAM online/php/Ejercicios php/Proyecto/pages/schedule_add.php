<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Añadir horario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/schedule_add_style.css'>
</head>
<body>

<?php

include('../utils/medoo.php');
include('../utils/medoo_utils.php');

use Medoo\Medoo;

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

    $timeSlots = $database->select(
        'tramoHorario',
        ['codTramo'],
        ['ORDER' => [
            'dia' => ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES'],
            'horaInicio'
        ]]
    );

    $subjects = $database->select(
        'asignatura',
        ['codAsig', 'nombre'],
        ['ORDER' => 'codAsig']
    );

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>añadir horario</h1>
        <h2>Introduce los datos del horario que deseas insertar</h2>
    </header>
    <main>
        <form action="../processes/process_schedule.php" method="post">
            <ul>
                <li>
                    <input type="hidden" name="codOe" value="$codOe"/>
                </li>
                <li>
                    <input type="hidden" name="codCurso" value="$codCurso"/>
                </li>
                <li>
                    <label for="slotCode">Tramo</label>
EOF;

    echo getTimeSlotsSelect($timeSlots, 'slotCode', 'codTramo');

    echo <<<EOF
                </li>
                <li>
                    <label for="subject">Asignatura</label>
EOF;

    echo getSubjectsSelect($subjects, 'subject', 'codAsig');

    echo <<<EOF
                </li>
            </ul>
            <div class="buttons_container">
                <a href="schedule_list.php?codOe=$codOe&codCurso=$codCurso">Volver</a>
                <button type="submit" name="add">Añadir</button>
                <button type="reset" name="reset">Reset</button>
            </div>
        </form>
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

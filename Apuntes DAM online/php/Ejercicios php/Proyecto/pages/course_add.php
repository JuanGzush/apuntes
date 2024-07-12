<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Añadir Curso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/course_add_style.css'>
</head>
<body>

<?php

include('../utils/medoo.php');
include('../utils/medoo_utils.php');

use Medoo\Medoo;

if (isset($_GET['codOe'])) {
    $codOe = $_GET['codOe'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $rowsOne = $database->select(
        'profesor',
        ['codProf', 'nombre', 'apellidos'],
        ['ORDER' => 'codProf']
    );

    $rowsTwo = $database->select(
        'profesor',
        ['[><]curso' => ['codProf' => 'codTutor']],
        ['codProf']
    );
    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>añadir curso</h1>
        <h2>Introduce los datos del curso que deseas insertar</h2>
    </header>
    <main>
        <form action="../processes/process_course.php" method="post">
            <ul>
                <li>
                    <input type="hidden" name="codOe" value="$codOe"/>
                </li>
                <li>
                    <label for="courseCode">Código de curso</label>
                    <input type="text" id="courseCode" name="codCurso" maxlength="3" size="3"/>
                </li>
                <li>
                    <label for="tutorCode">Tutor</label>
EOF;

    echo getExclusiveTeachersSelect($rowsOne, $rowsTwo, 'tutorCode', 'codTutor');

    echo <<<EOF
                </li>
            </ul>
            <div class="buttons_container">
                <a href="course_list.php?codOe=$codOe">Volver</a>
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

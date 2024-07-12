<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar Curso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/course_edit_style.css'>
</head>
<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');
include('../utils/medoo_utils.php');

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
        'curso',
        ['codTutor'],
        ['codOe' => $codOe, 'codCurso' => $codCurso]
    );

    $codTutor = $result[0]['codTutor'];

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
        <h1>editar curso</h1>
        <h2>Modifica los datos del curso que deseas actualizar</h2>
    </header>
    <main>
        <form action="../processes/process_course.php" method="post">
            <ul>
                <li>
                    <input type="hidden" name="codOe" value="$codOe"/>
                </li>
                <li>
                    <input type="hidden" name="codCurso" value="$codCurso"/>
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
                <button type="submit" name="update">Editar</button>
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
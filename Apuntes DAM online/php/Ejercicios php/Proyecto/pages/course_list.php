<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Curso</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/course_list_style.css'>
</head>
<body>

<?php

use Medoo\Medoo;

include('../utils/medoo_utils.php');
include('../utils/medoo.php');

if (isset($_GET['codOe'])) {
    $codOe = $_GET['codOe'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'curso',
        ['[><]profesor' => ['codTutor' => 'codProf']],
        ['codOe', 'codCurso', 'nombre', 'apellidos'],
        ['codOe' => $codOe,
            'ORDER' => 'codCurso']
    );

    $courses = getCourses($result);

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>curso</h1>
        <a href="course_add.php?codOe=$codOe" class="insert"></a>
    </header>
    <main>
    <a href="educational_offering_list.php?submit=submit">Volver</a>
EOF;

    if (empty($courses)) {
        echo "<h2>LA OFERTA CON EL CÓDIGO $codOe NO TIENE NIGÚN CURSO</h2>";
    } else {
        echo $courses;
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

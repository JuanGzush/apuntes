<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Profesor</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/teacher_list_style.css'>
</head>
<body>

<?php

use Medoo\Medoo;

include('../utils/medoo_utils.php');
include('../utils/medoo.php');


if (isset($_GET['submit'])) {
    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'profesor',
        ['codProf', 'nombre', 'apellidos', 'fechaAlta'],
        ['ORDER' => 'codProf']
    );

    $teachers = getTeachers($result);
    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>profesor</h1>
        <a href="teacher_add.php?submit=submit" class="insert"></a>
    </header>
    <main>
        <a href="panel.php?submit=submit">Volver</a>
EOF;
    if (empty($teachers)) {
        echo '<h2>LA TABLA DE PROFESOR ESTÁ VACÍA</h2>';
    } else {
        echo $teachers;
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

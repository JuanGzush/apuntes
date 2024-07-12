<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Asignatura</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/subject_list_style.css'>
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
        'asignatura',
        ['codAsig', 'nombre', 'horasSemanales', 'horasTotales'],
        ['ORDER' => 'codAsig']
    );

    $subjects = getSubjects($result);

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>asignatura</h1>
        <a href="subject_add.php?submit=submit" class="insert"></a>
    </header>
    <main>
        <a href="panel.php?submit=submit">Volver</a>
EOF;


    if (empty($subjects)) {
        echo '<h2>LA TABLA DE ASIGNATURA ESTÁ VACÍA</h2>';
    } else {
        echo $subjects;
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

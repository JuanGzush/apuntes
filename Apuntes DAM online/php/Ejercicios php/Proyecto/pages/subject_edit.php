<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar Asignatura</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/subject_edit_style.css'>
</head>
<body>


<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_GET['codAsig'])) {
    $codAsig = $_GET['codAsig'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'asignatura',
        ['nombre', 'horasSemanales', 'horasTotales'],
        ['codAsig' => $codAsig]
    );

    $nombre = $result[0]['nombre'];
    $horasSemanales = $result[0]['horasSemanales'];
    $horasTotales = $result[0]['horasTotales'];

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>editar asignatura</h1>
        <h2>Modifica los datos de la asignatura que deseas actualizar</h2>
    </header>
    <main>
        <form action="../processes/process_subject.php" method="post">
            <ul>
                <li>
                    <input type="hidden" name="codAsig" value="$codAsig"/>
                <li>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="nombre" value="$nombre" maxlength="80" size="80"/>
                </li>
                <li>
                    <label for="weeklyHours">Horas Semanales</label>
                    <input type="text" id="weeklyHours" name="horasSemanales" value="$horasSemanales" maxlength="3" size="3"/>
                </li>
                <li>
                    <label for="totalHours">Horas Totales</label>
                    <input type="text" id="totalHours" name="horasTotales" value="$horasTotales" maxlength="5" size="5"/>
                </li>
            </ul>
            <div class="buttons_container">
                <a href="subject_list.php?submit=submit">Volver</a>
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar Reparto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/distribution_edit_style.css'>
</head>
<body>

<?php

use Medoo\Medoo;

include('../utils/medoo.php');
include('../utils/medoo_utils.php');

if (isset($_GET['codOe']) && isset($_GET['codCurso']) && isset($_GET['codAsig'])) {
    $codOe = $_GET['codOe'];
    $codCurso = $_GET['codCurso'];
    $codAsig = $_GET['codAsig'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'profesor',
        ['codProf', 'nombre', 'apellidos'],
    );

    $codProf = $result[0]['codProf'];

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>editar reparto</h1>
        <h2>Modifica los datos del reparto que deseas actualizar</h2>
    </header>
    <main>
        <form action="../processes/process_distribution.php" method="post">
            <ul>
                <li>
                    <input type="hidden" name="codOe" value="$codOe"/>
                </li>
                <li>
                    <input type="hidden" name="codCurso" value="$codCurso"/>
                </li>
                                <li>
                    <input type="hidden" name="codAsig" value="$codAsig"/>
                </li>
                <li>
                    <label for="teacherCode">Profesor</label>
EOF;

    echo getTeachersSelect($result, 'teacherCode', 'codProf');

    echo <<<EOF
                </li>
            </ul>
            <div class="buttons_container">
                <a href="distribution_list.php?codOe=$codOe&codCurso=$codCurso">Volver</a>
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

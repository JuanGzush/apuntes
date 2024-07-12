<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar Profesor</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/teacher_edit_style.css'>
</head>
<body>


<?php

use Medoo\Medoo;

include('../utils/medoo.php');

if (isset($_GET['codProf'])) {
    $codProf = $_GET['codProf'];

    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'horario',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);

    $result = $database->select(
        'profesor',
        ['nombre', 'apellidos', 'fechaAlta'],
        ['codProf' => $codProf]
    );

    $nombre = $result[0]['nombre'];
    $apellidos = $result[0]['apellidos'];
    $fechaAlta = $result[0]['fechaAlta'];

    $fechaAltaFormateada = substr($fechaAlta, 0, 4)
        . '-' . substr($fechaAlta, 5, 2)
        . '-' . substr($fechaAlta, 8, 2);

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>editar profesor</h1>
        <h2>Modifica los datos del profesor que deseas actualizar</h2>
    </header>
    <main>
        <form action="../processes/process_teacher.php" method="post">
            <ul>
                <li>
                    <input type="hidden" name="codProf" value="$codProf"/>
                <li>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="nombre" value="$nombre" maxlength="20" size="20"/>
                </li>
                <li>
                    <label for="surname">Apellidos</label>
                    <input type="text" id="surname" name="apellidos" value="$apellidos" maxlength="40" size="40"/>
                </li>
                <li>
                    <label for="dischargeDate">Fecha de alta</label>
                    <input type="text" id="dischargeDate" name="fechaAlta" value="$fechaAltaFormateada" maxlength="10" size="10"/>
                </li>
            </ul>
            <div class="buttons_container">
                <a href="teacher_list.php?submit=submit">Volver</a>
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

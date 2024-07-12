<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Editar Oferta Educativa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/educational_offering_edit_style.css'>
</head>
<body>

<?php

use Medoo\Medoo;

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
        'ofertaeducativa',
        ['nombre', 'descripcion', 'tipo', 'fechaLey'],
        ['codOe' => $codOe]
    );

    $nombre = $result[0]['nombre'];
    $descripcion = $result[0]['descripcion'];
    $tipo = $result[0]['tipo'];
    $fechaLey = $result[0]['fechaLey'];

    $fechaLeyFormateada = substr($fechaLey, 0, 4)
        . '-' . substr($fechaLey, 5, 2)
        . '-' . substr($fechaLey, 8, 2);

    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>editar oferta educativa</h1>
        <h2>Modifica los datos de la oferta educativa que deseas actualizar</h2>
    </header>
    <main>
        <form action="../processes/process_educational_offering.php" method="post">
            <ul>
                <li>
                    <input type="hidden" name="codOe" value="$codOe"/>
                <li>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="nombre" value="$nombre" maxlength="70" size="70"/>
                </li>
                <li>
                    <label for="description">Descripción</label>
                    <textarea id="description" name="descripcion" rows="5" cols="72"
                              maxlength="255">$descripcion</textarea>

                </li>
                <li>
                    <label for="type">Tipo</label>
                    <input type="text" id="type" name="tipo" value="$tipo" maxlength="5" size="5"/>
                </li>
                <li>0
                    <label for="lawDate">Fecha ley</label>
                    <input type="text" id="lawDate" name="fechaLey" value="$fechaLeyFormateada" maxlength="10" size="10"/>
                </li>
            </ul>
            <div class="buttons_container">
                <a href="educational_offering_list.php?submit=submit.php">Volver</a>
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

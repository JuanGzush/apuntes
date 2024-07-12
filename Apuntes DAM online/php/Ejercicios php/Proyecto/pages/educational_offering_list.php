<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Oferta Educativa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/educational_offering_list_style.css'>
</head>
<body>

<?php

use Medoo\Medoo;

include('../utils/medoo_utils.php');
include('../utils/medoo.php');

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'horario',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);

$result = $database->select(
    'ofertaeducativa',
    ['codOe', 'nombre', 'descripcion', 'fechaLey'],
    ['ORDER' => 'codOe']
);

$educationalOfferings = getEducationalOfferings($result);

if (isset($_GET['submit'])) {
    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>oferta educativa</h1>
        <a href="educational_offering_add.php?submit=submit" class="insert"></a>
    </header>
    <main>
        <a href="panel.php?submit=submit">Volver</a>
EOF;


    if (empty($educationalOfferings)) {
        echo '<h2>LA TABLA DE OFERTA EDUCATIVA ESTÁ VACÍA</h2>';
    } else {
        echo $educationalOfferings;
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

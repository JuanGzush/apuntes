<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Panel De Administración</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/panel_style.css'>
</head>

<body>

<?php

if (isset($_GET['submit'])) {
    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>panel de administración</h1>
        <h2>Elige una entidad</h2>
    </header>
    <main>
        <a href="login.html">Volver</a>
        <a href="educational_offering_list.php?submit=submit" class="entity">Oferta Educativa</a>
        <a href="subject_list.php?submit=submit" class="entity">Asignatura</a>
        <a href="teacher_list.php?submit=submit" class="entity">Profesor</a>
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

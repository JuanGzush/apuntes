<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Añadir Asignatura</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/subject_add_style.css'>
</head>
<body>

<?php

if (isset($_GET['submit'])) {
    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>añadir asignatura</h1>
        <h2>Introduce los datos de la asignatura que deseas insertar</h2>
    </header>
    <main>
        <form action="../processes/process_subject.php" method="post">
            <ul>
                <li>
                    <label for="subCode">Código de asignatura</label>
                    <input type="text" id="subCode" name="codAsig" maxlength="6" size="6"/>

                </li>
                <li>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="nombre" maxlength="80" size="80"/>
                </li>
                <li>
                    <label for="weeklyHours">Horas semanales</label>
                    <input type="text" id="weeklyHours" name="horasSemanales" maxlength="3" size="3"/>
                </li>
                <li>
                    <label for="totalHours">Horas Totales</label>
                    <input type="text" id="totalHours" name="horasTotales" maxlength="5" size="5"/>
                </li>
            </ul>
            <div class="buttons_container">
                <a href="subject_list.php?submit=submit">Volver</a>
                <button type="submit" name="add">Añadir</button>
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Añadir Profesor</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/teacher_add_style.css'>
</head>
<body>

<?php

if (isset($_GET['submit'])) {
    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>añadir profesor</h1>
        <h2>Introduce los datos del profesor que deseas insertar</h2>
    </header>
    <main>
        <form action="../processes/process_teacher.php" method="post">
            <ul>
                <li>
                    <label for="teacherCode">Código de profesor</label>
                    <input type="text" id="teacherCode" name="codProf" maxlength="3" size="3"/>

                </li>
                <li>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="nombre" maxlength="20" size="20"/>
                </li>
                <li>
                    <label for="surname">Apellidos</label>
                    <input type="text" id="surname" name="apellidos" maxlength="40" size="40"/>
                </li>
                <li>
                    <label for="dischargeDate">Fecha de alta</label>
                    <input type="text" id="dischargeDate" name="fechaAlta" maxlength="10" size="10"/>
                </li>
            </ul>
            <div class="buttons_container">
                <a href="teacher_list.php?submit=submit">Volver</a>
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

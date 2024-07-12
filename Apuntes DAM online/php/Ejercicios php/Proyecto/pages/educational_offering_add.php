<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Añadir Oferta Educativa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../pages_styles/educational_offering_add_style.css'>
</head>
<body>

<?php

if (isset($_GET['submit'])) {
    echo <<<EOF
<div class="flex_container">
    <header>
        <h1>añadir oferta educativa</h1>
        <h2>Introduce los datos de la oferta educativa que deseas insertar</h2>
    </header>
    <main>
        <form action="../processes/process_educational_offering.php" method="post">
            <ul>
                <li>
                    <label for="eoCode">Código de oferta</label>
                    <input type="text" id="eoCode" name="codOe" maxlength="3" size="3"/>

                </li>
                <li>
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="nombre" maxlength="70" size="70"/>
                </li>
                <li>
                    <label for="description">Descripción</label>
                    <textarea id="description" name="descripcion" rows="5" cols="72"
                              maxlength="255"></textarea>

                </li>
                <li>
                    <label for="type">Tipo</label>
                    <input type="text" id="type" name="tipo" maxlength="5" size="5"/>
                </li>
                <li>
                    <label for="lawDate">Fecha ley</label>
                    <input type="text" id="lawDate" name="fechaLey" maxlength="10" size="10"/>
                </li>
            </ul>
            <div class="buttons_container">
                <a href="educational_offering_list.php?submit=submit">Volver</a>
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

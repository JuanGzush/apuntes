<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 06 - Login- Mi Página</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_mipagina.css'>
</head>

<body>
<noscript>
    <p>Bienvenidos a mi sitio. Por favor, activa el JavaScript</p>
</noscript>
<a href="home.php">Volver</a>
<form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" name="form">
    <ul>
        <li>
            <p id="message">Mensaje</p>
        </li>
        <li>
            <h2>Lista de la compra</h2>
        </li>
        <li>
            <div class="input_container">
                <input type="text" name="producto" placeholder="e.j. huevos">
                <button type="button" name="custom_button">Añadir</button>
            </div>
        </li>
        <li>
            <div id="products_container"></div>
        </li>
        <li>
            <button type="button" name="remove_button">Borrar elementos</button>
        </li>
    </ul>
</form>

<script src='mipagina.js'></script>
</body>

</html>

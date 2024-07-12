<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 06 - Login - Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_home.css'>
</head>

<body>
<header>
    <h1>login</h1>
    <h2>Haz login para dirigirte a mi página web</h2>
</header>
<main>
    <form action="proceso.php" method="get">
        <ul>
            <li>
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="user" maxlength="30" size="30"/>

            </li>
            <li>
                <label for="contrasena">Password</label>
                <input type="password" id="contrasena" name="password" maxlength="30" size="30"/>
            </li>
        </ul>
        <button type="submit" name="send">Enviar</button>
    </form>
</main>
</body>

</html>

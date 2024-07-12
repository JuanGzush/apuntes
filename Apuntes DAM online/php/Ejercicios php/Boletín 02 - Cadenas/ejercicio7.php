<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 07</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín cadenas</p>
        <p>ejercicio 07</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                $randomStr = str_shuffle($str);

                echo substr($randomStr, 5, 10);

                ?>
            </p>
        </article>
    </section>
    <section class="code">
        <article>
            <p>Código fuente:</p>
            <p>
                <?php

                highlight_string("
                    <?php 
                    \$str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
                    \$randomStr = str_shuffle(\$str);

                    echo substr(\$randomStr, 5, 10);
                    ?>");

                ?>
            </p>
        </article>
    </section>
</main>
<footer>
    <a href="./index.php">volver</a>
    <p>© Iván López Bermúdez</p>
</footer>
</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 11</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín cadenas</p>
        <p>ejercicio 11</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $str = 'https://www.example.com/index.php';
                preg_match('/[a-zA-Z]*\.php/', $str, $matches);
                $subStr = substr($matches[0], 0, strlen($matches[0]) - 4);

                echo $subStr;

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
                    \$str = 'https://www.example.com/index.php';
                    preg_match('/[a-zA-Z]*\.php/', \$str, \$matches);
                    \$subStr = substr(\$matches[0], 0, strlen(\$matches[0]) - 4);

                    echo \$subStr;
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

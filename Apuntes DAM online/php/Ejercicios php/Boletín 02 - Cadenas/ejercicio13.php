<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 13</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín cadenas</p>
        <p>ejercicio 13</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $str = 'En un lugar de la mancha de cuyo nombre';
                $subStr = 'test';
                $pos = strpos($str, 'mancha');
                $newStr = substr($str, 0, $pos) . " $subStr " . substr($str, $pos, strlen($str) - 1);

                echo $newStr;

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
                    \$str = 'En un lugar de la mancha de cuyo nombre';
                    \$subStr = 'test';
                    \$pos = strpos(\$str, 'mancha');
                    \$newStr = substr(\$str, 0, \$pos) . \" \$subStr \" . substr(\$str, \$pos, strlen(\$str) - 1);

                    echo \$newStr;
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

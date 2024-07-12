<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 09</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín cadenas</p>
        <p>ejercicio 09</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $str1 = 'football';
                $str2 = 'footboll';
                $str1Array = str_split($str1);
                $str2Array = str_split($str2);
                $exit = false;
                $doubleQuote = '<>';
                $pos = 0;

                for ($i = 0; $i < sizeof($str1Array) && !$exit; $i++) {
                    if ($str1Array[$i] != $str2Array[$i]) {
                        $pos = $i;
                        $exit = true;
                    }
                }

                printf(
                    'La primera diferencia entre las dos cadenas está en la posición %d: "%s" %s "%s"',
                    $pos,
                    $str1Array[$pos],
                    $doubleQuote,
                    $str2Array[$pos]
                );

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
                    \$str1 = 'football';
                    \$str2 = 'footboll';
                    \$str1Array = str_split(\$str1, 1);
                    \$str2Array = str_split(\$str2, 1);
                    \$exit = false;
                    \$doubleQuote = '<>';
                    \$pos = 0;

                    for (\$i = 0; \$i < sizeof(\$str1Array) && !\$exit; \$i++) {
                        if (\$str1Array[\$i] != \$str2Array[\$i]) {
                            \$pos = \$i;

                            \$exit = true;
                        }
                    }

                    printf('La primera diferencia entre las dos cadenas está en la posición %d: \"%s\" %s \"%s\"', \$pos, \$str1Array[\$pos], \$doubleQuote, \$str2Array[\$pos]);
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

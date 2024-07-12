<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 03</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín cadenas</p>
        <p>ejercicio 03</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $str = 'En un lugar de la mancha de cuyo nombre.';
                $subStr = 'cuyo';

                if (!str_contains($str, $subStr)) {
                    echo "La subcadena \"$subStr\" no se encuentra en la cadena \"$str\"";
                } else {
                    echo "La subcadena \"$subStr\" sí se encuentra en la cadena \"$str\"";
                }

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
                    \$str = 'En un lugar de la mancha de cuyo nombre.';
                    \$subStr = 'cuyo';

                    if (strpos(\$str, \$subStr) === false) {
                        echo \"La subcadena \"\$subStr\" no se encuentra en la cadena \"\$str\"\";
                    } else {
                        echo \"La subcadena \"\$subStr\" sí se encuentra en la cadena \"\$str\"\";
                    }
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

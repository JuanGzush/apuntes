<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 07</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercise7.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <span>boletín variables</span>
        <span>ejercicio 07</span>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                $rows = 5;
                $output = '';

                for ($i = 0; $i < $rows; $i++) {
                    for ($j = 0; $j < $rows - $i; $j++) {
                        if (($i == 0) || ($j == 0) || ($j == $rows - $i - 1)) {
                            $output .= '*';
                        } else {
                            $output .= '&nbsp;&nbsp;';
                        }
                    }

                    $output .= '<br>';
                }

                echo $output;

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

                        \$rows = 5;
                        \$output = '';

                        for (\$i = 0; \$i < \$rows; \$i++) {
                            for (\$j = 0; \$j < \$rows - \$i; \$j++) {
                                if ((\$i == 0) || (\$j == 0) || (\$j == \$rows - \$i - 1)) {
                                \$output = \$output . '*';
                                } else {
                                \$output = \$output . '&nbsp;&nbsp;';
                                }
                            }

                            \$output = \$output . '<br>';
                        }

                        echo \$output;

                    ?>")

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

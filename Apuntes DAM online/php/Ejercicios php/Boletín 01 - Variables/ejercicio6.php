<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 06</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <span>boletín variables</span>
        <span>ejercicio 06</span>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                const POUND_TO_AUS_DOLLAR_FACTOR = 1.84;
                $pounds = 100;
                $ausDollars = $pounds * POUND_TO_AUS_DOLLAR_FACTOR;

                echo "$pounds libras esterlinas equivalen a $ausDollars dólares australianos";

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
                        define('POUND_TO_AUS_DOLLAR_FACTOR', 1.84);
                        \$pounds = 100;
                        \$ausDollars = \$pounds * POUND_TO_AUS_DOLLAR_FACTOR;
    
                        echo \"\$pounds libras esterlinas equivalen a \$ausDollars dólares australianos\";
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

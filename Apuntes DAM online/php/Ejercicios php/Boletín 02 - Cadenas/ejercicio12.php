<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 12</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín cadenas</p>
        <p>ejercicio 12</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                echo printsNextCharacter(true) . '<br>';
                echo printsNextCharacter(1) . '<br>';
                echo printsNextCharacter('Hola') . '<br>';
                echo printsNextCharacter('a') . '<br>';
                echo printsNextCharacter('l') . '<br>';
                echo printsNextCharacter('z') . '<br>';
                echo printsNextCharacter('A') . '<br>';
                echo printsNextCharacter('L') . '<br>';
                echo printsNextCharacter('Z') . '<br>';

                function printsNextCharacter($str)
                {
                    if (gettype($str) != 'string') {
                        echo 'No has introducido una cadena';
                    } else if (strlen($str) > 1) {
                        echo 'Has introducido más de un carácter';
                    } else if ($str === 'z') {
                        echo 'a';
                    } else if ($str === 'Z') {
                        echo 'A';
                    } else {
                        echo ++$str;
                    }
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
                    echo printsNextCharacter(true) . '<br>';
                    echo printsNextCharacter(1) . '<br>';
                    echo printsNextCharacter('Hola') . '<br>';
                    echo printsNextCharacter('a') . '<br>';
                    echo printsNextCharacter('l') . '<br>';
                    echo printsNextCharacter('z') . '<br>';
                    echo printsNextCharacter('A') . '<br>';
                    echo printsNextCharacter('L') . '<br>';
                    echo printsNextCharacter('Z') . '<br>';
                    
                    function printsNextCharacter(\$str)
                    {
                        if (gettype(\$str) != 'string') {
                            echo 'No has introducido una cadena';
                        } else if (strlen(\$str) > 1) {
                            echo 'Has introducido más de un carácter';
                        } else if (\$str === 'z') {
                            echo 'a';
                        } else if (\$str === 'Z') {
                            echo 'A';
                        } else {
                            echo ++\$str;
                        }
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

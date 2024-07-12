<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 01</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <span>boletín variables</span>
        <span>ejercicio 01</span>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <p>
                <?php

                echo '<span>Nombre del alumno: Iván López Bermúdez</span><br>',
                '<span>Ciclo formativo que realiza el alumno: Desarrollo de aplicaciones multiplataforma</span><br>',
                '<span>Curso del alumno: Segundo</span>';

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
                        echo '<span>Nombre del alumno: Iván López Bermúdez</span><br>',
                        '<span>Ciclo formativo que realiza el alumno: Desarrollo de aplicaciones multiplataforma</span><br>',
                        '<span>Curso del alumno: Segundo';
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

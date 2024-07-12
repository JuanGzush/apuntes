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
        <p>boletín arrays</p>
        <p>ejercicio 01</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <div class="table-container">
                <?php

                // Se incluye el archivo con el array de personas
                include('ejercicioPHP_Arrays.php');
                // Se incluye un archivo con funciones de utilidad, como createTableFromArray
                include('utils.php');

                global $arrayPersonas;
                $personsTable = createTableFromArray($arrayPersonas);

                echo $personsTable;

                ?>
            </div>
        </article>
    </section>
</main>
<footer>
    <a href="./index.php">volver</a>
    <p>© Iván López Bermúdez</p>
</footer>
</body>

</html>
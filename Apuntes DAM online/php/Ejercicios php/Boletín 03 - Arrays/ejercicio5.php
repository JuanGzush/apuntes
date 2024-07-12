<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 05</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín arrays</p>
        <p>ejercicio 05</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <div class="table-container">
                <?php

                include('ejercicioPHP_Arrays.php');
                include('utils.php');

                global $arrayPersonas;
                $ageArray = array_column($arrayPersonas, 'age');
                $countryArray = array_column($arrayPersonas, 'country');
                $firstNameArray = array_column($arrayPersonas, 'firstname');
                $surnameArray = array_column($arrayPersonas, 'surname');

                array_multisort(
                    $ageArray,
                    SORT_ASC,
                    $countryArray,
                    SORT_ASC,
                    $firstNameArray,
                    SORT_ASC,
                    $surnameArray,
                    SORT_ASC,
                    $arrayPersonas
                );

                $transformedArray = transformArray($arrayPersonas);
                $sortedTable = createTableFromArray($transformedArray);

                echo $sortedTable;

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

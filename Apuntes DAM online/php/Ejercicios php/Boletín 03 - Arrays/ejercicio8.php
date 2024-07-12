<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 08</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín arrays</p>
        <p>ejercicio 08</p>
    </h2>
</header>
<main>
    <section class="output">
        <article>
            <div class="table-container">
                <?php

                include('ejercicioPHP_Arrays.php');
                include('arrayRandom.php');
                include('utils.php');

                global $arrayPersonas;
                global $arrayRandom;
                $filteredArray = filterArray($arrayPersonas, $arrayRandom);
                $filteredTable = createTableFromArray($filteredArray);

                echo $filteredTable;

                function filterArray($array, $arrayRandom): array
                {
                    $filteredArray = [];

                    // Se recorre cada array unidimensional
                    foreach ($array as $auxArray) {
                        /*
                         * La variable temporal referencia a un nuevo array en cada
                         * iteración del bucle, perdiendo la referencia al anterior
                         */
                        $tmpArray = [];

                        // Se recorren los elementos de cada array unidimensional
                        foreach ($auxArray as $key => $value) {
                            // Se utiliza el arrayRandom para las comprobaciones
                            if (($key === 'country') &&
                                (in_array($value, $arrayRandom['countries']))
                            ) {
                                $tmpArray = $auxArray;
                            }

                            // Se utiliza el arrayRandom para las comprobaciones
                            if (($key === 'age') && ($value > $arrayRandom['age'])) {
                                /*
                                 * Solo si se cumplen las dos condiciones se añade
                                 * el array al array que devuelve la función
                                 */
                                $filteredArray[] = $tmpArray;
                            }
                        }
                    }

                    return $filteredArray;
                }

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
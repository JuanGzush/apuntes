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
        <p>boletín arrays</p>
        <p>ejercicio 06</p>
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
                $fiveYoungestArray = getFiveYoungestArray(transformArray($arrayPersonas));
                $fiveYoungestTable = createTableFromArray($fiveYoungestArray);

                echo $fiveYoungestTable;

                function getFiveYoungestArray($array): array
                {
                    $fiveYoungestArray = [];

                    /*
                     * Primero se determina la mayor edad de los 5 más jóvenes, por si hay
                     * más de 5 personas que se correspondan con las 5 edades más pequeñas
                     */
                    uasort($array, 'sortByAge');
                    // array_slice extrae del array un número determinado de elementos
                    $auxFiveYoungestArray = array_slice($array, 0, 5);
                    // Se almacena en una variable la mayor edad de los 5 más jóvenes
                    $youngestMaxAge = $auxFiveYoungestArray[4]['age'];

                    /*
                     * Después se añaden al array que devuelve la función las personas
                     * que se correspondan con las 5 edades más pequeñas
                     * Se recorre cada array unidimensional
                     */
                    foreach ($array as $auxArray) {
                        // Se recorren los elementos de cada array unidimensional
                        foreach ($auxArray as $key => $value) {
                            if (($key === 'age') && ($value <= $youngestMaxAge)) {
                                $fiveYoungestArray[] = $auxArray;
                            }
                        }
                    }

                    return $fiveYoungestArray;
                }

                function sortByAge($person1, $person2): int
                {
                    if ($person1['age'] === $person2['age']) {
                        return 0;
                    }

                    return ($person1['age'] < $person2['age']) ? -1 : 1;
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

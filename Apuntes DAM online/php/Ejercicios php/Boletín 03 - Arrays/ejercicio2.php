<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 02</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín arrays</p>
        <p>ejercicio 02</p>
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
                $minAgeArray = getMinAgeArray($arrayPersonas);
                $maxAgeArray = getMaxAgeArray($arrayPersonas);

                /*
                 * Se crea un nuevo array a partir de los dos anteriores
                 * La función array_merge no tiene en cuenta los índices, por lo que se
                 * añaden todos los elementos de los dos arrays al nuevo array
                 */
                $minMaxArray = array_merge($minAgeArray, $maxAgeArray);

                $minMaxTable = createTableFromArray($minMaxArray);

                echo $minMaxTable;

                function getMinAgeArray($array): array
                {
                    $minAgeArray = [];
                    // La edad mínima tendrá como valor inicial cualquier edad del array de personas
                    try {
                        $minAge = $array[random_int(0, sizeof($array))]['age'];
                    } catch (Exception) {
                        echo '<h2>Error al calcular la edad mínima</h2>';
                    }

                    // Se determina la menor edad
                    // Se recorre cada array unidimensional
                    foreach ($array as $auxArray) {
                        // Se recorren los elementos de cada array unidimensional
                        foreach ($auxArray as $key => $value) {
                            // Solo se realiza la comparación si la clave coincide con la edad
                            if (($key === 'age') && ($minAge > $value)) {
                                $minAge = $value;
                            }
                        }
                    }

                    // Se recorre cada array unidimensional
                    foreach ($array as $auxArray) {
                        // Se recorren los elementos de cada array unidimensional
                        foreach ($auxArray as $key => $value) {
                            // Solo se realiza la comparación si la clave coincide con la edad
                            if (($key === 'age') && ($value === $minAge)) {
                                $minAgeArray[] = $auxArray;
                            }
                        }
                    }

                    return $minAgeArray;
                }

                function getMaxAgeArray($array): array
                {
                    $maxAgeArray = [];
                    // La edad máxima tendrá como valor inicial cualquier edad del array de personas
                    try {
                        $maxAge = $array[random_int(0, sizeof($array))]['age'];
                    } catch (Exception) {
                        echo '<h2>Error al calcular la edad máxima</h2>';
                    }

                    /*
                     * Se determina la mayor edad
                     * Se recorre cada array unidimensional
                     */
                    foreach ($array as $auxArray) {
                        // Se recorren los elementos de cada array unidimensional
                        foreach ($auxArray as $key => $value) {
                            // Solo se realiza la comparación si la clave coincide con la edad
                            if (($key === 'age') && ($maxAge < $value)) {
                                $maxAge = $value;
                            }
                        }
                    }

                    // Se recorre cada array unidimensional
                    foreach ($array as $auxArray) {
                        // Se recorren los elementos de cada array unidimensional
                        foreach ($auxArray as $key => $value) {
                            // Solo se realiza la comparación si la clave coincide con la edad
                            if (($key === 'age') && ($value === $maxAge)) {
                                $maxAgeArray[] = $auxArray;
                                // También se tiene en cuenta si coinciden las edades
                            }
                        }
                    }

                    return $maxAgeArray;
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

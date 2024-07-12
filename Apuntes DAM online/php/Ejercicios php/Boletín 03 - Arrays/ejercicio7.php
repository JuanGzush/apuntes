<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 07</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín arrays</p>
        <p>ejercicio 07</p>
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

                // Se ordena el array antes de pasarlo a la función
                array_multisort(
                    array_column($arrayPersonas, 'country'),
                    SORT_DESC,
                    array_column($arrayPersonas, 'age'),
                    SORT_DESC,
                    $arrayPersonas
                );

                $oldestByCountryArray = getOldestByCountryArray(transformArray($arrayPersonas));
                $oldestByCountryTable = createTableFromArray($oldestByCountryArray);

                echo $oldestByCountryTable;

                function getOldestByCountryArray($array): array
                {
                    $oldestByCountryArray = [];

                    // Se definen variables para el país y para la edad máxima
                    $currentCountry = '';
                    $maxAge = 0;

                    foreach ($array as $auxArray) {
                        if ($currentCountry != $auxArray['country']) {
                            /*
                             * Si los países no coinciden, la variable toma el valor del nuevo país
                             * Al estar ordenados, los países se recorren en orden
                             */
                            $currentCountry = $auxArray['country'];
                            /*
                             * Al cambiar de país se guarda la edad
                             * Como el array está ordenado por edad descendentemente, se guarda la edad máxima
                             */
                            $maxAge = $auxArray['age'];
                            $oldestByCountryArray[] = $auxArray;
                        } else {
                            // Si no se cambia de país, se comprueba si coincide la edad con la edad máxima
                            if ($auxArray['country'] === $maxAge) {
                                $oldestByCountryArray[] = $auxArray;
                            }
                        }
                    }

                    return $oldestByCountryArray;
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

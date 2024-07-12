<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 03</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<header>
    <h1>soluciones a los ejercicios</h1>
    <h2>
        <p>boletín arrays</p>
        <p>ejercicio 03</p>
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
                $code3Array = getCodeThreeArray($arrayPersonas);
                $code3Table = createTableFromArray($code3Array);

                echo $code3Table;

                function getCodeThreeArray($array): array
                {
                    $code3Array = [];

                    // Se recorre cada array unidimensional
                    foreach ($array as $auxArray) {
                        // Se recorren los elementos de cada array unidimensional
                        foreach ($auxArray as $key => $value) {
                            // Solo se realiza la comparación si la clave coincide con el país
                            if (($key === 'country') && ($value === 3)) {
                                $code3Array[] = $auxArray;
                            }
                        }
                    }

                    return $code3Array;
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

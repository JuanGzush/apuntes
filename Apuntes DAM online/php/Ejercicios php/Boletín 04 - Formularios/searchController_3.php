<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Boletín Formularios - Search Controller</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_searchController.css'>
</head>

<body>
<a href="search_3.html">Volver</a>
<header>
    <h1>Resultado de la búsqueda</h1>
</header>
<main>
    <div class="table-container">
        <?php

        if (isset($_POST['submit'])) {
            include('utils.php');
            include('ejercicioPHP_formulario.php');

            global $arrayPersonas;
            // Se validan los datos introducidos por el usuario
            $firstname = validateInput($_POST['firstname']);
            $surname = validateInput($_POST['surname']);
            $age = validateInput($_POST['age']);
            $operator = validateInput($_POST['operator']);
            $country = '';
            // El control radioButton solo se envía si se marca alguno de los radiobutton
            if (isset($_POST['country'])) {
                $country = validateInput($_POST['country']);
            }
            $result = '';

            // Se realizan varias validaciones con el nombre y la edad
            if (empty($firstname)) {
                $result .= 'No has introducido el nombre' . '<br>';
            } else if (!empty($operator) && empty($age)) {
                $result .= 'Has indicado un operador pero no has introducido la edad';
            } else if (!empty($age) && !is_numeric($age)) {
                $result .= 'No has introducido un número para la edad';
            } else {
                $filteredArray = arrayFilter(
                    transformArray($arrayPersonas),
                    $firstname,
                    $surname,
                    $age,
                    $operator,
                    $country,
                    true,
                    false
                );

                // Si la búsqueda no ha dado ningún resultado se muestra un mensaje al usuario
                if (empty($filteredArray)) {
                    $result = '<span>No se ha encontrado ningún resultado</span>';
                } else {
                    $result = createTableFromArray($filteredArray);
                }
            }

            echo $result;
        } else {
            echo '<span>No se ha encontrado ningún resultado</span>';
        }

        ?>
    </div>
</main>
</body>

</html>

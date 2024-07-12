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
<a href="search_2.html">Volver</a>
<header>
    <h1>Resultado de la búsqueda</h1>
</header>
<main>
    <div class="table-container">
        <?php

        if (isset($_POST['send'])) {
            include('utils.php');
            include('ejercicioPHP_formulario.php');

            global $arrayPersonas;
            // Se validan los datos introducidos por el usuario
            $firstname = validateInput($_POST['firstname']);
            $surname = validateInput($_POST['surname']);
            $age = validateInput($_POST['age']);
            $operator = validateInput($_POST['operator']);
            // Se añaden los países marcados en el checkbox a un array
            $countries = [];
            // El control checkBox solo se envía si es marcado
            if (isset($_POST['country0'])) {
                $countries[] = $_POST['country0'];
            }
            if (isset($_POST['country1'])) {
                $countries[] = $_POST['country1'];
            }
            if (isset($_POST['country2'])) {
                $countries[] = $_POST['country2'];
            }
            if (isset($_POST['country3'])) {
                $countries[] = $_POST['country3'];
            }
            if (isset($_POST['country4'])) {
                $countries[] = $_POST['country4'];
            }
            if (isset($_POST['country5'])) {
                $countries[] = $_POST['country5'];
            }
            if (isset($_POST['country6'])) {
                $countries[] = $_POST['country6'];
            }
            $validatedCountries = validateInputArray($countries);
            $result = '';

            // Se comprueba si el usuario ha introducido al menos un campo
            if (empty($firstname) && empty($surname) && empty($age) && empty($operator) && empty($countries)) {
                $result = 'No has introducido ningún campo';
            } else if (!empty($operator) && empty($age)) { // Se realizan varias validaciones relacionadas con la edad
                $result = 'Has indicado un operador pero no has introducido la edad';
            } else if (!empty($age) && !is_numeric($age)) {
                $result = 'No has introducido un número para la edad';
            } else {
                $filteredArray = arrayFilter(
                    transformArray($arrayPersonas),
                    $firstname,
                    $surname,
                    $age,
                    $operator,
                    $validatedCountries,
                    true,
                    true
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

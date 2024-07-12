<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 09</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_exercises.css'>
</head>

<body>
<main>
    <a href="exercise09.html">Volver</a>
    <?php

    use Medoo\Medoo;

    include('utils.php');
    include('Medoo.php');

    // El script se ejecuta tanto si proviene de la primera página como de la tercera
    if (isset($_POST['display']) || isset($_POST['return'])) {
        $hospCode = $_POST['hosp_code'];

        if (empty($hospCode)) {
            echo '<h3>NO HAS INTRODUCIDO EL NÚMERO DEL HOSPITAL</h3>';
            exit();
        } else if (!is_numeric($hospCode)) {
            echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL NÚMERO DEL HOSPITAL</h3>';
            exit();
        } else if ($hospCode <= 0) {
            echo '<h3>DEBES INTRODUCIR UN NÚMERO POSITIVO PARA EL NÚMERO DEL HOSPITAL</h3>';
            exit();
        }

        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'ejemplo',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);

        $result = $database->select(
            'hospitales',
            ['nombre', 'direccion', 'num_plazas'],
            ['cod_hospital' => $hospCode]);

        if (empty($result)) {
            echo '<h3>EL NÚMERO DE HOSPITAL NO SE ENCUENTRA EN LA BASE DE DATOS</h3>';
            exit();
        }

        $hospName = $result[0]['nombre'];
        $direction = $result[0]['direccion'];
        $numPlaces = $result[0]['num_plazas'];

        echo <<<EOF
        <form action="exercise09_02.php" method="POST">
            <ul>
                <li>
                    <label for="nombre_hosp"> Nombre:</label>
                    <input name="hosp_name" id="nombre_hosp" type="text" value="$hospName" size="15"/>
                </li>
                <li>
                    <label for="direccion_hosp"> Dirección:</label>
                    <input name="hosp_direction" id="direccion_hosp" type="text" value="$direction" size="15"/>
                </li>
                <li>
                    <label for="num_plazas"> Número de plazas:</label>
                    <input name="num_places" id="num_plazas" type="text" value="$numPlaces" size="5"/>
                </li>
                <li>
                    <!-- Para recoger de nuevo el valor del código del hospital -->
                    <input type="hidden" name="hosp_code" value="$hospCode"/>
                </li>
                <li>
                    <button type="submit" name="update"> Actualizar</button>
                </li>
            </ul>
        </form>
EOF;
    } else {
        echo '<h3>ERROR 404: NOT FOUND</h3>';
    }

    ?>
</main>
</body>

</html>

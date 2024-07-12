<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 10 - Bases De Datos 02 </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='exercise02.css'>
</head>

<body>
<main>
    <a href="exercise02.html">Volver</a>
</main>
</body>

</html>

<?php

$connection = mysqli_connect('localhost', 'root', '', 'alumnos')
or die('<h3>NO SE HA PODIDO REALIZAR LA CONEXIÓN</h3>');

$result = null;
$caption = '';
$studentNum = 0;

if (isset($_POST['all_students'])) {
    $result = mysqli_query(
        $connection,
        "SELECT NUM_MATRICULA, NOMBRE, POBLACION, COD_CURSO FROM alumnos"
    );

    if (mysqli_errno($connection) != 0) {
        echo '<h3>FALLO EN LA CONSULTA</h3>';
        exit();
    }

    $studentNum = mysqli_num_rows($result);
    if ($studentNum == 0) {
        echo "<h3>NO EXISTEN ALUMNOS EN LA BASE DE DATOS</h3>";
        exit();
    }

    $caption = 'listado de todos los alumnos';
} else if (isset($_POST['by_course'])) {
    $course = $_POST['course'];

    if (empty($course)) {
        echo '<h3>NO HAS INTRODUCIDO UN Nº DE CURSO</h3>';
        exit();
    } else if (!is_numeric($course)) {
        echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL Nº DE CURSO</h3>';
        exit();
    }

    $result = mysqli_query(
        $connection,
        "SELECT NUM_MATRICULA, NOMBRE, POBLACION, COD_CURSO FROM alumnos WHERE COD_CURSO LIKE '%$course'"
    );

    if (mysqli_errno($connection) != 0) {
        echo '<h3>FALLO EN LA CONSULTA</h3>';
        exit();
    }

    $studentNum = mysqli_num_rows($result);
    if ($studentNum == 0) {
        echo "<h3>NO EXISTEN ALUMNOS EN EL CURSO $course</h3>";
        exit();
    }

    $caption = "Listado de los alumnos del curso $course";
} else {
    echo '<h3>ERROR 404: NOT FOUND</h3>';
    exit();
}

echo createTableFromResult($result, $caption);
echo "<p>Número de Alumnos: $studentNum</p>";

mysqli_close($connection) or die('<h3>NO SE HA PODIDO CERRAR LA CONEXIÓN CORRECTAMENTE</h3>');

function createTableFromResult(mysqli_result $result, string $caption): string
{
    $table = '<table>';

    $table .= "<caption>$caption</caption>";

    $table .= <<<EOF
                    <thead>
                        <tr>
                            <th scope="col">CÓDIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">POBLACIÓN</th>
                            <th scope="col">CURSO</th>
                        </tr> 
                    </thead>
               EOF;

    $table .= '<tbody>';

    foreach ($result as $array) {
        $table .= '<tr>';

        foreach ($array as $value) {
            $table .= '<td>' . $value . '</td>';
        }

        $table .= '</tr>';
    }

    $table .= '</table>';

    return $table;
}

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 10 - Bases De Datos 02 </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='exercise01.css'>
</head>

<body>
<main>
    <a href="exercise01.html">Volver</a>
</main>
</body>

</html>

<?php

if (isset($_POST['send'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'ejemplo')
    or die('<h3>NO SE HA PODIDO REALIZAR LA CONEXIÓN</h3>');
    $depart = $_POST['depart'];
    $office = strtoupper($_POST['office']);

    if (empty($depart) && empty($office)) {
        echo '<h3>NO HAS INTRODUCIDO NI UN Nº DE DEPARTAMENTO NI UN OFICIO CONCRETO</h3>';
        exit();
    } else if (empty($depart)) {
        echo '<h3>NO HAS INTRODUCIDO UN Nº DE DEPARTAMENTO</h3>';
        exit();
    } else if (!is_numeric($depart)) {
        echo '<h3>NO HAS INTRODUCIDO DÍGITOS PARA EL Nº DE DEPARTAMENTO</h3>';
        exit();
    } else if (empty($office)) {
        echo '<h3>NO HAS INTRODUCIDO UN OFICIO CONCRETO</h3>';
        exit();
    } else if (mysqli_errno($connection) != 0) {
        echo '<h3>FALLO EN LA CONSULTA</h3>';
        exit();
    }

    $result = mysqli_query(
        $connection,
        "SELECT emp_no, apellido, salario FROM emple WHERE dept_no = '$depart' AND oficio = '$office'"
    );
    $empNum = mysqli_num_rows($result);
    if ($empNum == 0) {
        echo "<h3>NO EXISTEN EMPLEADOS EN EL DEPARTAMENTO $depart CON EL OFICIO DE $office</h3>";
        exit();
    }
    $result2 = mysqli_query($connection, "SELECT dnombre FROM depart WHERE dept_no = $depart");
    $departName = mysqli_fetch_array($result2)[0];

    echo createTableFromResult($result, $departName, $office);
    echo "<p>Número de empleados: $empNum</p>";

    mysqli_close($connection) or die('<h3>NO SE HA PODIDO CERRAR LA CONEXIÓN CORRECTAMENTE</h3>');
} else {
    echo '<h3>ERROR 404: NOT FOUND</h3>';
}

function createTableFromResult(mysqli_result $result, string $departName, string $office): string
{
    $table = '<table>';

    $table .= "<caption>Listado de los empleados del departamento de $departName con el Oficio de $office</caption>";

    $table .= <<<EOF
                    <thead>
                        <tr>
                            <th scope="col">EMPLEADO</th>
                            <th scope="col">APELLIDO</th>
                            <th scope="col">SALARIO</th>
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

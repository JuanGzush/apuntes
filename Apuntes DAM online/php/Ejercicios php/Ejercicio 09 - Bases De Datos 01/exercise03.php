<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Bases de datos 01 - Ejercicio 03</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" media="screen" href="exercise03.css"/>
</head>

</html>

<?php

$connection = mysqli_connect('localhost', 'root', '', 'ejemplo')
or die('<h2>Connect eror ' . mysqli_connect_errno() . ' No se ha podido realizar la conexión' . '</h2>');

echo '<h2>Conexión realizada satisfactoriamente</h2>';

$result = mysqli_query($connection, 'Select * From depart');

echo createTableFromResult($result);

$numDepart = mysqli_num_rows($result);

echo "<p>Número de departamentos:  $numDepart</p>";

if (mysqli_close($connection) or die('<h2>No se ha podido cerrar la conexión</h2>')) {
    echo '<h2>Conexión finalizada correctamente</h2>';
}

function createTableFromResult(mysqli_result $result): string
{
    $table = '<table>';

    $table .= '<caption>listado de los departamentos</caption>';

    $table .= <<<EOF
                    <thead>
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Localidad</th>
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

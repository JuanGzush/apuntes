<?php

$connection = mysqli_connect('localhost', 'root', '', 'ejemplo')
or die('<h2>Connect eror ' . mysqli_connect_errno() . ' No se ha podido realizar la conexión' . '</h2>');

echo '<h2>Conexión realizada satisfactoriamente</h2>';

$result = mysqli_query($connection, 'Select * From depart');

while ($row = mysqli_fetch_array($result)) {
    echo <<<EOF
    Departamento: $row[0] <br>
    Nombre: $row[1] <br>
    Localidad: $row[2] <br> <br>
    EOF;
}

if (mysqli_close($connection) or die('<h2>No se ha podido cerrar la conexión</h2>')) {
    echo '<h2>Conexión finalizada correctamente</h2>';
}

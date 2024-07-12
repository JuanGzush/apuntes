<?php

$connection = mysqli_connect('localhost', 'root', '', 'ejemplo')
or die('<h2>Connect eror ' . mysqli_connect_errno() . ' No se ha podido realizar la conexión' . '</h2>');

echo '<h2>Conexión realizada satisfactoriamente</h2>';

$result = mysqli_query(
    $connection,
    'Select apellido, oficio, salario From emple WHERE dept_no = 20'
);

while ($row = mysqli_fetch_array($result)) {
    echo <<<EOF
    Apellido: $row[0] <br>
    Oficio: $row[1] <br>
    Salario: $row[2] <br> <br>
    EOF;
}

$numEmp = mysqli_num_rows($result);

echo "<Strong> Número de empleados del departamento 20: $numEmp</Strong> ";

if (mysqli_close($connection) or die('<h2>No se ha podido cerrar la conexión</h2>')) {
    echo '<h2>Conexión finalizada correctamente</h2>';
}

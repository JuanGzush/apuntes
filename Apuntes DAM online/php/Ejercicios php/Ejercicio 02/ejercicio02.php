<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 02</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='ejercicio02.css'>
</head>

<body>
<!-- Apartado 01: -->
<?php

const TAM = 10;
$num = 0;
$table = '<table>';

for ($i = 0; $i < TAM; $i++) {
    $table .= '<tr>';

    for ($j = 0; $j < TAM; $j++) {
        $table .= '<td>' . ++$num . '</td>';
    }

    $table .= '</tr>';
}

$table .= '</table>';

echo $table;

?>

<!-- Apartado 02: -->
<?php

$table .= "<head>
                    <style type=\"text/css\">
                        table:last-of-type tr:nth-of-type(odd) {
                            background-color: chartreuse;
                                }
                        table:last-of-type tr:nth-of-type(even) {
                            background-color: cadetblue;
                                }
                    </style>
                </head>";

echo $table;

?>
</body>

</html>

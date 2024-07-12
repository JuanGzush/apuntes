<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 03</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='ejercicio03.css'>
</head>

<body>
<?php

const DAYS = 365;
const HOURS = 24;
const MINUTES = 60;
const SECONDS = 60;
$year = 33;

$str = asterisksSpan();

$str .= '<p>Cálculos para la edad de una persona</p>';

$str .= asterisksSpan();

$str .= '<br>' . '<p>Para una persona de 33 años...</p>';

$str .= '<br>' . '<span>Su edad en días es: ' . $year * DAYS . '</span>';
$str .= '<br>' . '<span>Su edad en horas es: ' . $year * DAYS * HOURS . '</span>';
$str .= '<br>' . '<span>Su edad en minutos es: ' . $year * DAYS * HOURS * MINUTES . '</span>';
$str .= '<br>' . '<span>Su edad en segundos es: ' . $year * DAYS * HOURS * MINUTES * SECONDS . '</span>';

echo $str;

function asterisksSpan(): string
{
    $str = '<span>';
    $str .= str_repeat('*', 50);
    $str .= '</span>';

    return $str;
}

?>
</body>

</html>
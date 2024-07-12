<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Boletín 05 - Subida, Lectura Y Escritura De Ficheros</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_libros_datos.css'>
</head>

<body>
<?php

$booksFile = fopen('libros.txt', 'a+b');
$results = '';

if ($booksFile) {
    $results .= 'El fichero se ha abierto satisfactoriamente' . '</br>';

    // file_get_contents retorna false si la operación no se lleva a cabo con éxito
    if (file_get_contents('Libros.txt') != false) {
        // Se reemplazan los valores de la constante PHP_EOL por saltos de línea </br>
        $booksData = str_replace(PHP_EOL, '</br>', file_get_contents('Libros.txt'));

        echo '<div>' . $booksData . '</div>';

        $results .= 'Datos mostrados satisfactoriamente';
    } else {
        $results .= 'No se han podido mostrar los datos';
    }

    // El fichero siempre debe cerrarse
    fclose($booksFile);
} else {
    $results .= 'No se ha podido abrir el fichero';
}

echo '<p>' . $results . '</p>';

?>

<a href="libros.html">Volver</a>
</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Boletín 05 - Subida, Lectura Y Escritura De Ficheros</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_libros_guardar.css'>
</head>

<body>
<?php

if (isset($_POST['send'])) {
    if (!empty($_POST['title']) && isset($_POST['type'])) {
        $title = validateInput($_POST['title']);
        $type = validateInput($_POST['type']);
        $observations = '';
        if ((!empty($_POST['observations']))) {
            $observations = validateInput($_POST['observations']);
        }
        $booksFile = fopen('libros.txt', 'a+b');
        $results = '';

        if ($booksFile) {
            $results .= 'El fichero se ha abierto satisfactoriamente' . '</br>';

            $string_to_write = '';

            // Solo se añade el separador si el fichero no estaba vacío
            if (strlen(file_get_contents('Libros.txt')) != 0) {
                $string_to_write .= addDivider();
            }
            $string_to_write .= 'Título: ' . $title . PHP_EOL;
            $string_to_write .= 'Tipo: ' . $type . PHP_EOL;
            if ((!empty($_POST['observations']))) {
                $string_to_write .= 'Observaciones: ' . $observations;
            }

            if (fwrite($booksFile, $string_to_write, strlen($string_to_write)) != false) {
                $results .= 'Datos guardados satisfactoriamente';
            } else {
                $results .= 'No se han podido guardar los datos';
            }

            // El fichero siempre debe cerrarse
            fclose($booksFile);
        } else {
            $results .= 'No se ha podido abrir el fichero';
        }

        echo '<p>' . $results . '</p>';
    } else {
        $errors = '';

        if (empty($_POST['title'])) {
            $errors .= 'Debe introducir el título del libro' . '</br>';
        }

        if (!isset($_POST['type'])) {
            $errors .= 'Debe introducir el tipo de libro';
        }

        echo '<p>' . $errors . '</p>';
    }
} else {
    echo '<h2>ERROR 404: NOT FOUND</h2>';
}

function validateInput($input): string
{
    return trim(htmlspecialchars($input));
}

function addDivider(): string
{
    // PHP_EOL: Constante de PHP para añadir un salto de línea
    $divider = PHP_EOL;
    $divider .= str_repeat('-', 50);
    $divider .= PHP_EOL;

    return $divider;
}

?>

<a href="libros.html">Volver</a>
</body>

</html>

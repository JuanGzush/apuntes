<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 07</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>
<?php

if (isset($_POST['send'])) {
    if (areUploadedFiles($_FILES['name_files']['tmp_name'])) {
        echo 'Los ficheros se han subido correctamente<br/>';

        if (havePermittedSize($_FILES['name_files']['size'])) {
            echo 'Ningún fichero sobrepasa el tamaño máximo permitido: 20 MB<br/>';

            if (havePermittedType($_FILES['name_files']['type'])) {
                echo "La extensión txt está permitida<br/>";

                $uploadedFiles = moveAndDownloadFiles($_FILES['name_files']['tmp_name'], $_FILES['name_files']['name']);

                openAndWriteFiles($uploadedFiles);
            } else {
                echo "Algún fichero tiene una extensión no permitida";
            }
        } else {
            echo 'Algún fichero sobrepasa el tamaño máximo permitido: 20Mb<br />';
        }
    } else {
        echo 'No se ha subido ningún fichero';
    }
} else {
    echo "<h2 style=\"width: max-content; margin: 5rem auto 0;\">ERROR 404: NOT FOUND</h2>";
}

// Se comprueba si los ficheros se han subido
function areUploadedFiles(array $files): bool
{
    foreach ($files as $file) {
        if (!is_uploaded_file($file)) {
            return false;
        }
    }

    return true;
}

const PermittedSize = 20 * 1024 * 1024;

// Se comprueba si los ficheros tienen el tamaño permitido
function havePermittedSize(array $files): bool
{
    foreach ($files as $file) {
        if ($file >= PermittedSize) {
            return false;
        }
    }

    return true;
}

const PermittedType = 'text/plain';

// Se comprueba si los ficheros tiene el tipo permitido
function havePermittedType(array $files): bool
{
    foreach ($files as $file) {
        if ($file != PermittedType) {
            return false;
        }
    }

    return true;
}

// Se mueven los ficheros y se crea el enlace para la descarga
function moveAndDownloadFiles(array $tmpNameArray, array $nameArray): array
{
    $uploadedFiles = [];
    $originArray = [];
    $destinyArray = [];

    foreach ($tmpNameArray as $auxArray) {
        $originArray[] = $auxArray;
    }

    foreach ($nameArray as $auxArray) {
        $rand = rand(1000, 999999);
        $destinyArray[] = 'uploads/' . $rand . $auxArray;
        $uploadedFiles[] = 'uploads/' . $rand . $auxArray;

        // Se crea el enlace para la descarga
        echo '<a href="download.php?file=' . $rand . $auxArray . '" >Descargar ' . $auxArray . '</a><br/>';
    }

    for ($i = 0; $i < sizeof($originArray); $i++) {
        // Se mueve el fichero
        move_uploaded_file($originArray[$i], $destinyArray[$i]);
    }

    return $uploadedFiles;
}


// Se modifican los ficheros con la fecha
function openAndWriteFiles(array $files)
{
    foreach ($files as $file) {
        $file = fopen($file, 'w+');

        if (!$file) {
            echo 'No se puede abrir el fichero';
        } else {
            $date = date('d-m-Y H:i:s');

            fwrite($file, $date, strlen($date));
        }

        fclose($file);
    }
}

?>
</body>

</html>

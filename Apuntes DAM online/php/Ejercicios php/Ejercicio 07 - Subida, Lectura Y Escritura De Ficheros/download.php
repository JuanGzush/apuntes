<?php

// Se comprueba que el fichero ha sido asignado y que no equivale a cadena vacía
if (isset($_GET['file']) && !empty($_GET['file'])) {
    $file = $_GET['file'];
    $path = 'uploads/' . $file;

    if (is_file($path)) {
        header("Content-Description: File Transfer");
        header("Content-Type: application/force-download");
        header('Content-Disposition: attachment; filename=' . $file);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($path));

        readfile($path);
    }
    exit();
}

<?php

// Si la variable archivo que pasamos por URL no está
//establecida acabamos la ejection del script.
if (empty($_GET['archivo'])) {
    // No hace nada
} else {
    $archivo = $_GET['archivo'];

    $ruta = 'uploads/' . $archivo;
    if (is_file($ruta)) {
        header("Content-Description: File Transfer");
        header("Content-Type: application/force-download");
        header('Content-Disposition: attachment; filename=' . $archivo);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($ruta));
        // Lee el fichero y lo descarga
        readfile($ruta);
    }
    exit();
}

?>


<!-- Enlace directo -->
<a href="uploads/1.png" download="prueba.jpg">Descargar PNG</a>
<a href="uploads/1.png">Descargar PNG</a>

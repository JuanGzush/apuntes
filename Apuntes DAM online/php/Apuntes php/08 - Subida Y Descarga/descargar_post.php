<?php
// Si la variable archivo que pasamos por no está
// establecida acabamos la ejection del script.
if (empty($_POST['archivo'])) {
    // No hace nada
} else {
    $archivo = $_POST['archivo'];
    // Aquí es donde están las imágenes a descargar.
    $ruta = 'uploads/' . $archivo;
    // Indica si el fichero dado es un fichero normal.
    if (is_file($ruta)) {
        header("Content-Description: File Transfer");
        header("Content-Type: application/force-download");
        header('Content-Disposition: attachment; filename=' . $archivo);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($ruta));
        // Lee el fichero y lo descarga
        readfile($ruta);
        exit();
        // Evito que se imprima nada en el fichero a descargar que pueda corromper.
    } else {
        echo "El archivo que se pretende descargar NO existe";
    }
}
?>

<form action="descargar_post.php" method="POST">
    Introduzca el nombre del fichero que quieres descargar.
    <input type="text" name="archivo">
    <input type="submit" value="Descargar"/>
</form>

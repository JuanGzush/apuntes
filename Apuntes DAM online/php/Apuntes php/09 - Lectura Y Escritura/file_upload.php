<?php
// Error See http://php.net/manual/es/features.file-upload.errors.php
// UPLOAD_ERR_OK
// Valor: 0; No hay error, fichero subido con éxito.

// Esto es para hacer debug
echo "<pre>";
print_r($_FILES);
echo "</pre>";


// Definimos el directorio donde vamos a mover los ficheros subidos, este
// directorio debe tener los permisos necesarios para poder leer y escribir
// en él.
$uploads_dir = 'files';

// Como para cada clave del array $_FILES va a contener un array, en el caso de que
// hayamos definido el formulario para enviar múltiples ficheros con el mismo
// name, en nuestro caso name_files, vamos a recorrer los errores producidos
// por cada fichero subido. (UPLOAD_ERR_OK constante de PHP que es igual a 0)
// Si no hay error movemos el fichero a nuestro directorio y
// lo abrimos y escribimos en él.

foreach ($_FILES["name_files"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        // dame la ruta temporal de cada archivo
        $tmp_name = $_FILES["name_files"]["tmp_name"][$key];
        // basename: se le pasa una ruta y se queda con el último componente
        $name = basename($_FILES["name_files"]["name"][$key]);
        // Ya tengo el nombre del archivo ($name) y la ruta donde está, ahora necesito
        // crear la ruta de destino:
        if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {
            // Ya lo hemos movido ahora quiero abrir y escribir en él:
            // NUEVO
            // Abrimos el fichero que acabamos de mover.

            $r_file = fopen("$uploads_dir/$name", 'a+b');
            // la function fopen(ruta del fichero, modo de apertura)
            /* a+ => Apertura para lectura y escritura,
            coloca el puntero al final del archivo.
            Si el archivo no existe se intenta crear.
            b => Apertura en modo binario. */

            if (!$r_file) { // Devuelve un FALSE
                echo 'No se puede abrir el fichero.';
            } else {
                $string_to_write = "Se ha subido el fichero con nombre $name \n";
                // Imprime la fecha en un formato DATE_RFC2822, ver php.net para más detalle
                $string_to_write .= date(DATE_RFC2822);

                // Escribimos el string creado anteriormente. "strlen"  Obtiene la
                // longitud de un string. Este campo no es necesario.
                fwrite($r_file, $string_to_write, strlen($string_to_write));
            }

            // IMPORTANTE cerrar el fichero, para desbloquearlo y que otro pueda
            // usarlo.
            fclose($r_file);
        }
    }
}

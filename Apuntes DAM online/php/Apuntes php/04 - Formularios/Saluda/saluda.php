<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Saluda</title>
</head>

<body>
Hola <?php echo $_POST['nombre']; ?>
que tengas un buen día.

<?php


print "<pre>";
// Con $_REQUEST podemos ver tanto GET como POST
print_r($_REQUEST);
print_r($_POST);
print "</pre>\n";
print "<p>Hola $_POST[nombre] que tengas un buen día</p></br>";

// Detectamos si hemos enviado(pulsado el botón) el formulario o no:
if (isset($_REQUEST["enviar"])) {
    // Do something
    print "hola";
}

?>

</body>

</html>

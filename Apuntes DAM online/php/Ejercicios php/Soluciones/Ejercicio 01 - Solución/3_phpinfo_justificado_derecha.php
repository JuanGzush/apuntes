<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Forma 1:usando la etiqueta link -->
    <link rel="stylesheet" href="estilo.css">

    <!-- Forma2: usando la etiqueta style (siempre en la cabecera) -->
    <style type="text/css">
        * {
            text-align: right;
        }

        table {
            margin-right: 0;
        }
    </style>

    <!-- Forma 3:usando la etiqueta link pero desde php -->
    <?php
    echo "<link rel=\"stylesheet\" href=\"estilo.css\">";
    ?>

    <title>Phpinfo justificado a la derecha</title>
</head>

<body>

<?php
phpinfo();
?>

<!-- Forma 4: incluir el contenido CSS como valor del atributo `style` de una determinada etiqueta
    No se recomienda usarlo -->
<div style="float: right">
    <?php
    phpinfo()
    ?>
</div>

<!-- Forma 5: igual que el anterior pero desde php. -->
<?php
echo "<div style = \"float: right\">";
?>

</body>

</html>

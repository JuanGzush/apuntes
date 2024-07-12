<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 01</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='ejercicio01.css'>
    <style type="text/css">
        /* body {
            background-color: skyblue
        } */

        div {
            float: right;
        }
    </style>
</head>

<body style="background-color: skyblue">

<!-- Apartado 01: -->
<p>
    <?php

    print 'Esta es una cadena' . ' concatenada a otra';

    ?>
</p>

<!-- Apartado 02: -->
<p>
    <?php

    $x = 1;
    $y = 2;

    print $x + $y;

    ?>
</p>

<!-- Apartado 03: -->
<?php

phpinfo();

?>

<?php

//echo "<div style = \"float: right\">";

?>

</body>

</html>

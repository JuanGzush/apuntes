<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ejercicio 05 - Calculadora</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='ejercicio05_calculadora.css'>
</head>

<body>
<header>
    <h1>Calculadora</h1>
</header>
<main>
    <form action="#" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="first_number">Introduzca el primer número</label>
                <input type="text" id="first_number" name="num1">
            </li>
            <li>
                <label for="second_number">Introduzca el segundo número</label>
                <input type="text" id="second_number" name="num2">
            </li>
            <li>
                <label for="third_number">Introduzca el tercer número</label>
                <input type="text" id="third_number" name="num3">
            </li>
            <li>
                <label for="operation">Seleccione la operación a realizar</label>
                <select name="selected" id="operation">
                    <option value="">- Selecciona -</option>
                    <option value="suma">Suma</option>
                    <option value="resta">Resta</option>
                    <option value="multiplicación">Multiplicación</option>
                    <option value="división">División</option>
                </select>
            </li>
        </ul>
        <button type="submit" name="submit" value="">Obtener resultado</button>
        <div class="result">
            <?php

            if (isset($_REQUEST['submit']) && isset($_POST['num1']) && isset($_POST['num2']) &&
                isset($_POST['num3']) && isset($_POST['selected'])) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $num3 = $_POST['num3'];
                $selected = $_POST['selected'];

                if (is_numeric($num1) && is_numeric($num2) && is_numeric($num3) && !empty($_POST['selected'])) {
                    if ($selected === "suma") {
                        echo "El resultado de sumar $num1 más $num2 más $num3 es igual a " . $num1 + $num2 + $num3;
                    } else if ($selected === "resta") {
                        echo "El resultado de restar $num1 menos $num2 menos $num3 es igual a " . $num1 - $num2 - $num3;
                    } else if ($selected === "multiplicación") {
                        echo "El resultado de multiplicar $num1 por $num2 por $num3 es igual a " . $num1 * $num2 * $num3;
                    } else if ($selected === "división") {
                        echo "El resultado de dividir $num1 por $num2 por $num3 es igual a " . round($num1 / $num2 / $num3, 2);
                    }
                } else if (!is_numeric($num1) || !is_numeric($num2) || !is_numeric($num3)) {
                    echo 'Debes introducir números';
                } else if (empty($_POST['selected'])) {
                    echo '<br>No has elegido ninguna operación';
                }
            }

            ?>
        </div>
    </form>
</main>
</body>

</html>

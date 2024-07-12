<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Dos Form Mismo Action</title>
</head>

<body>
<h1>Calculadora</h1>

<form action="formulario_funcion.php" method="POST" name="calc">
    <fieldset>
        <label> Coloque los valores <br/>>
            <input name="c1"/> <br/> <br/>
            <input name="c2"/><br/><br/>
            <input name="c3"/><br/><br/>
        </label>

    </fieldset>
    <label>Selecciona operación
        <select name="lista">
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>

        </select>

        <input type="hidden" name="funcion" value="ejecutaLogica"/>
        <input type="submit" value="Ver resultado"/>
    </label>

</form>

<?php

// Usamos el type="hidden".
echo "<pre>";
print_r($_POST);
echo "</pre>";
if (isset($_POST["funcion"]) && $_POST["funcion"] == "ejecutaLogica") {
    ejecutaLogica();
}

function ejecutaLogica()
{
    if (!empty($_POST)) { // Con esto evitamos que se ejecute la lógica cuando el
        // formulario NO ha sido enviado.
        // if(!isset($_POST["lista"])){} // Podría ser otra alternativa.

        // Para obtener lo que seleccionemos en la lista.
        // El valor "lista" corresponde al name del <select name="lista">
        $operacion = $_POST["lista"];


        // Si rellenamos los valores en los inputs
        if (
            isset($_POST["c1"]) && !empty($_POST["c1"]) &&
            isset($_POST["c2"]) && !empty($_POST["c2"]) &&
            isset($_POST["c3"]) && !empty($_POST["c3"])
        ) {
            echo "El resultado es: ";
            switch ($operacion) {
                case "sumar":
                    echo $_POST["c1"] + $_POST["c2"] + $_POST["c3"];
                    break;
                case "restar":
                    echo $_POST["c1"] - $_POST["c2"] - $_POST["c3"];
                    break;
                case "multiplicar":
                    echo $_POST["c1"] * $_POST["c2"] * $_POST["c3"];
                    break;
                case "dividir":
                    echo $_POST["c1"] / $_POST["c2"] / $_POST["c3"];
                    break;

                default:
                    "no se ha podido realizar la operación";
            }
        } else {

            echo " Debes insertar todos los campos";
        }
    }
}

?>

</body>


</html>

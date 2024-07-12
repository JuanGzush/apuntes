<?php

// 7. Devolver en una tabla (formato ejercicio 1) las personas de mayor edad de
// cada uno de los países, en el caso de haber más de uno pues mostrarlos.
// Las personas deben aparecer ordenadas por código de pais descendentemente.

include("ejercicioPHP.php");

// Definición de constante
const COUNTRY = 'country';
const AGE = 'age';

// Comprobamos si el array contiene elementos.
global $arrayPersonas;
if (count($arrayPersonas) > 0) {
    echo "<table border='1'>";

    // Cabecera. Otra forma de hacer la cabecera sería a "pelo" <th>id</th><th>country</th><th>firstname</th>
    // Qué pasa si en el futuro el array contiene más claves->valor.
    echo "<tr>";
    foreach ($arrayPersonas[0] as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";

    // Ordeno el array por país y edad de forma descendente
    array_multisort(
        array_column($arrayPersonas, COUNTRY),
        SORT_DESC,
        array_column($arrayPersonas, AGE),
        SORT_DESC,
        $arrayPersonas
    );

    // Inicializamos variables que usaremos dentro del for
    $currentCountry = -1; //Nos sirve para averiguar el cambio de país.
    $maxAge = -1;  //Nuevo

    //echo "<pre>";print_r($arrayPersonas);echo "</pre>";

    foreach ($arrayPersonas as $persona) {
        if ($persona["country"] != $currentCountry) {
            $currentCountry = $persona["country"];
            $maxAge = $persona[AGE]; //Nuevo

            echo "<tr>";
            foreach ($persona as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        } else { // Nuevo
            if ($persona[AGE] == $maxAge) { // Nuevo
                echo "<tr>"; // Nuevo
                foreach ($persona as $value) { // Nuevo
                    echo "<td>" . $value . "</td>"; // Nuevo
                } // Nuevo
                echo "</tr>"; // Nuevo
            } // Nuevo
        } // Nuevo
    }

    echo "</table>";
} else {
    echo "El array no contiene datos";
}

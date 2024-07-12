<?php

error_reporting(E_ALL ^ E_NOTICE);

// 7. Devolver en una tabla (formato ejercicio 1) las personas de mayor edad de
// cada uno de los países, en el caso de haber más de uno pues mostrarlos.
// Las personas deben aparecer ordenadas por código de pais descendentemente.

include("ejercicioPHP.php");

// Definición de constante
const COUNTRY = 'country';
const AGE = 'age';

// 1. Vamos a obtener los diferentes países existentes en nuestro array.
// array_column — Devuelve los valores de una sola columna del array de entrada
global $arrayPersonas;
$arrayCountriesInArrayPersonas = array_column($arrayPersonas, COUNTRY);

// echo "<pre>";print_r($arrayCountriesInArrayPersonas);echo "</pre>";

// 1.1 Nos quedamos solo con los valores únicos.
$countries = array_unique($arrayCountriesInArrayPersonas);

// echo "<pre>";print_r($countries);echo "</pre>";

/*
 * Este es el resultado para el array de entrada.
   Array
  (
    [0] => 1
    [3] => 2
    [4] => 5
    [10] => 3
    [13] => 0
   )
  */

$arrayResults = array(); //Inicializo el array de resultados.

// 2. Recorremos por cada uno de los países
foreach ($countries as $country) {
    // 2.1 Obtenemos el conjunto de datos para cada uno de los países.
    $arrayPersonasInCountry = array(); //Array en el que guardaremos las personas
    // pertenecientes al país de la iteración actual.
    foreach ($arrayPersonas as $persona) {
        if ($persona[COUNTRY] == $country) {
            $arrayPersonasInCountry[] = $persona;
        }
    } // Obtenemos un subconjunto con las personas pertenecientes al país $country (1,2,5...)

    // Tenemos que obtener LAS personas de mayor edad, por lo que iteramos el
    // array hasta que el valor de edad sea diferente al MÁXIMO ($maxAge)
    $maxAge = $arrayPersonasInCountry[0][AGE]; //Obtengo el primer valor del array
    // que como está ordenado por edad es seguro que será el MÁXIMO valor.
    foreach ($arrayPersonasInCountry as $persona) {
        if ($persona[AGE] == $maxAge) {
            // Si el valor de age es igual que el MAX se añade la persona al array de resultados
            // Esto lo podemos hacer, ya que el array está ordenado.
            $arrayResults[] = $persona;
        } else {
            break;
        }
    }

    echo "<br /> Pais " . $country;
}
// Ordenamos el array de resultados para que se muestren según su código de
// país descendentemente.
array_multisort(array_column($arrayResults, COUNTRY), SORT_DESC, $arrayResults);
// echo "<pre>";print_r($arrayResults);echo "</pre>";

// Comprobamos si el array contiene elementos.
if (count($arrayResults) > 0) {
    echo "<table border='1'>";

    // Cabecera. Otra forma de hacer la cabecera sería a "pelo" <th>id</th><th>country</th><th>firstname</th>
    // Qué pasa si en el futuro el array contiene más claves->valor.
    echo "<tr>";
    foreach ($arrayResults[0] as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";

    // Cuerpo de la tabla. Recorremos el array de entrada.
    foreach ($arrayResults as $persona) {
        // $persona = array('id'=> "0AB239", 'country' => 1, 'firstname' => "Ernest"  , 'surname' => "Austin", 'age' => 30); Ejemplo de iteración
        echo "<tr>";
        foreach ($persona as $key => $value) {
            // $key = "country"; $value=1; Ejemplo de iteración
            // Cuando la key sea "country" tenemos que devolver el valor del arrayCountries.
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "El array no contiene datos";
}



<?php

$array_numerico = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes");

// Sintaxis abreviada (A partir de PHP 5.4)
// $array_numerico = ["Lunes","Martes","Miércoles","Jueves","Viernes" ];

$array_asociativo = array(
    "Lunes" => "Lentejas", "Martes" => "Macarrones",
    "Miércoles" => "Spaghetti",
    "Jueves" => "Albóndigas",
    "Viernes" => "Morcilla"
);


// Imprimimos una matriz
print "<pre>"; // Fuerza a mostrar los saltos de línea

print_r($array_numerico);

// Guarda el valor en una variable tmp
$tmp = print_r($array_asociativo, true);
print $tmp;
// Cuando el parámetro es establecido a TRUE, print_r() devolverá
// la información en lugar de imprimirla.

// Imprimir una matriz y aporta información sobre el tipo.
var_dump($array_asociativo);

// Ordena un array y mantiene la asociación de índices
var_dump(asort($array_asociativo));
print "</pre>";


// var_dump(sort($array_numerico)); 
// var_dump(rsort($array_numerico));

// var_dump(arsort($array_asociativo)); 
// var_dump(ksort($array_asociativo)); 
// var_dump(krsort($array_asociativo));

//Matriz multidimensional
$datos[1]["nombre"] = "Santiago";
$datos[1]["apellidos"] = "Ramón y Cajal";
$datos[2]["nombre"] = "Leonardo";
$datos[2]["apellidos"] = "Torres Quevedo";

print "<pre>";
print_r($datos);
print "</pre>";

<?php

$var = '';

// Esto evaluará a TRUE así que el texto se imprimirá. 
// Me llega un campo de un input y queremos saber si está definida:
if (isset($var)) {
    echo "Esta variable está definida, así que se imprimirá";
}
print "<br>";
// En los siguientes ejemplos usaremos var_dump para imprimir
// el valor devuelto por isset().

$a = "prueba";
$b = "otra prueba";
print "<br>";
var_dump(isset($a));      // TRUE
var_dump(isset($a, $b));
var_dump($a); // TRUE

print "<br>";
unset($a);
var_dump(isset($a));     // FALSE
// Si le paso varios parámetros, devuelve true si todas están definidos.
var_dump(isset($a, $b)); // FALSE

print "<br>";
$foo = NULL;
var_dump(isset($foo));   // FALSE

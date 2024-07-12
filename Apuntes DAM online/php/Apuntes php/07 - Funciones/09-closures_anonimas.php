<?php

/**
 * Closure
 *
 * Funciones que no tienen nombre, conocidas como
 * funciones anónimas.
 *
 * Deben terminar en punto y coma;
 *
 * Podemos asignar closures(funciones) a variables.
 */
function () {
    echo "Soy una función anónima.\n";
};

$gato = function () {
    echo "miau\n";
};

$gato();
$gato();
$gato();
$gato();
$gato();

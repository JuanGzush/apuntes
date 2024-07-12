<?php

/***** CONSTANTES *****
 * Valor fijo que se declaran al comienzo de un programa/script,
 * las constantes pueden contener variable, texto, arrays...
 *
 *
 * https://www.php.net/manual/es/language.constants.php
 */

// Constante simple
define("MI_CONSTANTE", "hola");

// Constante array
define("MI_ARRAY", array("2", "3"));

$miconstante = MI_CONSTANTE;

echo MI_CONSTANTE . "<br>";
echo $miconstante . "<br>";

// Para imprimir array:
// print_r(MI_ARRAY[0]);

<?php

// Crea la función
function obtenerElSignificadoDeLaVida(): int
{
    // Retorna un valor
    return 42;

    // Esto no llega a ejecutarse
    echo "Esta línea nunca será ejecutada.\n";
}

// Ejecuta la función
$resultado = obtenerElSignificadoDeLaVida();
var_dump($resultado);

var_dump(obtenerElSignificadoDeLaVida());

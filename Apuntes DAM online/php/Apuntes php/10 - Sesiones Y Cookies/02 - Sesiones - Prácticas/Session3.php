<?php

// Reanudamos la sesión:
session_start();

// Si la variable de sesión iniciada está a true
// mostramos todos los datos:
if (isset($_SESSION['iniciada']) == true) {
    echo "Estamos en otra web:";
    echo "<br>";
    echo "Identificador de la sesión:" . session_id();
    echo "<br>";
    echo "Nombre de la sesión: " . session_name();
    echo "<br>";

    echo "nombre: " . $_SESSION['nombre'];
    echo "<br>";
    echo "Edad: " . $_SESSION['edad'];
    echo "<br>";
} else {
    echo "No se ha definido la sesión";
}

echo "<a href='Session3.php'>Comprobar los valores en otra Web </a>";
echo "<br>";
echo "<a href='Session4.php'>Finalizar la sesión </a>";

<?php

// Propagamos SESIONES entre diferentes páginas:
// Comprobamos que las variables de sesión creadas en una página PHP se propaga a otras.

// Iniciamos sesión (o reanudamos la sesión anterior):
session_start();

// Creamos variables de sesión:
$_SESSION['iniciada'] = true;
$_SESSION['nombre'] = "María";
$_SESSION['edad'] = 22;

echo "Identificador de la sesión:" . session_id();
echo "<br>";
echo "Nombre de la sesión: " . session_name();
echo "<br>";

echo "nombre: " . $_SESSION['nombre'];
echo "<br>";
echo "Edad: " . $_SESSION['edad'];
echo "<br>";

echo "<a href='Session3.php'>Comprobar los valores en otra Web </a>";
echo "<br>";
echo "<a href='Session4.php'>Finalizar la sesión </a>";

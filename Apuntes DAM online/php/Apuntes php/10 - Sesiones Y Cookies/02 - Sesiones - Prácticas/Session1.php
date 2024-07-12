<?php

// Sesiones

// session_id debe ir antes de iniciar sesión:
// Para establecer y/u obtener el ID de la sesión
echo session_id("nuevo id");
// Si especificamos el ID, se reemplaza por el actual
// Con sesion_name() podemos establecer y/u obtener el nombre de la sesión
echo session_name();
echo "<br>";
session_start();

// Definimos dos variables de sesión
$_SESSION['iniciada'] = true;
$_SESSION['nombre'] = "María";

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

// Liberamos la variable de sesión:
unset($_SESSION['nombre']);
// Comprobamos si existe:
if (isset($_SESSION['nombre']) == false) {
    echo "la variable de sesión nombre no existe";
}
// Destruimos la sesión
session_destroy();

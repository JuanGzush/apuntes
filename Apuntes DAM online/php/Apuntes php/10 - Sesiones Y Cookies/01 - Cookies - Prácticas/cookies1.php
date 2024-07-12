<?php

// Cookies

// Crear una cookie que no expira
setcookie("noexpira", 1);

// Crear una cookie que caduca a los 2 minutos
setcookie("micookie", 2, time() + (60 * 2));


// COMPROBAR que la Cookie se ha creado en Chrome en Configuración-Privacidad y Seguridad-Cookies-Ver
// PONER UN TIEMPO DE 10 SEGUNDOS Y COMPROBAR QUE SE BORRA
// IMPORTANTE 
echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";


setcookie("idioma", "esp");

if (isset($_COOKIE['idioma']) && $_COOKIE['idioma'] == "esp") {
    echo "<p>La cookie noexpira ha sido creada. Web en español</p>";
    echo "El valor de la Cookie 'idioma' es " . $_COOKIE['idioma'];
}

// Ver diferencia unset y setcookie -1, con los var_dump
unset($_COOKIE['noexpira']);
setcookie("noexpira", "", time() - 1);
echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";

<?php

//Reanudamos la sesión:
session_start();

if (isset($_SESSION['iniciada']) == true) {
    session_unset();
    session_destroy();
} else {
    echo "No se ha definido la sesión";
}

echo "<a href='Session2.php'>Volver a la web principal</a>";
// Las variables permanecerán activas hasta que no se cierre el navegador.

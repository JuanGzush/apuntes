<?php

// require es idéntico a include excepto que en caso de fallo producirá un error
// fatal de nivel E_COMPILE_ERROR. En otras palabras, este detiene el script mientras
// que include solo emitirá una advertencia (E_WARNING) lo cual permite continuar el script.


require "script2.php";

$var1 = "script1";

echo $var1 . " " . $var2 . "<br>";

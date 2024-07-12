<?php

session_start(); // Inicio de sesión

if (isset($_SESSION['visitas'])) {
    $_SESSION['visitas']++;
} else {
    $_SESSION['visitas'] = 1;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Contador De Visitas</title>
</head>

<body>
<?php

echo "Visitas: " . $_SESSION['visitas'];

?>
</body>

</html>

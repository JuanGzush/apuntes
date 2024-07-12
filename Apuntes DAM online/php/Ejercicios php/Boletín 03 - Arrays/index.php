<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Boletín De Arrays</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style_index.css'>

</head>

<body>
<header>
    <h1>boletín arrays</h1>
</header>
<main>
    <ol>
        <li>
            <p>
                Dado el array anterior crear un fichero PHP que se llame ejercicio_1.php cuyo objetivo
                es mostrar una tabla (HTML) que contenga la información contenida en el array, es decir la tabla
                contendrá
                cinco columnas, "id", "country", "firstname", "surname", "age".
            </p>
            <a href="ejercicio1.php">>> Solución</a>
        </li>
        <li>
            <p>
                Devolver las personas de mayor y menor edad e incluirlas en una tabla con el formato explicado en el
                ejercicio
                anterior. (El fichero de este ejercicio se debe llamar ejercicio_2.php).
            </p>
            <a href="ejercicio2.php">>> Solución</a>
        </li>
        <li>
            <p>
                Crear un fichero que devuelva solo las personas que pertenecen al pais con código 3 en formato tabla
                HTML
                como se definió en el ejercicio 1. (ejercicio_3.php)
            </p>
            <a href="ejercicio3.php">>> Solución</a>
        </li>
        <li>
            <p>Dado el siguiente array:</p>
            <p>
                <?php

                highlight_string("
                    <?php
                    \$arrayCountries = array(0 => \"Wales\", 1 => \"USA\", 2 => \"Ireland\", 3 => \"Scotland\", 4 => \"Australia\" , 5 => \"England\");
                    ?>");

                ?>
            </p>
            <p>
                Mostrar una tabla HTML con el formato del primer ejercicio en el que la columna country, en lugar de
                contener sú código numérico contenga
                el nombre del pais.
            </p>
            <a href="ejercicio4.php">>> Solución</a>
        </li>
        <li>
            <p>
                Devolver una tabla HTML (mismo formato que ejercicio 1), donde las personas aparezcan ordenadas de
                manera ascendente por edad.
                En caso de que dos individuos tengan la misma edad se considerará menor aquel cuyo código de país sea
                menor y en el caso de igualdad
                la siguiente condición sería nombre y después apellido y si todas las condiciones son iguales pues el
                que esté en una posición menor en el array.
            </p>
            <a href="ejercicio5.php">>> Solución</a>
        </li>
        <li>
            <p>
                Devolver en una tabla (formato ejercicio 1) con las 5 personas más jóvenes.
            </p>
            <a href="ejercicio6.php">>> Solución</a>
        </li>
        <li>
            <p>
                Devolver en una tabla (formato ejercicio 1) las personas de mayor edad de cada uno de los países, en el
                caso de haber más de uno pues mostrarlos.
                Las personas deben aparecer ordenadas por código de pais descendentemente.
            </p>
            <a href="ejercicio7.php">>> Solución</a>
        </li>
        <li>
            <p>
                Dado un array que se encuentra en otro fichero (arrayRandom.php) y del que no sabemos sus valores pero
                si su estructura
                devolver una tabla con las personas mayores a la edad dada y de los países contenidos en el array,
                ordenadas por su ID.
                Ejemplo de posible contenido del fichero:
            </p>
            <p>
                <?php

                highlight_string("
                    <?php
                    \$arrayRandom = array(\"countries\" => array(1, 3, 5), \"age\" => 40);
                    ?>");

                ?>
            </p>
            <p>
                Aclaración: podéis crear vosotros mismos un fichero arrayRandom.php con los datos del array anterior e
                incluirlo en vuestro fichero
                a través de include para su uso.
            </p>
            <a href="ejercicio8.php">>> Solución</a>
        </li>
    </ol>
</main>
</body>

</html>

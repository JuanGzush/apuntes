<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

// Estas dos líneas son necesarias para incluir la clase.
require 'Medoo.php';

use Medoo\Medoo;

// Establecemos la conexión con la base de datos.
// Crea una instancia de la clase Medoo. (Se crea un objeto)
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'base_de_datos_1',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);


/***** SELECT *****/

// Selecciona todos, WHERE ==> true (o no ponerlo)
// SELECT * FROM hospitales; 
$resultado = $database->select("hospitales", "*", true);
// En el caso de Medoo, me permite usar el foreach para recorrer
foreach ($resultado as $key => $row) {
    echo $row["nombre"];
    echo "<br>";
}

// Seleccionamos columnas:para seleccionarlas una a una debemos crear un array
$resultado = $database->select("hospitales", ["nombre", "direccion", "num_plazas"], true);
// En el caso de Medoo, me permite usar el foreach para recorrer
foreach ($resultado as $key => $row) {
    echo $row["nombre"] . "-" . $row["direccion"] . "-" . $row["num_plazas"];
    echo "<br>";
}

// Devuelve un array, hospitales con id mayor que uno
// SELECT * FROM hospitales WHERE cod_hospital > 1;
// $resultado = $database->select("hospitales","*",["cod_hospital[>]" => 1]);

// Seleccionamos dos campos(columns [string/array]) de la tabla hospitales
// $resultado = $database->select("hospitales",["cod_hospital","nombre"],["cod_hospital[>]" => 1]);

// Devuelve un array donde el código de hospital está comprendido entre 1 y 2(inclusive)
// WHERE cod_hospital BETWEEN 1 AND 2
// $resultado = $database->select("hospitales","*",["cod_hospital[<>]" => [1,2]]);

// SELECT * FROM hospitales WHERE cod_hospital = 1 OR cod_hospital = 2
// $resultado = $database->debug()->select("hospitales","*",["cod_hospital" => [1,2]]);
// $resultado = $database->select("hospitales","*",["cod_hospital" => [1,2]]);

/***** INSERT *****/

// $resultado = $database->insert("hospitales",[
//     "cod_hospital" => "6",
//     "nombre" => "Infanta Cristina",
//     "direccion" => "Avenida Mayor",
//     "num_plazas" => "100"
// ]);

/***** UPDATE *****/
// $resultado = $database->update("hospitales", ["num_plazas" => 200], ["cod_hospital" => 6]);

// Para incrementar en una cantidad podemos hacerlo como el ejemplo anterior, o usar lo siguiente
// $resultado = $database->update("hospitales", ["num_plazas[+]" => 25], ["cod_hospital" => 6]);

/***** DELETE *****/
// $resultado = $database->delete("hospitales", ["cod_hospital" => 6]);

echo "<pre>";
print_r($resultado);
var_dump($resultado);
echo "</pre>";

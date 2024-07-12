<?php

/******************************************************************************
 * Crear un script que conecte con dicha base de datos y devuelva este resultado:
 *
 * Departamento: CONTABILIDAD
 * Nombre: CONTABILIDAD
 * Localidad: SEVILLA
 * ---------------------------------------------------------------
 * Departamento: INVESTIGACIÓN
 * Nombre: INVESTIGACIÓN
 * Localidad: MADRID
 * ---------------------------------------------------------------
 * Departamento: VENTAS
 * Nombre: VENTAS
 * Localidad: BARCELONA
 * ---------------------------------------------------------------
 * Departamento: PRODUCCIÓN
 * Nombre: PRODUCCIÓN
 * Localidad: BILBAO
 * ---------------------------------------------------------------
 ******************************************************************************/

//Establecemos la conexión con el gestor de base de datos.
$conexion = mysqli_connect("localhost", "root", "", "base_de_datos_1")
or die ('Connect Error: ' . mysqli_connect_errno() . 'No se ha podido conectar');

echo 'Conectado satisfactoriamente.<br>';

// Ejecutamos la sentencia SQL.
$resultado = mysqli_query($conexion, "select * from depart");

// ¿Cómo se ve el objeto?
var_dump($resultado);
echo '<br>';

var_dump(mysqli_fetch_row($resultado));

// Recorremos el resultado para mostrarlo por pantalla.

while ($fila = mysqli_fetch_array($resultado)) {
    echo "Departamento: " . $fila["dept_no"];
    echo "<br>Nombre: " . $fila["dnombre"];
    echo "<br>Localidad: " . $fila["loc"];
    echo "<hr>";
}

// Cerramos la conexión con la base de datos.
mysqli_close($conexion) or die ('No se pudo cerrar la conexión');

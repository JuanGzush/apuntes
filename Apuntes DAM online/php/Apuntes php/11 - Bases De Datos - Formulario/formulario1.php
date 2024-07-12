<?php

$conexion = mysqli_connect("localhost", "root", "", "base_de_datos_1")
or die ('No se ha podido conectar');

// Recuperamos el valor enviado desde el formulario
$departamento = $_POST['numdep'];
// Consulta:
$resul = mysqli_query($conexion,
    "SELECT * FROM emple WHERE dept_no = $departamento");


if (mysqli_errno($conexion) != 0) {
// mysqli_errno($conexion) devuelve un valor distinto de 0
// Si la función mysqli_query() no se ejecutó correctamente.
// (devuelve el código de error).
// La sentencia SELECT producirá un error si se compara la
// columna DEPT_NO con un valor no numérico.
    echo "<center><h2><b>FALLO EN LA CONSULTA, NO HAS METIDO UN Nº DE DEPARTAMENTO</b></h2></center>";
    exit();
}
$numero = mysqli_num_rows($resul);

// Si la consulta SELECT no ha devuelto filas:
if ($numero == 0) {
    echo "<center><h2><b>NO EXISTEN EMPLEADOS EN EL DEPARTAMENTO: $departamento</b></h2></center>";
    exit();
}
// Obtener el nombre del departamento de la tabla DEPARTAMENTOS
$resul2 = mysqli_query($conexion, "SELECT dnombre FROM depart WHERE dept_no= $departamento");
$fila2 = mysqli_fetch_array($resul2);   //no hago bucle, 1 sola fila, clave principal

echo "<center><h2><b>Listado de los empleados</b></h2></center>";
echo "<center><h2><b>del departamento de $fila2[dnombre]</b></h2></center>";
echo "<center>";
// Pintamos la tabla
echo "<table width='500' border='0'>";
echo "<tr bordercolor='#F5A9A9' bgcolor='#F5A9A9'>";
echo "<td align='center'><b>EMPLEADO</b></td>";
echo "<td align='center'><b>APELLIDO</b></td>";
echo "<td align='center'><b>SALARIO</b></td></tr>";

while ($fila = mysqli_fetch_array($resul)) {
    echo "<tr bgcolor='#01DFA5' color='#E0E0F8'>";
    echo "<td align='center'>$fila[emp_no]</td>";
    echo "<td align='center'>$fila[apellido]</td>";
    echo "<td align='center'>$fila[salario]</td>";
    echo "</tr>";
}

echo "</table></center>";
echo "<center><b>Numero de empleados: $numero</b></center>";
mysqli_close($conexion) or die ("No se ha podido cerrar la conexión correctamente");

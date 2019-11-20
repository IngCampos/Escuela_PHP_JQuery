<?php
// datos para la conexion a mysql
$hostdb= "localhost";
$userdb= "root";
$passdb= "";
$db= "escuela_bd";

//Realizamos la conexion
$conexion =new mysqli($hostdb, $userdb, $passdb,$db);

//estructura de control por si falla 
if ($conexion->connect_error)
{
	//$conexion2 =mysqli_connect("172.20.10.6", "joel2", "12345"); ///poner de nuevo la de root  y en otro archivo colocar este codigo
	//mysqli_select_db($conexion2, "test");
	//$conexion = $conexion2;
	die("No he podido conectar porque: " . $conexion->connect_error);
}
//Seleccion la base de datos
//mysqli_select_db($conexion, $db);
?>
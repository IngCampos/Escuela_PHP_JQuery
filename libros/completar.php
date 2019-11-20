<?php
include("./conexion.php");

IF(isset($_GET['isbn'])){
$id= $_GET['isbn'];
$sql= "SELECT nom_libro, grado, id_materia FROM libros WHERE isbn ='".$id."'";
$result=mysqli_query($conexion, $sql);
$dato = mysqli_fetch_array($result);
if($dato['nom_libro']==""){
	$selec="0";
$data = array (
'nomlibro' =>$dato['nom_libro'],
'grado' =>$selec,
'mate' =>$selec
);
echo json_encode ($data);
exit;

}else{

$consultamate=$conexion->query("SELECT Nombre from materias WHERE Id=".$dato['id_materia']);
			$ex=$consultamate->fetch_assoc();
			$idmate=utf8_encode($ex['Nombre']);	
//$dato['id_materia']=$idmate;
$data = array (
'nomlibro' =>$dato['nom_libro'],
'grado' =>$dato['grado'],
'mate' =>$idmate
);
echo json_encode ($data);
exit;
}}
?>
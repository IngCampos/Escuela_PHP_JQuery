<?php
include("./conexion.php");
//filtrar materia pro grado
IF(isset($_POST['buscar'])){
$grad = $_POST["buscar"];   // SECTOR

$sql = "SELECT Nombre FROM materias WHERE Grado=".$grad.";";

$result = mysqli_query($conexion,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $Nombre = utf8_encode($row['Nombre']);
    $users_arr[] = array('Nombre' => $Nombre);
}

// encoding array to json format
echo json_encode($users_arr);
exit;
}
?>
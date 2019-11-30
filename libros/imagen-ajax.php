<?php
if(isset($_FILES["ruta"])){
include("./conexion.php");
	$isbn=$_POST["isbn"];
	$file=$_FILES["ruta"];
	$nombre=$file["name"];
	$tipo=$file["type"];
	$ruta_provisional=$file["tmp_name"];
	$size=$file["size"];
	$carpeta="files/";
	
	$src=$carpeta.$nombre;
	move_uploaded_file($ruta_provisional,$src);
	$consultaisbn=$conexion->query("SELECT isbn from libros WHERE isbn='".$_POST['isbn']."'");
			$ex=$consultaisbn->fetch_assoc();
			$hayisbn=utf8_encode($ex['isbn']);
if($hayisbn==""){
	$query="insert into libros(isbn, ruta) VALUES('$isbn','$src')";
		if ($conexion->query($query) === TRUE) {
		
			//echo "<script type=\"text/javascript\">alert(\"!NUEVO SE INSERTO CORRECTAMENTE!\");</script>";
		}
		else {
			echo "Error: " . $conexion->error;
			}
		}else{
		$query="UPDATE libros SET ruta='".$src."' WHERE isbn='".$isbn."'";
		if ($conexion->query($query) === TRUE) {
		
			//echo "<script type=\"text/javascript\">alert(\"!MODIFICADO SE INSERTO CORRECTAMENTE!\");</script>";
		}
		else {
			echo "Error: " . $conexion->error;
			}
		}	
	//echo $NoConvo."<img src='$src'>";
	
} 
?>
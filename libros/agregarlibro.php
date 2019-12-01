<html>
<?php session_start();

// Comprobamos tenga sesion y sea administrador, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['Titulo']=="Administrador") {
	
} else {
	header('Location: ../login.php');
	die();
}
?>

<head>
<!--<link rel="stylesheet" href="estilo5.css">-->
<link rel="ICON"  type="iMAGEN/PNG" href="sep.png">
<script src="jquery.min.js"></script>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="csslibros/estilos.css">
	<title>Administraci&oacute;n de libros</title>
</head>
<?php
if(isset($_POST['ELIMINAR']))
{
	include("./conexion.php");
	if(!empty($_POST['isbn'])){
			$sql="DELETE FROM libros WHERE isbn='".$_POST['isbn']."';";		
	if ($conexion->query($sql) === TRUE) {
		echo "<script type=\"text/javascript\">alert(\"!LIBRO ELIMINADO!\");</script>";
}
else 
{
	echo "<script type=\"text/javascript\">alert(\"ERROR!".$conexion->error."\");</script>";
		}
	}else{
		echo "<script type=\"text/javascript\">alert(\"!FAVOR DE LLENAR LA CLAVE ISBN!\");</script>";
	}
}
if(isset($_POST['SUBIR']))
{
include("./conexion.php");
$today=date("Y-m-d");
$CONT=0;
$texto="";	
	
if(!empty($_POST['isbn'])){

	
$consultaisbn=$conexion->query("SELECT nom_libro from libros WHERE isbn='".$_POST['isbn']."'");
			$ex=$consultaisbn->fetch_assoc();
			$hay=$ex['nom_libro'];
if($hay==""){
	$texto="SE SUBIO CORRECTAMENTE";
	}else{		
		$texto="MODIFICADO CORRECTAMENTE";
		}	
if(!empty($_POST['nomlibro'])){
	}else{
		$CONT=$CONT + 1;
		
		echo "<script type=\"text/javascript\">alert(\"!FAVOR DE LLENAR EL NOMBRE DEL LIBRO!\");</script>";
		}

if($_POST['grado']=="0"){
			$CONT=$CONT + 1;		
		echo "<script type=\"text/javascript\">alert(\"!FAVOR DE SELECCIONAR UN GRADO!\");</script>";
		}
if($_POST['mate']=="0"){
			$CONT=$CONT + 1;		
		echo "<script type=\"text/javascript\">alert(\"!FAVOR DE SELECCIONAR UNA MATERIA!\");</script>";
		}
		
		$ruta = $_FILES["ruta"];

if ($_FILES['ruta']['name'] != null || $hay!=="") {
}else{
echo "<script type=\"text/javascript\">alert(\"!FAVOR DE INSERTAR DOCUMENTO PDF!\");</script>";
$CONT=$CONT + 1;	
}

		
if($CONT<1){
	echo "<script type=\"text/javascript\">alert(\"!".$texto."!\");</script>";
	$isbn=$_POST['isbn'];
	$nom_libro=utf8_decode($_POST['nomlibro']);
	$grado=$_POST['grado'];
	$mate=$_POST['mate'];
$consultaidCat=$conexion->query("SELECT Id from materias WHERE Grado=".$grado." and Nombre='".utf8_decode($mate)."';");
			$ex=$consultaidCat->fetch_assoc();
			$id_mate=$ex['Id'];
	
			$sql="UPDATE libros SET nom_libro='".$nom_libro."', fecha_sub='".$today."', id_materia='".$id_mate."', grado='".$grado."' WHERE isbn='".$isbn."';";		
	if ($conexion->query($sql) === TRUE) {
		
}
else 
{
	echo "<script type=\"text/javascript\">alert(\"ERROR!".$conexion->error."\");</script>";
		}
}
}else{
		$CONT=$CONT + 1;
		
		echo "<script type=\"text/javascript\">alert(\"!FAVOR DE LLENAR LA CLAVE ISBN!\");</script>";
		}
}
?>

<table> <tr><td align="center"><div id= "result1" align="center"></div></td></tr></table>
<form enctype="multipart/form-data" method="post" id="formulario" action="">
<h1 align="center" class="titulo">ADMINISTRACI&Oacute;N DE LIBROS</h1>
<a class="inico" href="../index.php">Inicio</a><a  style="float: right;"  href="../cerrar.php">Cerrar Sesion</a>
<br>
<hr class="border">
<br>
<table align="center">
<tr><td class="cajonin" align= "right">ISBN:</td><td><INPUT class="cajon" type="text" id="isbn" name="isbn"  onkeyup="autollen()" maxlength="13" value="<?= isset($_POST['isbn']) ? $_POST['isbn'] : ''; ?>" ></td></tr>
<tr><td class="cajonin" align= "right">NOMBRE:</td><td><INPUT class="cajon" type="text" id="nomlibro" name="nomlibro"  value="<?= isset($_POST['nomlibro']) ? $_POST['nomlibro'] : ''; ?>"></td></tr>
<tr><td class="cajonin" align= "right">GRADO:</td><td>
<select id="grado" name="grado" class="cajon" >
			<option value="0" >- SELECCIONA -</option>
				<?php 
				include("./conexion.php");
				header('Content-type: text/html; charset=utf-8');
				$query="SELECT DISTINCT Grado FROM materias";
				$resultado = $conexion->query($query);
				if ($resultado)
				while($renglon = mysqli_fetch_array($resultado))
				{
				$valor=utf8_encode($renglon['0']);
				if($valor==$_POST['grado']){
				echo ("<option selected>".$valor."</option>\n");} else
				{echo ("<option>".$valor."</option>\n");}
				}
				
				$conexion->close();
				?>
		</select></td></tr>
	<tr><td class="cajonin" align= "right">MATERIA:</td><td><SELECT  id="mate" name="mate" class="cajon" >
		<option value="0" >- SELECCIONA -</option>
				<?php 
				include("./conexion.php");
				header('Content-type: text/html; charset=utf-8');
				$query="SELECT Nombre FROM materias";
				$resultado = $conexion->query($query);
				if ($resultado)
				while($renglon = mysqli_fetch_array($resultado))
				{
				$valor=utf8_encode($renglon['0']);
				if($valor==$_POST['mate']){
				echo ("<option selected>".$valor."</option>\n");} else
				{echo ("<option>".$valor."</option>\n");}
				}
				
				$conexion->close();
				?>
	</SELECT></td></tr>
	<tr><td align= "right" class="cajonin">ARCHIVO:</td><td colspan="1" align="centrar"><input type="file" id="ruta" name="ruta" accept="application/pdf"></td></tr>
</table>
<table align="center">
	<tr><td  align="center"><input type="submit" class="button" value="SUBIR / ACTUALIZAR" name="SUBIR"> <td  align="right"><input type="submit" class="button" onclick="return ConfirmDelete()" value="ELIMINAR" name="ELIMINAR"></td></tr>
</table>

</form>
<script type="text/javascript">
$(document).ready(function(){

    $("#grado").change(function(){//Nombre del select en el que se basara
        var grad= $("#grado").val();//guarda el valor
        $.ajax({
            url: 'fetch.php',
            type: 'post',
            data: {buscar:grad},
            dataType: 'json',
			success:function(response){
				
                var len = response.length;

                $("#mate").empty();
				$("#mate").append("<option VALUE='0' align='center'>- SELECCIONA -</option>");
                for( var i = 0; i<len; i++){
                    var Nombre = response[i]['Nombre'];
                    $("#mate").append("<option>"+Nombre+"</option>");

                }
            }
        });
    });

});
//AGREGAR PDF

$(function(){
	$("input[name='ruta']").on("change",function(){
		var formData= new FormData($("#formulario")[0]);
		var ruta="imagen-ajax.php";
		$.ajax({
			url: ruta,
			type:"POST",
			data: formData, 
			contentType: false,
			processData: false,
			success: function(datos)
			{
				$("#result1").html(datos);
			}
	});
});
});
//AUTOLLENADO
function autollen(){
	var isbn= $("#isbn").val();
		$.ajax({
		url: 'completar.php',
		method: 'get',
		data: '&isbn='+isbn,
		success:function(data){
				var json = data,
				obj = JSON.parse(json);
				$("#nomlibro").val(obj.nomlibro);
				$("#grado").val(obj.grado);
				$("#mate").val(obj.mate);
			}
			});
}

//confimacion eliminar
function ConfirmDelete(){
	var respuesta= confirm("ESTAS SEGURO DE ELIMINAR?");
	if(respuesta == true){
		return true;
	}else{
		return false;
	}
}
</script>

</html>
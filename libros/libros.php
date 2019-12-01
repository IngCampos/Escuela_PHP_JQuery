<?php session_start();
//echo "<script type=\"text/javascript\">alert(\"!ESTO ES UNA NOTIFICACION!\");</script>";
//SELECT COUNT(nom_libro) from libros where DATEDIFF(now(), `fecha_sub`)<=3 and grado=2
include("./conexion.php");
if (isset($_SESSION['usuario'])) {
$nversion="";
$consulta=$conexion->query("SELECT COUNT(nom_libro) as num from libros where DATEDIFF(now(), `fecha_sub`)<=3 and grado=".$_SESSION['usuario']['Grado']);
			$ex=$consulta->fetch_assoc();
			$hay=$ex['num'];
if($hay==0){
	}else{
		$sql= "SELECT nom_libro from libros where DATEDIFF(now(), `fecha_sub`)<=3 and grado=".$_SESSION['usuario']['Grado'];
	$result=mysqli_query($conexion, $sql);
	  if(mysqli_num_rows($result)> 0){
		while($row = mysqli_fetch_array($result)){		
              $nversion=$nversion.",".utf8_encode($row['nom_libro']);
              }
			}
	echo "<script type=\"text/javascript\">alert(\"NUEVAS VERSIONES: ".$nversion."\");</script>";
	}		
}else{
	header('Location:../login.php');
	die();
}
?>
<html>
<head>
<!--<link rel="stylesheet" href="estilo5.css">-->

<link rel="ICON"  type="iMAGEN/PNG" href="sep.png">
<script src="jquery.min.js"></script>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="csslibros/estilos.css">
	<title>PORTAL DE LIBROS</title>
	<table> <tr><td align="center"><div id= "result1" align="center"></div></td></tr></table>
<form enctype="multipart/form-data" method="post" id="formulario" action="">
<h1 align="center" class="titulo">PORTAL DE LIBROS</h1>
<a class="inico" href="../index.php">Inicio</a><a  style="float: right;"  href="../cerrar.php">Cerrar Sesion</a>
<br>
<hr class="border">
<div class="slider">
			<ul>
			<li>
			<img src="imgLibros/1.jpg" alt="">
			 </li>
			 <li>
			<img src="imgLibros/2.jpg" alt="">
			 </li>
			 <li>
			<img src="imgLibros/3.jpg" alt="">
		     </li>
		      <li>
			<img src="imgLibros/4.jpg" alt="">
		     </li>
		     </ul>
		</div>
		<hr class="border">
</head>
<H3 ALIGN="CENTER">MIS LIBROS <?php echo $_SESSION['usuario']['Grado'];?>° GRADO</H3>
<?php
include("./conexion.php");

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario'])) {
	/*echo "<pre>";
	var_dump($_SESSION['usuario']);
	echo "</pre>";*/
	
	$sql= "SELECT materias.Nombre, libros.nom_libro, libros.ruta from libros, materias where libros.grado='".$_SESSION['usuario']['Grado']."' and libros.id_materia=materias.Id order by materias.Nombre";
	 echo "<table align='center' style=' border-spacing: 0px; border-collapse: collapse;'>
            <tr style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px;' bgcolor='#B8711B'>
			<th style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px; '>MATERIA</th>
            <th style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px;'>NOMBRE DEL LIBRO</th>
            <th style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px;'>URL DE ACCESO</th>
            </tr>";

			$result1=mysqli_query($conexion, $sql);
	if(mysqli_num_rows($result1)> 0){
		while($row = mysqli_fetch_array($result1)){		
              echo "<tr style='color:white;  text-align: center;  border: 1px solid #B8711B;'>";
              echo "<td  style='border: 0.5px solid #FFFFFF;  padding: 8px;'>" . utf8_encode($row['Nombre']) . "</td> <td style='border: 0.5px solid #FFFFFF;  padding: 8px;'>" . utf8_encode($row['nom_libro']). "</td> <td style='border: 0.5px solid #FFFFFF;  padding: 8px;'><u><a href='".$row['ruta']."' target='_blank' >".$row['ruta']."</a></u></td>" ;
              echo "</tr>";  
		}
		 echo "</table><br>";
	}
	
}else {
	header('Location:../login.php');
	die();
}
?>
<H3 ALIGN="CENTER">OTROS LIBROS</H3>
<form enctype="multipart/form-data" method="post" id="formulario" action="">
<table ALIGN="CENTER">
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
		</select></td><td  align="center"><input type="submit" class="buttonch" value="BUSCAR" name="BUSCAR"></td></tr>
</table>

<?php
if(isset($_POST['BUSCAR'])){
include("./conexion.php");
$sql= "SELECT materias.Nombre, libros.nom_libro, libros.ruta from libros, materias where libros.grado='".$_POST['grado']."' and libros.id_materia=materias.Id order by materias.Nombre";
	 echo "<table align='center' style=' border-spacing: 0px; border-collapse: collapse;'>
            <tr style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px;' bgcolor='#B8711B'>
			<th style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px; '>MATERIA</th>
            <th style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px;'>NOMBRE DEL LIBRO</th>
            <th style='color:white;  text-align: center;  border: 1px solid #FFFFFF; padding: 8px;'>URL DE ACCESO</th>
            </tr>";

			$result1=mysqli_query($conexion, $sql);
	if(mysqli_num_rows($result1)> 0){
		while($row = mysqli_fetch_array($result1)){		
              echo "<tr style='color:white;  text-align: center;  border: 1px solid #B8711B;'>";
              echo "<td  style='border: 0.5px solid #FFFFFF;  padding: 8px;'>" . utf8_encode($row['Nombre']) . "</td> <td style='border: 0.5px solid #FFFFFF;  padding: 8px;'>" . utf8_encode($row['nom_libro']). "</td> <td style='border: 0.5px solid #FFFFFF;  padding: 8px;'><u><a href='".$row['ruta']."' target='_blank' >".$row['ruta']."</a></u></td>" ;
              echo "</tr>";  
		}
		 echo "</table><br>";
	}

}
//SELECT ID,EMPLEADO_MATRICULA, EMPLEADO_COMISIONADO,ORIGEN,FECHA_FIN,ANTICIPO_SUB_TOTAL,DESTINO, DATEDIFF(now(),`FECHA_FIN`) AS 'Result' FROM `pliegos`;
?>
</form>
</html>
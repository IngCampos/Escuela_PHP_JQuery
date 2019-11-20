<?php session_start();
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
</head>
<?php
include("./conexion.php");

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario'])) {
	$sql= "SELECT materias.Nombre, libros.nom_libro, libros.ruta from libros, materias where libros.grado='".$_SESSION['usuario']['Grado']."' and libros.id_materia=materias.Id order by materias.Nombre";
	 echo "<table align='center'>
            <tr>
			<th>MATERIA</th>
            <th>NOMBRE DE LIBRO</th>
            <th>RUTA</th>
            </tr>";

			$result1=mysqli_query($conexion, $sql);
	if(mysqli_num_rows($result1)> 0){
		while($row = mysqli_fetch_array($result1)){		
              echo "<tr style='color:white; font-family: sans-serif, Times; font-size: 13px;  text-align: center;' bgcolor=".$color.">";
              echo "<td>" . $row['Nombre'] . "</td> <td>" . $row['nom_libro'] . "</td> <td><a href='".$row['ruta']."' target='_blank' >".$row['ruta']."</a></td>" ;
              echo "</tr>";  
		}
		 echo "</table><br><br><br>";
	}
	
} else {
	header('Location: login.php');
	die();
}

?>
</html>
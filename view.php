<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="add.html">agregar</a> | <a href="logout.php">cerrar sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>pais</td>
			<td>id cliente</td>
			<td>correo</td>
			<td>numero de tarjeta</td>
			<td>tipo de tarjeta</td>
			<td>codigo postal</td>
			<td>direccion</td>
			<td>ciudad</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['pais']."</td>";
			echo "<td>".$res['id_cliente']."</td>";
			echo "<td>".$res['correo']."</td>";	
			echo "<td>".$res['num_tarjeta']."</td>";	
			echo "<td>".$res['tipo_tarjeta']."</td>";	
			echo "<td>".$res['codigo_postal']."</td>";
			echo "<td>".$res['direccion']."</td>";
			echo "<td>".$res['ciudad']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>

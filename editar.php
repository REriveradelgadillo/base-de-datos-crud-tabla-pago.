<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$pais = $_POST['pais'];
	$id_cliente = $_POST['id_cliente'];
	$correo = $_POST['correo'];	
	$num_tarjeta = $_POST['num_tarjeta'];	
	$tipo_tarjeta = $_POST['tipo_tarjeta'];	
	$codigo_postal = $_POST['codigo_postal'];	
	$direccion = $_POST['direccion'];	
	$ciudad = $_POST['ciudad'];	
	
	// checking empty fields
	if(empty($pais) || empty($id_cliente) || empty($correo) || empty($num_tarjeta) || empty($tipo_tarjeta) || empty($codigo_postal) || empty($direccion) || empty($ciudad)) {
				
		if(empty($pais)) {
			echo "<font color='red'>El campo de pais está vacío.
			</font><br/>";
		}
		
		if(empty($id_cliente)) {
			echo "<font color='red'>El campo de id cliente está vacío.
			</font><br/>";
		}
		
		if(empty($correo)) {
			echo "<font color='red'>El campo de correo está vacío.
			</font><br/>";
		}	

		if(empty($num_tarjeta)) {
			echo "<font color='red'>El campo de numero de tarjeta está vacío.
			</font><br/>";
		}

		if(empty($tipo_tarjeta)) {
			echo "<font color='red'>El campo de tipo de tarjeta está vacío.
			</font><br/>";
		}

		if(empty($codigo_postal)) {
			echo "<font color='red'>El campo de codigo postal está vacío.
			</font><br/>";
		}

		if(empty($direccion)) {
			echo "<font color='red'>El campo de direccion está vacío.
			</font><br/>";
		}

		if(empty($ciudad)) {
			echo "<font color='red'>El campo de ciudad está vacío.
			</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE pago SET pais='$pais', id_cliente='$id_cliente', correo='$correo', num_tarjeta='$num_tarjeta', tipo_tarjeta='$tipo_tarjeta', codigo_postal='$codigo_postal', direccion='$direccion', ciudad='$ciudad'   WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM pago WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$pais = $res['pais'];
	$id_cliente = $res['id_cliente'];
	$correo = $res['correo'];
	$num_tarjeta = $res['num_tarjeta'];
	$tipo_tarjeta = $res['tipo_tarjeta'];
	$codigo_postal = $res['codigo_postal'];
	$direccion = $res['direccion'];
	$ciudad = $res['ciudad'];
}
?>
<html>
<head>	
	<title>editar</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver</a> | <a href="cerrar_sesion.php">cerrar sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>pais</td>
				<td><input type="text" name="pais" value="<?php echo $pais;?>"></td>
			</tr>
			<tr> 
				<td>id cliente</td>
				<td><input type="text" name="id_cliente" value="<?php echo $id_cliente;?>"></td>
			</tr>
			<tr> 
				<td>correo</td>
				<td><input type="text" name="correo" value="<?php echo $correo;?>"></td>
			</tr>
			<tr> 
				<td>numero de tarjeta</td>
				<td><input type="text" name="num_tarjeta" value="<?php echo $num_tarjeta;?>"></td>
			</tr>
			<tr> 
				<td>tipo de tarjeta</td>
				<td><input type="text" name="tipo_tarjeta" value="<?php echo $tipo_tarjeta;?>"></td>
			</tr>
			<tr> 
				<td>codigo postal</td>
				<td><input type="text" name="codigo_postal" value="<?php echo $codigo_postal;?>"></td>
			</tr>
			<tr> 
				<td>direccion</td>
				<td><input type="text" name="direccion" value="<?php echo $direccion;?>"></td>
			</tr>
			<tr> 
				<td>ciudad</td>
				<td><input type="text" name="ciudad" value="<?php echo $ciudad;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>

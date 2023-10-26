<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$pais = $_POST['pais'];
	$id_cliente = $_POST['id_cliente'];
	$correo = $_POST['correo'];
	$num_tarjeta = $_POST['num_tarjeta'];
	$tipo_tarjeta = $_POST['tipo_tarjeta'];
	$codigo_postal = $_POST['codigo_postal'];
	$direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($pais) || empty($id_cliente) || empty($correo) || empty($num_tarjeta || empty($tipo_tarjeta) || empty($codigo_postal) || empty($direccion) || empty($ciudad))) {
				
		if(empty($pais)) {
			echo "<font color='red'>El campo pais está vacío.</font><br/>";
		}
		
		if(empty($id_cliente)) {
			echo "<font color='red'>El campo id_cliente está vacío.</font><br/>";
		}
		
		if(empty($correo)) {
			echo "<font color='red'>El campo correo está vacío.</font><br/>";
		}
		
		if(empty($num_tarjeta)) {
			echo "<font color='red'>El campo num_tarjeta está vacío.</font><br/>";
		}

		if(empty($tipo_tarjeta)) {
			echo "<font color='red'>El campo tipo_tarjeta está vacío.</font><br/>";
		}

		if(empty($codigo_postal)) {
			echo "<font color='red'>El campo codigo_postal está vacío.</font><br/>";
		}

		if(empty($direccion)) {
			echo "<font color='red'>El campo direccion está vacío.</font><br/>";
		}

		if(empty($ciudad)) {
			echo "<font color='red'>El campo ciudad está vacío.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>volver</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO pago(pais, id_cliente, correo, num_tarjeta, tipo_tarjeta, codigo_postal, direccion, ciudad, login_id) VALUES('$pais','$id_cliente','$correo','$num_tarjeta', '$tipo_tarjeta', '$codigo_postal', '$direccion', '$ciudad', '$loginId')");
		
		//display success message
		echo "<font color='green'>
		Datos agregados exitosamente.";
		echo "<br/><a href='view.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>

<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi pagina de gorras!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>cerrar sesion</a><br/>
		<br/>
		<a href='view.php'>Ver y añadir</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar conectado para ver esta página.<br/><br/>";
		echo "<a href='login.php'>iniciar sesion</a> | <a href='register.php'>registrarse</a>";
	}
	?>
	<div id="footer">
		<a href="https://reriveradelgadillo.github.io/proyfinal/#WebMaster">Creado por Emmanuel Rivera</a>
	</div>
</body>
</html>

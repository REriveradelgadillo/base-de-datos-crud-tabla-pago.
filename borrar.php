<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciar_sesion.php');
}
?>

<?php
//including the database connection file
include("conexion.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM pago WHERE id=$id");

//redirecting to the display page (view.php in our case)
header("Location:ver.php");
?>


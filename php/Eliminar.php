<?php 
	$cod=$_GET['eli'];

	$slq_eliminar="DELETE FROM coder WHERE coder.id_coder='$cod'";

	include 'conexion.php';
	mysqli_query($con_fab,$slq_eliminar);
	header('location:listado_coders.php');
?>
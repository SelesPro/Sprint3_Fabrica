<?php 
	$nom = $_POST['nombre'];
	$ape = $_POST['apellido'];
	$dni = $_POST['dni'];
	$fecha = $_POST['fenac'];
	$nacio = $_POST['nac'];
	$promoc = $_POST['promo'];		

	$con_agregar="INSERT INTO coder(nombre,apellido,dni_nie,fecha_nac,fk_nacionalidad,fk_promocion) 
				  					VALUES('$nom','$ape','$dni','$fecha','$nacio','$promoc')";
	include 'conexion.php';
	mysqli_query($con_fab,$con_agregar);	
	header('location:listado_coders.php');
?>


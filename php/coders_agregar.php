<!DOCTYPE html>
<html>
<head>
	<title></title>		
</head>
<body>
	<form method="post" action="agregar.php">
		Nombre <br><input type="text" name="nombre" id="nombre">
		<span id="nameInfo"></span><br>
		Apellidos <br><input type="text" name="apellido" id="apellido">
		<span id="apeInfo"></span><br>
		Dni/Nie <br><input type="text" name="dni" id="dni">
		<span id="dniInfo"></span><br>
		Fecha de Nacimiento<br><input placeholder="YYYY-MM-DD" type="text" name="fenac" id="fenac"><br>
		Nacionalidad<br>
		<select name="nac">
			<?php 
				include 'conexion.php';
				$consulta_nac="select id_pais,nacionalidad from pais";
				$na=mysqli_query($con_fab,$consulta_nac);
				while ($arrna = mysqli_fetch_array($na)) {?>
					<option  value="<?php echo $arrna[0]; ?>">
						<?php echo $arrna[1]; ?>
					</option>					
				<?php } ?> 					
		</select><br>				
		Promocion<br>		
		<select name="promo">
			<?php 
				$consulta_nac="select id_promocion,nombre from promocion";
				$pro=mysqli_query($con_fab,$consulta_nac);
				while ($arrpro = mysqli_fetch_array($pro)) { ?>
					<option  value="<?php echo $arrpro[0]; ?>">
						<?php echo $arrpro[1]; ?>
					</option>					
			<?php } ?> 					
		</select><br>
		<br><input type="submit" value="Agregar" onclick="document.location.href='http://localhost/Grupal3/php/listado_coders.php'">	
	</form>	
</body>
</html>
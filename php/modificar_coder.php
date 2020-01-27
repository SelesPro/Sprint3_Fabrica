
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>


<?php 
	$coder = $_GET['mod'];

	$sql_mod ="SELECT nombre, apellido, dni_nie,fecha_nac,fk_nacionalidad,fk_promocion 
			   FROM coder 
			   where id_coder='$coder'";

	include 'conexion.php';
	$re_mod=mysqli_query($con_fab,$sql_mod);
	$arr_mod=mysqli_fetch_array($re_mod);

?> 
	<div class="contenido">
		<div class="for_mod">
			<form method="post" class="table-responsive{-sm|-md|-lg|-xl} ">
				<p>AGREGAR CODER</p>
				Nombre <br><input type="text" name="nombre" id="nombre" value="<?php echo $arr_mod[0]; ?>" class="form-control">
				<span id="nameInfo"></span><br>
				Apellidos <br><input type="text" name="apellido" id="apellido" value="<?php echo $arr_mod[1]; ?>" class="form-control">
				<span id="apeInfo"></span><br>
				Dni/Nie <br><input type="text" name="dni" id="dni" value="<?php echo $arr_mod[2]; ?>" class="form-control">
				<span id="dniInfo"></span><br>
				Fecha de Nacimiento<br><input placeholder="YYYY-MM-DD" type="text" name="fenac" id="fenac" value="<?php echo $arr_mod[3]; ?>" class="form-control"><br>
				Nacionalidad<br>
				<select name="nac" class="form-control">
					<?php 
						include 'conexion.php';
						$consulta_nac="select id_pais,nacionalidad from pais";
						$na=mysqli_query($con_fab,$consulta_nac);
						
						while ($arrna = mysqli_fetch_array($na)) {?>

							<option  value="<?php echo $arrna[0]; ?>" 
								<?php if ($arr_mod[4]== $arrna[0]) {
										echo 'selected="selected"';
									} ?> >
								<?php echo $arrna[1]; ?>
							</option>					
					<?php } ?> 									
				</select><br>				
				Promocion<br>		
				<select name="promo" class="form-control">
				<?php 
					$consulta_nac="select id_promocion,nombre from promocion";
					$pro=mysqli_query($con_fab,$consulta_nac);
					while ($arrpro = mysqli_fetch_array($pro)) { ?>
						<option  value="<?php echo $arrpro[0]; ?>" 
								<?php if ($arr_mod[5]== $arrpro[0]) {
										echo 'selected="selected"';
									} ?>>
							<?php echo $arrpro[1]; ?>
						</option>					
				<?php } ?> 					
				</select><br><br>
				<div class="row w-100 align-items-center">
    				<div class="col text-center">
    					<input type="button" value="Cancelar" onclick="document.location.href='http://localhost/Grupal3/php/listado_coders.php'" class="btn btn-danger"> 
						<input type="submit" value="Modificar" class="btn btn-primary">
    				</div>	
    			</div>			
			</form>
		</div>	
	</div>
<?php 
	if (isset($_POST['nombre'])) {
		$nom = $_POST['nombre'];
		$ape = $_POST['apellido'];
		$dni = $_POST['dni'];
		$fecha = $_POST['fenac'];
		$nacio = $_POST['nac'];
		$promoc = $_POST['promo'];

		$sql_up="UPDATE coder 
			SET nombre='$nom',apellido='$ape',dni_nie='$dni',fecha_nac='$fecha',fk_nacionalidad='$nacio',fk_promocion='$promoc'
			WHERE id_coder='$coder'";

		mysqli_query($con_fab,$sql_up);?>
		<script type="text/javascript">
			document.location.href='http://localhost/Grupal3/php/listado_coders.php';
		</script>

	<?php	
	}	
 ?>
 </body>
</html>
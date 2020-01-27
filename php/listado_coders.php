<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="container table-sm table-responsive{-sm|-md|-lg|-xl} justify-content-between">
		<form method="post" class="form-inline ">
    		<input type="" name="buscar" placeholder="Busqueda" class="form-control mr-sm-2">
			<input type="submit" id="buscar" value="Buscar" class="btn btn-success">
  		</form>		
	</div>
	<div class="container table-sm table-responsive{-sm|-md|-lg|-xl}">
		<table class="table table-bordered ">
			<thead class="thead-light">
				<tr>
					<th class="datos">número</th>
					<th class="datos">nombre</th>
					<th class="datos">apellido</th>
					<th class="datos">Dni/Nie</th>
					<th class="datos">Fecha de Nacimiento</th>
					<th class="datos">Nacionalidad</th>
					<th class="datos">Promocion</th>
					<th class="datos"><input type="submit" name="agregar" value="Agregar" id="agregar" class="btn btn-success"></th>
				</tr>
			
				<?php 
					include 'conexion.php';
					if (isset($_POST['buscar'])) {
						$bus = $_POST['buscar'];
						if ($bus!="") {
							$cond="AND (coder.nombre like '%$bus%' OR coder.apellido like '%$bus%')";
						}else{
							$cond="";
						}						
					}
					else{
						$cond="";
					}
					$list="SELECT coder.nombre, coder.apellido, coder.dni_nie, coder.fecha_nac, pais.nacionalidad, promocion.nombre, coder.id_coder FROM coder,pais,promocion where coder.fk_nacionalidad=pais.id_pais AND coder.fk_promocion=promocion.id_promocion $cond";

					$con_list=mysqli_query($con_fab,$list);
					$cont=1;
					while ($arrlist= mysqli_fetch_array($con_list)) {?>
						<tr>
						<td><?php echo $cont; ?></td>
						<td><?php echo $arrlist[0]; ?></td>
						<td><?php echo $arrlist[1]; ?></td>
						<td><?php echo $arrlist[2]; ?></td>
						<td><?php echo $arrlist[3]; ?></td>
						<td><?php echo $arrlist[4]; ?></td>
						<td><?php echo $arrlist[5]; ?></td>
						<td><a href="modificar_coder.php?mod=<?php echo $arrlist[6]; ?>" class="btn btn-primary">Modificar</a>
						<a href="eliminar.php?eli=<?php echo $arrlist[6]; ?>" class="btn btn-danger">Eliminar</a></td>
						</tr>			
					<?php 
					$cont++;
					} ?>
			</thead>		
		</table>
	</div>
	<div class="overlay" id="overlay">
		<div class="popup">
			<p>AGREGAR CODER</p>
			<form method="post" action="agregar.php">
				Nombre <br><input type="text" name="nombre" id="nombre" class="form-control">
				<span id="nombreInfo"></span><br>
				Apellidos <br><input type="text" name="apellido" id="apellido" class="form-control">
				<span id="apellidoInfo"></span><br>
				Dni/Nie <br><input type="text" name="dni" id="dni" class="form-control">
				<span id="dniInfo"></span><br>
				Fecha de Nacimiento<br><input placeholder="YYYY-MM-DD" type="text" name="fenac" id="fenac" class="form-control"><br>
				Nacionalidad<br>
				<select name="nac" class="form-control">
					<?php 
						$consulta_nac="select id_pais,nacionalidad from pais";
						$na=mysqli_query($con_fab,$consulta_nac);
						while ($arrna = mysqli_fetch_array($na)) {?>
							<option  value="<?php echo $arrna[0]; ?>">
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
						<option  value="<?php echo $arrpro[0]; ?>">
							<?php echo $arrpro[1]; ?>
						</option>					
				<?php } ?> 					
				</select><br><br>
					<input type="button" value="Cancelar" id="cancelar" class="btn btn-danger"> 
					<input type="submit" value="Agregar" class="btn btn-primary">	
			</form>				
		</div>		
	</div>	
	<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>
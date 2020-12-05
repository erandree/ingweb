<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$proponente=$_POST['proponente'];
		$fecha=$_POST['fecha'];
		$direccionimg=$_POST['direccionimg'];

		$nombre=$_POST['nombre'];
		$estado=$_POST['estado'];
		$tipo=$_POST['tipo'];
		$nivel=$_POST['nivel'];
		$modalidad=$_POST['modalidad'];
		$clasificacion=$_POST['clasificacion'];
		$categoria=$_POST['categoria'];
		$objetivo=$_POST['objetivo'];
		$descripcion=$_POST['descripcion'];

		$lugar=$_POST['lugar'];
		$descripcionlugar=$_POST['descripcionlugar'];

		if(!empty($proponente) 
		&& !empty($nombre) 
		&& !empty($estado)
		&& !empty($tipo)
		&& !empty($nivel)
		&& !empty($modalidad)
		&& !empty($clasificacion)
		&& !empty($categoria)
		&& !empty($objetivo)
		&& !empty($descripcion)
		&& !empty($lugar)
		&& !empty($descripcionlugar))
			{
				$consulta_insert=$conn->prepare('INSERT INTO proyectos(proponente,fecha,direccionimg,nombre,estado,tipo,nivel,modalidad,clasificacion,categoria,objetivo,descripcion,lugar,descripcionlugar) 
				VALUES(:proponente,:fecha,:direccionimg,:nombre,:estado,:tipo,:nivel,:modalidad,:clasificacion,:categoria,:objetivo,:descripcion,:lugar,:descripcionlugar)');
				$consulta_insert->execute(array(
					':proponente' =>$proponente,
					':fecha' =>$fecha,
					':direccionimg' =>$direccionimg,
					':nombre' =>$nombre,
					':estado' =>$estado,
					':tipo' =>$tipo,
					':nivel' =>$nivel,
					':modalidad' =>$modalidad,
					':clasificacion' =>$clasificacion,
					':categoria' =>$categoria,
					':objetivo' =>$objetivo,
					':descripcion' =>$descripcion,
					':lugar' =>$lugar,
					':descripcionlugar' =>$descripcionlugar
				));
				echo "<script> alert('Propuesta registrada');</script>";
				header('Location: menu.php');
				
			}else{
				echo "<script> alert('Algunos campos estan vacios');</script>";
			}
		}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>REGISTRO DE PROPUESTA</h2>
		<form action="" method="post">

		<h2 style="float: left">Generales</h2> 
		
		<div class="form-group">
		<label for="proponente" class="mensajes">Proponente:</label>
			<input type="text" class="input__text" name="proponente">

			<label for="fecha" class="mensajes">Fecha de inscripción:</label>
			<input type="date" class="input__text" name="fecha">

			<label for="direccionimg" class="mensajes">Dirrecion IMG:</label>
				<input type="text" name="direccionimg" class="input__text">
				
		</div>
		<br>
		<hr>
		<br>
		<h2 style="float: left">Inofmración del proyecto</h2> 
			<div class="form-group">
				<label for="nombre" class="mensajes">Nombre:</label>
				<input type="text" name="nombre" class="input__text">

				<label for="estado" class="mensajes">Estado:</label>
				<select  class="input__text" name="estado">
					  <option value="En revisión">En revisión</option>
				</select>

			</div>


				


			<div class="form-group">

				<label for="tipo" class="mensajes">Tipo:</label>
					<select  class="input__text" name="tipo" require>
							<option value="Actividad">Actividad</option>
							<option value="Producto">Producto</option>
					</select>

				<label for="nivel" class="mensajes">Nivel:</label>
				<select  class="input__text" name="nivel" require>
					<option value="Voluntariado">Voluntariado</option>
					<option value="Servicio Social">Servicio Social</option>
				</select>

				<label for="modalidad" class="mensajes">Modalidad:</label>
				<select  class="input__text" name="modalidad">
					  <option value="Individual">Individual</option>
					  <option value="Grupal">Grupal</option>
				</select>

			</div>


			<div class="form-group">
			<label for="clasificacion" class="mensajes">Clasificación:</label>
				<input type="text" name="clasificacion" class="input__text">

				<label for="categoria" class="mensajes">Categoría:</label>
				<input type="text" name="categoria" class="input__text">
			</div>

			<div class="form-group">
			<label for="objetivo" class="mensajes">Objetivo:</label>
				<textarea type="textarea" name="objetivo" class="input__text"></textarea>

				<label for="descripcion" class="mensajes">Descripción:</label>
				<textarea type="textarea" name="descripcion" class="input__text"></textarea>
			</div>
		<br>
		<hr>
		<br>
		<h2 style="float: left">Actividades</h2> 

			<div class="form-group">
			<label for="lugar" class="mensajes">Lugar:</label>
				<input type="text" name="lugar" class="input__text">

				<label for="descripcionlugar" class="mensajes">Descripción de lugar:</label>
				<textarea type="textarea" name="descripcionlugar"  class="input__text"></textarea>
			</div>

			<div class="btn__group">
				<a href="menu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

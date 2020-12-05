<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$conn->prepare('SELECT * FROM proyectos WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: administracion.php');
	}


	if(isset($_POST['guardar'])){
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
		$proponente=$_POST['proponente'];

		$id=(int) $_GET['id'];

		if(isset($nombre) && !empty($estado) && !empty($tipo) && !empty($nivel) && !empty($clasificacion) && !empty($categoria) || !empty($modalidad) )
			{
				$consulta_update=$conn->prepare(' UPDATE proyectos SET  
					fecha=:fecha,
					direccionimg=:direccionimg,
					nombre=:nombre,
					estado=:estado,
					tipo=:tipo,
					nivel=:nivel,
					modalidad=:modalidad,
					clasificacion=:clasificacion,
					categoria=:categoria,
					objetivo=:objetivo,
					descripcion=:descripcion,
					lugar=:lugar,
					descripcionlugar=:descripcionlugar,
					proponente=:proponente
	
						WHERE id=:id;'
					);
					$consulta_update->execute(array(
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
						':descripcionlugar' =>$descripcionlugar,
						':proponente' =>$proponente,
						':id' =>$id
					));
					header('Location: administracion.php');
				}
			 else {
				 echo "<script> alert('Datos vacios PORFAVOR REVISAR');</script>";

			}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>EDITAR PROYECTO</h2>
		<form action="" method="post">

		<div class="form-group">
		<label for="proponente" class="mensajes acomodar">Proponente:</label>
			<input type="text" class="input__text" name="proponente" value="<?php if($resultado) echo $resultado['proponente']; ?>">
		</div>

		<div class="form-group">
			<label for="fecha" class="mensajes">Fecha de inscripción:</label>
			<input type="date" class="input__text" name="fecha" value="<?php if($resultado) echo $resultado['fecha']; ?>">

			<label for="direccionimg" class="mensajes">Dirrecion IMG:</label>
				<input type="text" name="direccionimg" value="<?php if($resultado) echo $resultado['direccionimg']; ?>" class="input__text">
		</div>

			<div class="form-group">
				<label for="nombre" class="mensajes">Nombre:</label>
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">

				<label for="estado" class="mensajes">Estado:</label>
				<select  class="input__text" name="estado">
  					<option selected hidden value="<?php if($resultado) echo $resultado['estado']; ?>"><?php if($resultado) echo $resultado['estado']; ?></option>
					  <option value="En revisión">En revisión</option>
					  <option value="Disponible">Disponible</option>
					  <option value="Finalizado">Finalizado</option>
				</select>

			</div>
			<div class="form-group">

				<label for="tipo" class="mensajes">Tipo:</label>
					<select  class="input__text" name="tipo" >
  						<option selected hidden value="<?php if($resultado) echo $resultado['tipo']; ?>"><?php if($resultado) echo $resultado['tipo']; ?></option>
							<option value="Actividad">Actividad</option>
							<option value="Producto">Producto</option>
					</select>

				<label for="nivel" class="mensajes">Nivel:</label>
				<select  class="input__text" name="nivel" >
  					<option selected hidden value="<?php if($resultado) echo $resultado['nivel']; ?>"><?php if($resultado) echo $resultado['nivel']; ?></option>
					<option value="Voluntariado">Voluntariado</option>
					<option value="Servicio Social">Servicio Social</option>
				</select>

				<label for="modalidad" class="mensajes">Modalidad:</label>
				<select  class="input__text" name="modalidad">
  					<option selected hidden value="<?php if($resultado) echo $resultado['modalidad']; ?>"><?php if($resultado) echo $resultado['modalidad']; ?></option>
					  <option value="Individual">Individual</option>
					  <option value="Grupal">Grupal</option>
				</select>

			</div>


			<div class="form-group">
			<label for="clasificacion" class="mensajes">Clasificación:</label>
				<input type="text" name="clasificacion" value="<?php if($resultado) echo $resultado['clasificacion']; ?>" class="input__text">

				<label for="categoria" class="mensajes">Categoría:</label>
				<input type="text" name="categoria" value="<?php if($resultado) echo $resultado['categoria']; ?>" class="input__text">
			</div>

			<div class="form-group">
			<label for="objetivo" class="mensajes">Objetivo:</label>
				<textarea type="textarea" name="objetivo" value="<?php if($resultado) echo $resultado['objetivo']; ?>" class="input__text"><?php if($resultado) echo $resultado['objetivo']; ?></textarea>

				<label for="descripcion" class="mensajes">Descripción:</label>
				<textarea type="textarea" name="descripcion" value="<?php if($resultado) echo $resultado['descripcion']; ?>" class="input__text"><?php if($resultado) echo $resultado['descripcion']; ?></textarea>
			</div>

			<div class="form-group">
			<label for="lugar" class="mensajes">Lugar:</label>
				<input type="text" name="lugar" value="<?php if($resultado) echo $resultado['lugar']; ?>" class="input__text">

				<label for="descripcionlugar" class="mensajes">Descripción de lugar:</label>
				<textarea type="textarea" name="descripcionlugar" value="<?php if($resultado) echo $resultado['descripcion']; ?>" class="input__text"><?php if($resultado) echo $resultado['descripcionlugar']; ?></textarea>
			</div>


			<div class="btn__group">
				<a href="administracion.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>

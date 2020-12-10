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
		$proponente=$_POST['proponente'];

		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($estado) && !empty($tipo) && !empty($nivel) && !empty($clasificacion) && !empty($categoria) || !empty($modalidad) )
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
	<title>Editar proyecto</title>
	<link rel="icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon">

		<!--Carga CSS escenciales todas las páginas modificables-->
		<link rel="stylesheet" href="css/componentes_esenciales/estilos_comunes.css">
        <link rel="stylesheet" href="css/componentes_esenciales/header.css">
        <link rel="stylesheet" href="css/componentes_esenciales/footer.css">

        <!--Boostrap últimos CSS Y JavaScript-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
		
		<!--Carga CSS propio de la página-->
		
        
        <!--Carga JS propio de la página-->
</head>
<body>

		<!--Conexión a la base de Datos-->
		<?php
        require 'ProbarconexionBD.php';
    	?>

    	<!--Cargar el Header-->
    	<?php
    		include_once 'componentes/esenciales/header.php';
		?>

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


			<div class="btn__group">
				<a href="administracion.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>

		<!--Cargar el Footer-->
		<?php
        include_once 'componentes/esenciales/footer.php'
        ?>
</body>
</html>

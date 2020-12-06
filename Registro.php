<?php 
	include_once 'conexion.php';

	$proponente =null;
	$fecha = null;
	$direccionimg = null;

	$nombre = null;
	$estado = null;
	$tipo = null;
	$nivel = null;
	$modalidad = null;
	$clasificacion = null;
	$categoria = null;
	$objetivo = null;
	$descripcion = null;

	$lugar = null;
	$descripcionlugar = null;



	
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
				header('Location: administracion.php');
				
			}else{
				$error = 1;
			}
		}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo usuario</title>
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
		<?php if(isset($error)) echo "<h1 class=incorrecto>¡Campos vacíos!</h1>"; ?>
		<h2>REGISTRO DE PROPUESTA</h2>
		<form action="Registro.php" method="POST">

		<h2 style="float: left">Generales</h2> 
		
		<div class="form-group">
		<label for="proponente" class="mensajes">Proponente:</label>
			<input type="text" class="input__text" name="proponente" value="<?php echo $proponente ?>">

			<label for="fecha" class="mensajes">Fecha de inscripción:</label>
			<input type="date" class="input__text" name="fecha" value="<?php echo $fecha ?>">

			<label for="direccionimg" class="mensajes">Dirrecion IMG:</label>
				<input type="text" name="direccionimg" class="input__text" value="<?php echo $direccionimg ?>">
				
		</div>
		<br>
		<hr>
		<br>
		<h2 style="float: left">Información del proyecto</h2> 
			<div class="form-group">
				<label for="nombre" class="mensajes">Nombre:</label>
				<input type="text" name="nombre" class="input__text" value="<?php echo $nombre ?>">

				<label for="estado" class="mensajes">Estado:</label>
				<select  class="input__text" name="estado" >
					<option selected hidden value="<?php echo $estado ?>"><?php echo $estado ?></option>
					  <option value="En revisión">Proponer</option>
				</select>

			</div>


				


			<div class="form-group">

				<label for="tipo" class="mensajes">Tipo:</label>
					<select  class="input__text" name="tipo" require>
							<option selected hidden value="<?php echo $tipo ?>"><?php echo $tipo ?></option>
							<option value="Actividad">Actividad</option>
							<option value="Producto">Producto</option>
					</select>

				<label for="nivel" class="mensajes">Nivel:</label>
				<select  class="input__text" name="nivel" require>
					<option selected hidden value="<?php echo $nivel ?>"><?php echo $nivel ?></option>
					<option value="Voluntariado">Voluntariado</option>
					<option value="Servicio Social">Servicio Social</option>
				</select>

				<label for="modalidad" class="mensajes">Modalidad:</label>
				<select  class="input__text" name="modalidad">
					<option selected hidden value="<?php echo $modalidad ?>"><?php echo $modalidad ?></option>
					  <option value="Individual">Individual</option>
					  <option value="Grupal">Grupal</option>
				</select>

			</div>


			<div class="form-group">
			<label for="clasificacion" class="mensajes">Clasificación:</label>
				<input type="text" name="clasificacion" class="input__text" value="<?php echo $clasificacion ?>">

				<label for="categoria" class="mensajes">Categoría:</label>
				<input type="text" name="categoria" class="input__text" value="<?php echo $categoria ?>">
			</div>

			<div class="form-group">
			<label for="objetivo" class="mensajes">Objetivo:</label>
				<textarea type="textarea" name="objetivo" class="input__text" value="<?php echo $objetivo ?>"></textarea>

				<label for="descripcion" class="mensajes">Descripción:</label>
				<textarea type="textarea" name="descripcion" class="input__text" value="<?php echo $descripcion ?>"></textarea>
			</div>
		<br>
		<hr>
		<br>
		<h2 style="float: left">Actividades</h2> 

			<div class="form-group">
			<label for="lugar" class="mensajes">Lugar:</label>
				<input type="text" name="lugar" class="input__text" value="<?php echo $lugar ?>">

				<label for="descripcionlugar" class="mensajes">Descripción de lugar:</label>
				<textarea type="textarea" name="descripcionlugar"  class="input__text" value="<?php echo $lugar ?>"></textarea>
			</div>

			<div class="btn__group">
				<a href="menu.php" class="btn btn__danger">Cancelar</a>
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

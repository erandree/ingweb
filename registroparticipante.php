<?php 
	include_once 'conexion.php';

	$cedula = null;
	$nombre = null;
	$apellido = null;
	$correoutp = null;
	$contrasena = null;
	$celular = null;
	
	if(isset($_POST['guardar'])){
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correoutp=$_POST['correoutp'];
		$contrasena=$_POST['contrasena'];
		$celular=$_POST['celular'];

		if(!empty($cedula) 
		&& !empty($nombre) 
		&& !empty($apellido)
		&& !empty($contrasena)
		&& !empty($correoutp)
		&& !empty($celular))
			{
				$consulta_insert=$conn->prepare('INSERT INTO participantes(cedula,nombre,apellido,correoutp,contrasena,celular) 
				VALUES(:cedula,:nombre,:apellido,:correoutp,:contrasena,:celular)');
				$consulta_insert->execute(array(
					':cedula' =>$cedula,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':correoutp' =>$correoutp,
					':contrasena'=>$contrasena,
					':celular' =>$celular
				));
				header('Location: adminparticipantes.php');
				
			}else{
				 $error = 1;
			}
		}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de usuario</title>
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
		<h2>REGISTRO DE USUARIO</h2>
		<form action="" method="post">

		
		<div class="form-group">

		    <label for="cedula" class="mensajes">Cédula:</label>
			    <input type="text" class="input__text" name="cedula" value="<?php echo $cedula ?>">

                <label for="nombre" class="mensajes">Nombre:</label>
			        <input type="text" class="input__text" name="nombre" value="<?php echo $nombre ?>">

                <label for="apellido" class="mensajes">Apellido:</label>
			        <input type="text" class="input__text" name="apellido" value="<?php echo $apellido ?>">
				
		</div>

        <div class="form-group">

            <label for="correoutp" class="mensajes">Correo Institucional:</label>
				<input type="email" class="input__text" name="correoutp" value="<?php echo $correoutp ?>">
				
			<label for="password" class="mensajes">Contraseña:</label>
                <input type="password" class="input__text" name="contrasena" value="<?php echo $contrasena ?>">

            <label for="celular" class="mensajes">Celular:</label>
                <input type="text" class="input__text" name="celular" value="<?php echo $celular ?>">
    
        </div>

		<br>
		<hr>
		<br>

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

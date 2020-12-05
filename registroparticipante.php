<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];

		$correoutp=$_POST['correoutp'];
		$celular=$_POST['celular'];

		if(!empty($cedula) 
		&& !empty($nombre) 
		&& !empty($apellido)
		&& !empty($correoutp)
		&& !empty($celular))
			{
				$consulta_insert=$conn->prepare('INSERT INTO participantes(cedula,nombre,apellido,correoutp,celular) 
				VALUES(:cedula,:nombre,:apellido,:correoutp,:celular)');
				$consulta_insert->execute(array(
					':cedula' =>$cedula,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':correoutp' =>$correoutp,
					':celular' =>$celular
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
	<title>Registrar Participantes</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>REGISTRO DE PARTICIPANTES</h2>
		<form action="" method="post">

		
		<div class="form-group">

		    <label for="cedula" class="mensajes">Cédula:</label>
			    <input type="text" class="input__text" name="cedula">

                <label for="nombre" class="mensajes">Nombre:</label>
			        <input type="text" class="input__text" name="nombre">

                <label for="apellido" class="mensajes">Apellido:</label>
			        <input type="text" class="input__text" name="apellido">
				
		</div>

        <div class="form-group">

            <label for="correoutp" class="mensajes">Correo Institucional:</label>
                <input type="email" class="input__text" name="correoutp">

            <label for="celular" class="mensajes">Celular:</label>
                <input type="text" class="input__text" name="celular">
    
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
</body>
</html>

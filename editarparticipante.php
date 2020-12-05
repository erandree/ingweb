<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$conn->prepare('SELECT * FROM participantes WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: adminparticipantes.php');
	}


	if(isset($_POST['guardar'])){
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correoutp=$_POST['correoutp'];
		$celular=$_POST['celular'];

		$id=(int) $_GET['id'];

		if(isset($cedula) && !empty($nombre) && !empty($apellido) && !empty($correoutp) && !empty($celular))
			{
				$consulta_update=$conn->prepare(' UPDATE participantes SET  
					cedula=:cedula,
					nombre=:nombre,
					apellido=:apellido,
					correoutp=:correoutp,
					celular=:celular
	
						WHERE id=:id;'
					);
					$consulta_update->execute(array(
						':cedula' =>$cedula,
						':nombre' =>$nombre,
						':apellido' =>$apellido,
						':correoutp' =>$correoutp,
						':celular' =>$celular,
						':id' =>$id
					));
					header('Location: adminparticipantes.php');
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
	<title>Editar Participante</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>EDITAR DE PARTICIPANTE</h2>
		<form action="" method="post">

		
		<div class="form-group">

		    <label for="cedula" class="mensajes">Cédula:</label>
			    <input type="text" class="input__text" name="cedula" value="<?php if($resultado) echo $resultado['cedula']; ?>">

                <label for="nombre" class="mensajes">Nombre:</label>
			        <input type="text" class="input__text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>">

                <label for="apellido" class="mensajes">Apellido:</label>
			        <input type="text" class="input__text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>">
				
		</div>

        <div class="form-group">

            <label for="correoutp" class="mensajes">Correo Institucional:</label>
                <input type="email" class="input__text" name="correoutp" value="<?php if($resultado) echo $resultado['correoutp']; ?>">

            <label for="celular" class="mensajes">Celular:</label>
                <input type="text" class="input__text" name="celular" value="<?php if($resultado) echo $resultado['celular']; ?>">
    
        </div>

		<br>
		<hr>
		<br>

			<div class="btn__group">
				<a href="adminparticipantes.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
            
		</form>
	</div>
</body>
</html>

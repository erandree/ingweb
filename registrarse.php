<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['registrarse'])){
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $contrasena=$_POST['password'];

		$correoutp=$_POST['correo'];
		$celular=$_POST['celular'];

		if(!empty($cedula) 
		&& !empty($nombre) 
		&& !empty($apellido)
		&& !empty($correoutp)
        && !empty($celular)
        && !empty($contrasena))
			{
				$consulta_insert=$conn->prepare('INSERT INTO participantes(cedula,nombre,apellido,correoutp,contrasena,celular) 
				VALUES(:cedula,:nombre,:apellido,:correoutp,:contrasena,:celular)');
				$consulta_insert->execute(array(
					':cedula' =>$cedula,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
                    ':correoutp' =>$correoutp,
                    ':contrasena' =>$contrasena,
					':celular' =>$celular
				));
				header('Location: index.php');
				
			}else{
				?> 
				<h1 class="incorrecto">¡Existen campos vacíos!</h1> 
				<?php
			}
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Registrarse</title>
	<link rel="icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>


<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				<div class="brand">
						<img src="https://utp.ac.pa/sites/default/files/tropical_utp_logo.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Registrarse</h4>
							<?php if(isset($error)) echo "<h3 class=incorrectologin>¡Datos incorrectos!</h3>"; ?>
							<form method="POST" class="validaciones" novalidate="">

								<div class="form-group">
									<label for="cedula">Cédula: </label>
										<input id="cedula" type="text" class="form-control" name="cedula" value="" required autofocus>
										<div class="invalid-feedback">
											Cédula es requerida
										</div>
								</div>


								<div class="form-group">
                                    <label for="nombre">Nombre: </label>
									<input id="nombre" type="text" class="form-control" name="nombre" required autofocus>
								    <div class="invalid-feedback">
								    	Nombre es requerido
							    	</div>
								</div>


                                <div class="form-group">
                                    <label for="apellido">Apellido: </label>
									<input id="apellido" type="text" class="form-control" name="apellido" required autofocus>
								    <div class="invalid-feedback">
								    	Apellido es requerido
							    	</div>
								</div>


                                <div class="form-group">
									<label for="email">Correo institucional</label>
										<input id="email" type="email" class="form-control" name="correo" value="" required autofocus>
										<div class="invalid-feedback">
											Correo inválido
										</div>
								</div>

                                <div class="form-group">
									<label for="password">Contraseña
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Contraseña es requerida
							    	</div>
								</div>

                                <div class="form-group">
                                    <label for="celular">Celular: </label>
									<input id="celular" type="text" class="form-control" name="celular" required autofocus>
								    <div class="invalid-feedback">
								    	Celular es requerido
							    	</div>
								</div>


								<div class="form-group m-0">
									<button type="submit" name="registrarse" class="btn btn-primary btn-block">
										Registrarme
									</button>
								</div>
								<div class="mt-4 text-center">
									<a href="index.php">Salir</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Todos los derechos reservados
					</div>
				</div>
			</div>
		</div>
	</section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/validaciones.js"></script>
</body>
</html>
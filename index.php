
<?php

require 'ProbarconexionBD.php';

//Llamado al metodo que nos permitira validar los datos que introdujo el usuario

include_once 'verificardatos.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SSU | UTP</title>
	<link rel="icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon">
	
	<!--Boostrap últimos CSS Y JavaScript-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!--CSS de la página-->

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
							<h4 class="card-title">¡Bienvenido!</h4>
							<?php if(isset($error)) echo "<h3 class=incorrectologin>¡Datos incorrectos!</h3>"; ?>
							<form method="POST" class="validaciones" novalidate="">
								<div class="form-group">
									<label for="email">Correo institucional</label>
										<input id="email" type="email" class="form-control" name="correo" value="" required autofocus>
										<div class="invalid-feedback">
											Correo inválido
										</div>
								</div>

								<div class="form-group">
									<label for="password">Contraseña</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Contraseña es requerida
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Recordarme</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name="login" class="btn btn-primary btn-block">
										Iniciar Sesión
									</button>
								</div>
								<div class="mt-4 text-center">
									Si aún no eres usuario <a href="registrarse.php">Registrate</a>
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

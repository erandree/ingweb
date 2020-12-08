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



	
	if(isset($_POST['proponer'])){
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

		if(!empty($proponente) 
		&& !empty($nombre) 
		&& !empty($estado)
		&& !empty($tipo)
		&& !empty($nivel)
		&& !empty($modalidad)
		&& !empty($clasificacion)
		&& !empty($categoria)
		&& !empty($objetivo)
		&& !empty($descripcion))
			{
				$consulta_insert=$conn->prepare('INSERT INTO proyectos(proponente,fecha,direccionimg,nombre,estado,tipo,nivel,modalidad,clasificacion,categoria,objetivo,descripcion) 
				VALUES(:proponente,:fecha,:direccionimg,:nombre,:estado,:tipo,:nivel,:modalidad,:clasificacion,:categoria,:objetivo,:descripcion)');
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Proponer proyecto</title>
		<!--Carga CSS escenciales todas las páginas modificables-->

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/my-login.css">
		<link rel="stylesheet" href="css/componentes_esenciales/header.css">
        <link rel="stylesheet" href="css/componentes_esenciales/footer.css">



        <!--Boostrap últimos CSS Y JavaScript-->
    
		
		<!--Carga CSS propio de la página-->
		
        
		<!--Carga JS propio de la página-->
        <script src="js/validaciones.js"></script>
</head>


<body class="my-login-page">
	

	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				<div class="brand">
						<img src="https://vectorified.com/images/enrollment-icon-24.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Registro de propuesta</h4>
							<?php if(isset($error)) echo "<h3 class=incorrectologin>¡Algo salio mal!</h3>"; ?>
							<form method="POST" class="validaciones" novalidate="">

                            <h4 style="text-align:left;">Generales</h4> 

								<div class="form-group">
									<label for="proponente">Proponente:</label>
										<input id="proponente" type="text" class="form-control" name="proponente" value="" required autofocus>
										<div class="invalid-feedback">
											Proponente es requerido
										</div>
								</div>


                                <div class="form-group">
									<label for="fecha">Fecha de inscripción:</label>
										<input id="fecha" type="date" class="form-control" name="fecha" value="" required autofocus>
										<div class="invalid-feedback">
											Se necesita fecha de inscripción
										</div>
								</div>


								<div class="form-group">
									<label for="direccionimg">Dirección IMG:</label>
									<input id="direccionimg" type="text" class="form-control" name="direccionimg" value="media/proyectos/sinimagen.jpg" required autofocus>
								    <div class="invalid-feedback">
								    	Dirección de imagen
							    	</div>
								</div>

                                <hr>

								<h4 style="text-align:left;">Información</h4> 

                                <div class="form-group">
									<label for="nombre">Nombre de propuesta:</label>
										<input id="nombre" type="text" class="form-control" name="nombre" value="" required autofocus>
										<div class="invalid-feedback">
											El nombre es requerido
										</div>
								</div>


								<div class="form-group">
										<input id="estado" type="hidden" class="form-control" name="estado" value="En revisión">
								</div>

                                <div class="form-group">

                                    <label for="tipo">Tipo:</label>
					                    <select  class="form-control" name="tipo" required autofocus>
							                <option selected hidden value=""></option>
							                <option value="Actividad">Actividad</option>
							                <option value="Producto">Producto</option>
					                    </select>
                                        <div class="invalid-feedback">
											El tipo es requerido
										</div>

                                </div>

                                <div class="form-group">

                                    <label for="nivel" >Nivel:</label>
				                        <select  class="form-control" name="nivel" required autofocus>
					                        <option selected hidden value="<?php echo $nivel ?>"><?php echo $nivel ?></option>
					                        <option value="Voluntariado">Voluntariado</option>
					                        <option value="Servicio Social">Servicio Social</option>
				                        </select>
                                        <div class="invalid-feedback">
											El nivel es requerido
										</div>

                                </div>


                                <div class="form-group">

                                    <label for="modalidad">Modalidad:</label>
				                        <select  class="form-control" name="modalidad" required autofocus>
					                        <option selected hidden value="<?php echo $modalidad ?>"><?php echo $modalidad ?></option>
					                        <option value="Individual">Individual</option>
					                        <option value="Grupal">Grupal</option>
				                        </select>
                                        <div class="invalid-feedback">
											La modalidad es requerida
										</div>
                    
                                </div>

                                <div class="form-group">
									<label for="clasificacion">Clasificación:</label>
										<input id="clasificacion" type="text" class="form-control" name="clasificacion" value="" required autofocus>
										<div class="invalid-feedback">
											La clasificación es requerida
										</div>
								</div>

                                <div class="form-group">
									<label for="categoria">Categoría:</label>
										<input id="categoria" type="text" class="form-control" name="categoria" value="" required autofocus>
										<div class="invalid-feedback">
											La categoría es requerida
										</div>
								</div>

                                <div class="form-group">
									<label for="objetivo">Objetivo:</label>
										<input id="objetivo" type="text" class="form-control" name="objetivo" value="" required autofocus>
										<div class="invalid-feedback">
											El objetivo es requerido
										</div>
								</div>

                                
                                <div class="form-group">
									<label for="descripcion">Descripción:</label>
										<textarea id="descripcion" type="text" class="form-control" name="descripcion" value="" required autofocus></textarea>
										<div class="invalid-feedback">
											El objetivo es requerido
										</div>
								</div>


								<div class="form-group m-0">
									<button type="submit" name="proponer" class="btn btn-primary btn-block">
										Proponer
									</button>
								</div>

								<div class="mt-4 text-center">
									<a href="menu.php">Salir</a>
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

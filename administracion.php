<?php
	include_once 'conexion.php';

	$sentencia_select=$conn->prepare('SELECT * FROM proyectos ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conn->prepare('
			SELECT * FROM proyectos WHERE nombre LIKE :campo 
			OR proponente LIKE :campo 
			OR tipo LIKE :campo
			OR nivel LIKE :campo
			OR clasificacion LIKE :campo
			OR categoria LIKE :campo
			OR modalidad LIKE :campo
			OR estado LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Administración de proyectos</title>

		<!--Carga CSS escenciales todas las páginas modificables-->
		<link rel="stylesheet" href="css/componentes_esenciales/estilos_comunes.css">
        <link rel="stylesheet" href="css/componentes_esenciales/header.css">
		<link rel="stylesheet" href="css/componentes_esenciales/footer.css">
		<link rel="icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon">

        <!--Boostrap últimos CSS Y JavaScript-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        

        <!--Carga CSS escencial de la página-->
        
        <!--Carga JS escencial de la página-->


		
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
		<h2>TODOS LOS PROYECTOS</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="registro.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table class="table table-responsive table-striped">
			<caption>Administración de proyectos</caption>
			<thead>
			<tr class="head">
				<th>Id</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Nivel</th>
				<th>Clasificación</th>
				<th>Categoría</th>
				<th>Modalidad</th>
				<th>Proponente</th>
				<th>Estado</th>
				<th colspan="5">Acción</td>
			</tr>
			</thead>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['tipo']; ?></td>
					<td><?php echo $fila['nivel']; ?></td>
					<td><?php echo $fila['clasificacion']; ?></td>
					<td><?php echo $fila['categoria']; ?></td>
					<td><?php echo $fila['modalidad']; ?></td>
					<td><?php echo $fila['proponente']; ?></td>
					<td><?php echo $fila['estado']; ?></td>
					<td><a href="editarproyecto.php?id=<?php echo $fila['id']; ?>"  class="btn btn-primary btn-sm" >Editar</a></td>
					<td><a href="participantes.php?id=<?php echo $fila['id']; ?>" class="btn btn-info btn-sm">Participantes</a></td>
					<td><a href="actividades.php?id=<?php echo $fila['id']; ?>"  class="btn btn-dark btn-sm" >Actividades</a></td>
					<td><a href="proyecto.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Detalles</a></td>

				</tr>
			<?php endforeach ?>

		</table>
	</div>
	    <!--Cargar el Footer-->
		<?php
        include_once 'componentes/esenciales/footer.php'
        ?>
</body>
</html>
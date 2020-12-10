<!-- método que permite mostrar todos los participantes para administrarlos-->

<?php
	include_once 'conexion.php';
	/* método que permite mostrar todos los participantes para administrarlos */

	$sentencia_select=$conn->prepare('SELECT * FROM participantes ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conn->prepare('
            SELECT * FROM participantes WHERE 
               cedula LIKE :campo 
			OR nombre LIKE :campo 
			OR apellido LIKE :campo
			OR correoutp LIKE :campo
			OR celular LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!-- Código HTML -->

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administración de participantes</title>
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


        <!--Carga CSS escencial de la página-->
		<link rel="stylesheet" href="css/estilo.css">
        
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
		<h2>ADMINISTRACIÓN DE PARTICIPANTES</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="registroparticipante.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<caption>Administración de participantes</caption>
				<thead>
					<tr class="head">
						<td scope="col">Id</td>
						<td scope="col">Cédula</td>
						<td scope="col">Nombre</td>
						<td scope="col">Apellido</td>
						<td scope="col">Correo Institucional</td>
						<td scope="col">Celular</td>
						<td scope="col">Fecha de creación</td>
						<td scope="col" colspan="2">Acción</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($resultado as $fila):?>
					<tr >
						<td><?php echo $fila['id']; ?></td>
						<td><?php echo $fila['cedula']; ?></td>
						<td><?php echo $fila['nombre']; ?></td>
						<td><?php echo $fila['apellido']; ?></td>
						<td><?php echo $fila['correoutp']; ?></td>
						<td><?php echo $fila['celular']; ?></td>
						<td><?php echo $fila['fecha_creacion']; ?></td>
						<td><a href="editarparticipante.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
						<td><a href="eliminarparticipante.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
					</tr>
				</tbody>
					<?php endforeach ?>
		</table>
	</div>
	<?php
    	include_once 'componentes/esenciales/footer.php'
    ?>
</body>
</html>
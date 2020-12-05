<?php
	include_once 'conexion.php';

	$sentencia_select=$conn->prepare('SELECT * FROM proyectos ORDER BY id');
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
	<title>SSU - Admin Proyectos</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	


	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<script>
        $(function(){
            $("#header").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/header.html"); 
        });
        $(function(){
            $("#footer").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/footer.html"); 
        });

		</script>
		
</head>
<body>
	<header id="header"></header>
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
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Nombre</td>
				<td>Tipo</td>
				<td>Nivel</td>
				<td>Clasificación</td>
				<td>Categoría</td>
				<td>Modalidad</td>
				<td>Proponente</td>
				<td>Estado</td>
				<td colspan="2">Acción</td>
			</tr>
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
					<td><a href="editarproyecto.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="proyecto.php?id=<?php echo $fila['id']; ?>" class="btn__detalles">Detalles</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
	<footer id="footer"></footer>
</body>
</html>
<?php

/*metodo que nos permite editar los datos de un participante de un proyecto registrado */

    require 'conexion.php';
    $id_proyecto = $_GET['id_proyecto'];
    $id_participante = $_GET['id_participante'];

    /*Consulta que nos trae el participante de un proyecto dado */
	$sentencia_select=$conn->prepare("SELECT * FROM proyectosparticipantes INNER JOIN participantes ON proyectosparticipantes.id_participante = participantes.id WHERE proyectosparticipantes.id_proyecto = '$id_proyecto' AND proyectosparticipantes.id_participante = '$id_participante'");
	$sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();

    /*Consulta que nos trae el proyecto */
    $buscar_id=$conn->prepare('SELECT * FROM proyectos WHERE id=:id LIMIT 1');
    $buscar_id->execute(array(
        ':id'=>$id_proyecto
    ));
    $proyecto=$buscar_id->fetch();
    

    if(isset($_POST['guardar'])){
		$funcion=$_POST['funcion'];

		    if(isset($funcion))
			{
				$consulta_update=$conn->prepare('UPDATE proyectosparticipantes SET  
					funcion=:funcion
	
                        WHERE id_proyecto=:id_proyecto AND id_participante=:id_participante;
                        '
					);
					$consulta_update->execute(array(
						':funcion' =>$funcion,
						':id_proyecto' =>$id_proyecto,
						':id_participante' =>$id_participante
					));
					header("Location: participantes.php?id=$id_proyecto");
			}
             else {
                $error = 1;
                }	

	}
?>

<!-- Código HTML -->

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Editar datos participante</title>
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
        $consultausuario->data_seek(0);
        $espacio = " ";
	?>
    
    <?php if(isset($error)) echo "<h1 class=incorrecto>¡Campos vacíos!</h1>"; ?>
	<div class="contenedor">
        <h2>Editar Participante</h2>
        <h2> <?php echo $proyecto['nombre']; ?></h2>
        <br>
		<form action="editardatospartproyecto.php?id_participante=<?php echo $id_participante; ?>&id_proyecto=<?php echo $id_proyecto; ?>" method="POST">

        <div class="form-group">

            <label for="proyecto" class="mensajes">Proyecto:</label>
            <select  class="input__text" name="id_proyecto" >
                <option selected  value="<?php echo $proyecto['id']; ?>"><?php echo $proyecto['nombre']; ?></option>
            </select>

            <label for="proyecto" class="mensajes">Lo asigna:</label>
            <select  class="input__text" name="id_asigna" >
                <?php while($row4 = $consultausuario->fetch_assoc()){ ?>
                    <option value="<?php echo $row4['id'] ?>"><?php echo $row4['nombre'] , $espacio , $row4['apellido'] ?></option>
                <?php }?>
                
            </select>

        </div>

		
		<div class="form-group">

            <label for="nombrepart" class="mensajes">Cédula del participante:</label>
                <select  class="input__text" name="nombrepart" >
                <?php foreach($resultado as $fila):?>
                    <option selected  value="<?php echo $fila['cedula']; ?>"><?php echo $fila['cedula']; ?></option>
                    <?php endforeach ?>
                </select>

            <label for="id_participante" class="mensajes">Correo del participante:</label>
                <select  class="input__text" name="id_participante" >
                    
                <?php foreach($resultado as $fila):?>
                    <option selected  value="<?php echo $fila['id']; ?>"><?php echo $fila['correoutp']; ?></option>
                    <?php endforeach ?>
                </select>

            <label for="funcion" class="mensajes">Función:</label>
                <select  class="input__text" name="funcion" >
                    <?php foreach($resultado as $fila):?>
                    <option selected value="<?php echo $fila['funcion']; ?>"><?php echo $fila['funcion']; ?></option>
                    <?php endforeach ?>
                    <option value="Administrador">Administrador</option>
                    <option value="Responsable">Responsable</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Participante">Participante</option>
                </select>
				
		</div>

		<br>
		<hr>
		<br>

			<div class="btn__group">
				<a href="participantes.php?id=<?php echo $id_proyecto; ?>" class="btn btn__danger">Cancelar</a>
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
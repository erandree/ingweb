<?php
    include_once 'conexion.php';
    
    $id = null;
    $correoutp = null;
    $funcion = null;

	if(isset($_GET['id'])){
		$id=(int)  $_GET['id'];

		$buscar_id=$conn->prepare('SELECT * FROM proyectos WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: participantes.php');
    }
    
    $todoslosusuarios=$conn->prepare('SELECT * FROM participantes');
    $todoslosusuarios->execute();
    $usuarios = $todoslosusuarios->fetchAll();


    if(isset($_POST['guardar'])){
		$id_proyecto=$_POST['id_proyecto'];
		$id_asigna=$_POST['id_asigna'];
        $id_participante=$_POST['id_participante'];
        $funcion=$_POST['funcion'];

		if(!empty($id_proyecto) 
		&& !empty($id_asigna) 
		&& !empty($id_participante)
        && !empty($funcion))
        
        {
            $consulta_insert=$conn->prepare('INSERT INTO proyectosparticipantes(id_proyecto,id_participante,funcion,asignado_por) 
            VALUES(:id_proyecto,:id_participante,:funcion,:id_asigna)');
            $consulta_insert->execute(array(
                ':id_proyecto' =>$id_proyecto,
                ':id_participante' =>$id_participante,
                ':funcion' =>$funcion,
                ':id_asigna' =>$id_asigna
            ));
            header("Location: participantes.php?id=$id_proyecto");
            
        }else{
            $error = 1;
        }
    }


?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrarse - SSU</title>
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
        <h2>ASIGNAR PARTICIPANTE</h2>
        <br>
        <h2><?php echo $resultado['nombre'] ?></h2>
		<form action="registrarparticipante.php" method="POST">

        <div class="form-group">

            <label for="proyecto" class="mensajes">Proyecto:</label>
            <select  class="input__text" name="id_proyecto" >
                <option selected  value="<?php echo $resultado['id']; ?>"><?php echo $resultado['nombre']; ?></option>
            </select>

            <label for="proyecto" class="mensajes">Lo asigna:</label>
            <select  class="input__text" name="id_asigna" >
                <?php while($row4 = $consultausuario->fetch_assoc()){ ?>
                    <option value="<?php echo $row4['id'] ?>"><?php echo $row4['nombre'] , $espacio , $row4['apellido'] ?></option>
                <?php }?>
                
            </select>

        </div>

		
		<div class="form-group">

            <label for="id_participante" class="mensajes">Correo del participante:</label>
                <select  class="input__text" name="id_participante" >

                    <option selected hidden value="<?php echo $id; ?>"><?php echo $correoutp; ?></option>
                    <?php foreach($usuarios as $fila):?>
                        <option value="<?php echo $fila['id']; ?>"><?php echo $fila['correoutp']; ?></option>
                    <?php endforeach ?>
                </select>
            <label for="funcion" class="mensajes">Función:</label>
                <select  class="input__text" name="funcion" >
                    <option selected hidden value="<?php echo $funcion; ?>"><?php echo $funcion; ?></option>
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
				<a href="index.php" class="btn btn__danger">Cancelar</a>
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
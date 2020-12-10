<?php

    require 'conexion.php';

	if(isset($_GET['id_actividad'])){
		$id=(int) $_GET['id_actividad'];

		$buscar_id=$conn->prepare('SELECT * FROM actividades WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: adminparticipantes.php');
	}
    

    if(isset($_POST['guardar'])){

        $lugar=$_POST['lugar'];
		$actividad=$_POST['actividad'];
		$horas=$_POST['horas'];
        $descripcion_lugar=$_POST['descripcion_lugar'];
        
        $id_proyecto = $_GET['id_proyecto'];

		    if(!empty($lugar) && !empty($actividad) && !empty($horas) && !empty($descripcion_lugar))
			{
				$consulta_update=$conn->prepare('UPDATE actividades SET  
					lugar=:lugar,
                    actividad=:actividad,
                    horas=:horas,
                    descripcion_lugar=:descripcion_lugar
	
                        WHERE id=:id;
                        '
					);
					$consulta_update->execute(array(
						':lugar' =>$lugar,
                        ':actividad' =>$actividad,
                        ':horas' =>$horas,
                        ':descripcion_lugar' =>$descripcion_lugar,
						':id' =>$id
					));
					header("Location: actividades.php?id=$id_proyecto");
			}
             else {
                $error = 1;
                }	

	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Editar actividad</title>
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
        <h2>EDITAR ACTIVIDAD</h2>
        <br>
		<form action="" method="POST">

        <div class="form-group">


            <label for="lugar" class="mensajes">Lugar:</label>
                <input type="text" class="input__text" name="lugar" value="<?php echo $resultado['lugar']; ?>">

                <label for="actividad" class="mensajes">Actividad:</label>
                <input type="text" name="actividad" class="input__text" value="<?php echo $resultado['actividad']; ?>">

            <label for="horas" class="mensajes">Horas:</label>
                <input type="number" step="0.1" name="horas" class="input__text" value="<?php echo $resultado['horas']; ?>">
                
                
                

                
                
        </div>

        <div class="form-group">

        <label for="descripcion_lugar" class="mensajes acomodar">Descripción de lugar:</label>
				<textarea type="textarea" name="descripcion_lugar"  class="input__text" value="<?php echo $resultado['descripcion_lugar']; ?>"><?php echo $resultado['descripcion_lugar']; ?></textarea>
            
		</div>

		<br>
		<hr>
		<br>

			<div class="btn__group">
				<a href="actividades.php?id=<?php echo $id; ?>" class="btn btn__danger">Cancelar</a>
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
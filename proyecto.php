<?php
/* Método que nos trae toda la información del proyecto */

include("ProbarconexionBD.php");



$idproyecto = $_GET["id"];

/* Consulta que nos trae la información del proyecto */
$tablaproyectos = "SELECT * FROM `proyectos` WHERE id=$idproyecto";
$proyecto = $conn->query($tablaproyectos);

/* Consulta que nos trae toda las actividades del proyecto */
$tablaactividades = "SELECT * FROM `actividades` WHERE fk_proyecto=$idproyecto";
$actividades = $conn->query($tablaactividades);

/* Consulta que nos trae toda las partcipantes del proyecto */
$tablapartproyecto = "SELECT * FROM `proyectosparticipantes` INNER JOIN `participantes` ON proyectosparticipantes.id_participante = participantes.id WHERE proyectosparticipantes.id_proyecto = '$idproyecto'";
$participantes = $conn->query($tablapartproyecto);



$contador = 0;
$totalhoras = 0;

?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles de proyecto</title>
        <link rel="icon" href="https://utp.ac.pa/sites/default/files/favicon.ico" type="image/vnd.microsoft.icon">

        <!--Carga CSS escenciales todas las páginas modificables-->
        
        <link rel="stylesheet" href="css/componentes_esenciales/header.css">
        <link rel="stylesheet" href="css/componentes_esenciales/footer.css">

        <!--Boostrap últimos CSS Y JavaScript-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


        <!--Carga CSS escencial de la página-->
        <link rel="stylesheet" type="text/css" href="css/detalles.css">
        <link rel="stylesheet" href="css/componentes_esenciales/estilos_comunes.css">
        
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

        <!--Cargar el Header-->

<?php
while($fila = $proyecto->fetch_assoc()){
    
?> 

<body class="my-login-page">
	

	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
				    <div class="brand">
						<img src="<?php echo $fila['direccionimg'];?>" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h3 class="card-title">Proyecto - <?php echo $fila['nombre'];?></h3>
							

								<div class="form-group">
                                    <span class="subtitulos">Proponente:</span> 
                                    <span class="valor"><?php echo $fila['proponente'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">fecha de inscripción:</span> 
                                    <span class="valor"><?php echo $fila['fecha'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">URL imagen:</span> 
                                    <span class="valor"><?php echo $fila['direccionimg'];?></span>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <span class="subtitulos">Titulo de proyecto:</span> 
                                    <span class="valor"><?php echo $fila['nombre'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">Tipo:</span> 
                                    <span class="valor"><?php echo $fila['tipo'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">Nivel:</span> 
                                    <span class="valor"><?php echo $fila['nivel'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">Modalidad:</span> 
                                    <span class="valor"><?php echo $fila['modalidad'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">Clasificacion:</span> 
                                    <span class="valor"><?php echo $fila['clasificacion'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">Categoría:</span> 
                                    <span class="valor"><?php echo $fila['categoria'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">Objetivo:</span> 
                                    <span class="valor"><?php echo $fila['objetivo'];?></span>
                                </div>

                                <div class="form-group">
                                    <span class="subtitulos">Descripcion:</span> 
                                    <br>
                                    <span class="valor"><?php echo $fila['descripcion'];?></span>
                                </div>

                                <hr>
                                <h4 style="text-align:center;">Actividades</h4> 

                                <div class="form-group">
                                    <table class="table table-striped">
                                        <caption>Actividades del proyecto</caption>
			                                <thead>     
                                                <tr class="head">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Lugar</th>
                                                    <th scope="col">Actividad</th>
                                                    <th scope="col">Horas</th>
                                                </tr>
                                            <thead>
                                            <tbody>
                                        <?php
                                            while($filaact = $actividades->fetch_assoc()){
                                        ?>
                                                <tr>
                                                    <td><?php echo $contador + 1?></td>
                                                    <td><?php echo $filaact['lugar'];?></td>
                                                    <td><?php echo $filaact['actividad'];?></td>
                                                    <td><?php echo $filaact['horas'];?></td>
                                                </tr>

                                        <?php
                                            $totalhoras = $totalhoras + $filaact['horas'];
                                            $contador =  $contador + 1;
                                        }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="vacia"></td>
                                                <td class="vacia"></td>
                                                <td class="vacia"></td>
                                                <td><?php echo $totalhoras;?></td>
                                            </tr>
                                        </tfoot>
                                        
                                    </table>
                                </div>

                                <?php $contador = 0; ?>

                                <hr>
                                <h4 style="text-align:center;">Participantes</h4> 

                                <div class="form-group">
                                    <table class="table table-striped">
                                        <caption>Participantes de proyectos</caption>
                                            <thead>
                                                <tr class="head">
                                                    <td scope="col">#</td>
                                                    <td scope="col">Cédula</td>
                                                    <td scope="col">Correo</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($filaparticipantes = $participantes->fetch_assoc()){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $contador = $contador + 1?></td>
                                                        <td><?php echo $filaparticipantes['cedula'];?></td>
                                                        <td><?php echo $filaparticipantes['correoutp'];?></td>
                                                    </tr>

                                                <?php  } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    $contador = 0;
                                    ?>                                  
                                </div>

                        </div>
                    </div>
					<div class="footer">
						Todos los derechos reservados
					</div>
				</div>
			</div>
		</div>
	</section>
    </body>
                                    <?php } ?>
</html>
    
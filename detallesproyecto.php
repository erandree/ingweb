<?php

include("ProbarconexionBD.php");

$idproyecto = $_GET["id"];


$tablaproyectos = "SELECT * FROM `proyectos` WHERE id=$idproyecto";
$proyecto = $conn->query($tablaproyectos);

$tablaactividades = "SELECT * FROM 'actividades'";
$actividades = $conn->query($tablaactividades);

while($fila = $proyecto->fetch_assoc()){
    
?> <div class="portada">
        <h1><?php echo $fila['nombre'];?></h1>
    </div>
    <br>

    <h2 class="etiqueta2">Generales</h2>
    <br>
    <h3 class="etiquetah3">Proponente: <span class="respuestas"><?php echo $fila['proponente'];?></span></h3>
    <h3 class="etiquetah3">Direccion IMG: <span class="respuestas"><?php echo $fila['direccionimg'];?></span></h3>
    <h3 class="etiquetah3">Fecha de inscripción: <span class="respuestas"><?php echo $fila['fecha'];?></span></h3>
    <hr>
    <br>
    <h2 class="etiqueta2">Información</h2>
    <br>
    <h3 class="etiquetah3">Nombre: <span class="respuestas"><?php echo $fila['nombre'];?></span></h3>
    <h3 class="etiquetah3">Tipo: <span class="respuestas"><?php echo $fila['tipo'];?></span></h3>
    <h3 class="etiquetah3">Nivel: <span class="respuestas"><?php echo $fila['nivel'];?></span></h3>
    <h3 class="etiquetah3">Clasificación: <span class="respuestas"><?php echo $fila['clasificacion'];?></span></h3>
    <h3 class="etiquetah3">Categoría: <span class="respuestas"><?php echo $fila['categoria'];?></span></h3>
    <h3 class="etiquetah3">Modalidad: <span class="respuestas"><?php echo $fila['modalidad'];?></span></h3>
    <h3 class="etiquetah3">Objetivo:</h3> <span class="respuestas"><?php echo $fila['objetivo'];?></span>
    <h3 class="etiquetah3">Descripción:</h3> <span class="respuestas"><?php echo $fila['descripcion'];?></span>
    <hr>
    <br>
    <h2 class="etiqueta2">Actividad</h2>
    <br>
    <h3 class="etiquetah3">Lugar: <span class="respuestas"><?php echo $fila['lugar'];?></span></h3>
    <h3 class="etiquetah3">Descripción del lugar: <span class="respuestas"><?php echo $fila['descripcionlugar'];?></span></h3>
    
    <?php

    while($filaact = $actividades->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $filaact['actividad']?></td>
            <td><?php echo $filaact['horas']?></td>
        </tr>

    <?php  }?>
    

<?php
    echo $fila['nivel'];
    echo $fila['clasificacion'];
    echo $fila['categoria'];
    echo $fila['modalidad'];
    

}

?>
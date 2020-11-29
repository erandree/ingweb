<?php

include("ProbarconexionBD.php");

$idproyecto = $_GET["id"];


$tablaproyectos = "SELECT * FROM `proyectos` WHERE id=$idproyecto";
$proyecto = $conn->query($tablaproyectos);

$tablaactividades = "SELECT * FROM `actividades` WHERE fk_proyecto=$idproyecto";
$actividades = $conn->query($tablaactividades);

$tablafacultades = "SELECT * FROM `facultades` WHERE fk_proyecto=$idproyecto";
$facultades = $conn->query($tablafacultades);

$tablaparticipantes = "SELECT * FROM `participantes` WHERE fk_proyecto=$idproyecto";
$participantes = $conn->query($tablaparticipantes);

$tablaencargados = "SELECT * FROM `encargados` WHERE fk_proyecto=$idproyecto";
$encargados = $conn->query($tablaencargados);

$contador = 0;
$totalhoras = 0;

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
    
    <table class="tablas">
        <th>#</th>
        <th>Actividades</th>
        <th>Horas</th>
    <?php

    while($filaact = $actividades->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $contador + 1?></td>
            <td><?php echo $filaact['actividad'];?></td>
            <td><?php echo $filaact['horas'];?></td>
        </tr>

    <?php
    $totalhoras = $totalhoras + $filaact['horas'];
    $contador =  $contador + 1;
    }?>
        <tr>
            <td class="vacia"></td>
            <td class="vacia"></td>
            <td><?php echo $totalhoras;?></td>
        </tr>
    </table>

<?php
$contador = 0;
$totalhoras = 0;
?>

<h2 class="etiqueta2">Facultades:</h2>

<table class="tablas">
        <th>#</th>
        <th>Facultdad</th>
    <?php

    while($filafacul = $facultades->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $contador + 1?></td>
            <td><?php echo $filafacul['facultad'];?></td>
        </tr>

    <?php
    $contador =  $contador + 1;
    }?>
    </table>
<?php
$contador = 0;
?>

<h2 class="etiqueta2">Participantes:</h2>
<br>

<table class="tablas">
        <th>#</th>
        <th>cedula</th>
        <th>nombre</th>
        <th>apellido</th>
        <th>correo</th>
        <th>celular</th>
    <?php

    while($filapart = $participantes->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $contador + 1?></td>
            <td><?php echo $filapart['cedula'];?></td>
            <td><?php echo $filapart['nombre'];?></td>
            <td><?php echo $filapart['apellido'];?></td>
            <td><?php echo $filapart['correoutp'];?></td>
            <td><?php echo $filapart['movil'];?></td>
        </tr>

    <?php
    $contador =  $contador + 1;
    }?>
    </table>
<?php
$contador = 0;
?>
<h2 class="etiqueta2">Participantes:</h2>
<br>

<table class="tablas">
        <th>#</th>
        <th>función</th>
        <th>cedula</th>
        <th>nombre</th>
        <th>apellido</th>
        <th>correo</th>
        <th>celular</th>
    <?php

    while($filaencargados = $encargados->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $contador + 1?></td>
            <td><?php echo $filaencargados['funcion'];?></td>
            <td><?php echo $filaencargados['cedula'];?></td>
            <td><?php echo $filaencargados['nombre'];?></td>
            <td><?php echo $filaencargados['apellido'];?></td>
            <td><?php echo $filaencargados['telefonooficina'];?></td>
            <td><?php echo $filaencargados['telefonomovil'];?></td>
        </tr>

    <?php
    $contador =  $contador + 1;
    }?>
    </table>
<?php
    

}

?>
<?php

include("ProbarconexionBD.php");

$idproyecto = $_GET["id"];


$tablaproyectos = "SELECT * FROM `proyectos` WHERE id=$idproyecto";
$proyecto = $conn->query($tablaproyectos);

while($fila = $proyecto->fetch_assoc()){
    echo $fila['tipo'];
    echo $fila['nivel'];
    echo $fila['clasificacion'];
    echo $fila['categoria'];
    echo $fila['modalidad'];
    echo $fila['nombre'];

}

?>
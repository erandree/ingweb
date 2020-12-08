<?php 

	include_once 'conexion.php';
	if(isset($_GET['id_actividad'])){
        $id_actividad= $_GET['id_actividad'];

		$delete=$conn->prepare('DELETE FROM actividades WHERE id=:id_actividad');
		$delete->execute(array(
            ':id_actividad'=>$id_actividad
		));
		header("Location: actividades.php?id=$_GET[id_proyecto]");
	}else{
		header('Location: adminparticipantes.php');
	}
 ?>
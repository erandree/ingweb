<?php 

/* Metodo que nos eliminar una actividad de un proyecto dado */

	include_once 'conexion.php';
	if(isset($_GET['id'])){
        $id_participante= $_GET['id'];
        $id_proyecto= $_GET['id_proyecto'];
		$delete=$conn->prepare('DELETE FROM proyectosparticipantes WHERE id_proyecto=:id_proyecto AND id_participante=:id_participante');
		$delete->execute(array(
            ':id_proyecto'=>$id_proyecto,
            ':id_participante'=>$id_participante
		));
		header("Location: participantes.php?id=$id_proyecto");
	}else{
		header('Location: adminparticipantes.php');
	}
 ?>
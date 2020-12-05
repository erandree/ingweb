<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$conn->prepare('DELETE FROM participantes WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: adminparticipantes.php');
	}else{
		header('Location: adminparticipantes.php');
	}
 ?>
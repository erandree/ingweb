<?php 

if(isset($_POST['login'])){ 
	session_start();

	$usuario = $_POST['correo'];
	$clave = $_POST['password'];

	if(!empty($usuario) && !empty($clave)){

		$q = "SELECT COUNT(*) AS contar FROM participantes WHERE correoutp = '$usuario' AND contrasena = '$clave'";
		$verificar = mysqli_query($conn,$q);
		$array = mysqli_fetch_array($verificar);
		
		if($array['contar']>0){
			$_SESSION['username'] = $usuario;
			header("location: menu.php");
		}
		else
		{
			$error = 1;
		}
		
		
	}
}

?>


<?php
/* Conexion a la base de datos */
	$database="ssu";
	$user='root';
	$password='';


try {
	
	$conn=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}

?>
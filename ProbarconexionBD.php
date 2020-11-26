<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "ssu";
//Crear Conexion con MYSQL
$conn = new mysqli($servername, $username, $password, $db);
//Comprobar la Conexión
if ($conn->connect_error) {
    die("Fallo de Conexión: " . $conn->connect_error);
} 

echo "Conexión exitosa";

?>
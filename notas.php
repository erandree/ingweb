<?php

//****************************************CONEXIÓN  
/*
$servername = "localhost";
$username = "root";
$password = "";
//Crear Conexion con MYSQL
$conn = new mysqli($servername, $username, $password);
//Comprobar la Conexión
if ($conn->connect_error) {
    die("Fallo de Conexión: " . $conn->connect_error);
} 

echo "Conexión exitosa"; 

*/




//*******************************CREAR TABLA
/*
    $sql = "CREATE DATABASE [nombre]";
    if($conn->query($sql) === true)
    {
        echo "Base de datos creada";
    }
    else
    {
        die("Error al crear BD: ". $conn->error);

    } 
*/



/*
$servername = "localhost";
$username = "root";
$password = "";
//Crear Conexion con MYSQL
$conn = new mysqli($servername, $username, $password);
//Comprobar la Conexión
if ($conn->connect_error) {
    die("Fallo de Conexión: " . $conn->connect_error);
} 

$tabla = "SELECT * FROM funciones";
if($conn->query($tabla) === true)
{
    echo $tabla;
}
else 
{
    echo "falla";
}

*/




?>
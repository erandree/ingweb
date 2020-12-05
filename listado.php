<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ukianime</title>
        <!--Carga CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos_comunes.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> <!--Carrusel-->

        <!--Carga librerías y archivos de JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="js/menu-carrusel.js"></script>
        <script src="js/script-registro.js"></script>
        <script src="js/navegacion.js"></script>

        <link rel="stylesheet" href="css/estilo-listado.css">

        <!--Carga componentes-->
        <script>
        $(function(){
            $("#header").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/header.html"); 
        });
        $(function(){
            $("#footer").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/footer.html"); 
        });

        </script>


</head>

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

$tablaproyectos = "SELECT * FROM proyectos"; 
$consultageneral = $conn->query($tablaproyectos);


?>

<body class="fondo-uki">

    <header id="header"></header>

    <nav  class="nav nav-pills nav-fill sticky-top nav-tabs" id="nav-tab" role="tablist" >

        <button id="tipos" class="nav-item nav-link "  onclick="pestana(event, 'tipo')">Tipos</button>
        <button class="nav-item nav-link active"  onclick="pestana(event, 'nivel')">Niveles</button>
        <button class="nav-item nav-link active"  onclick="pestana(event, 'clasificacion')">Clasificaciones</button>
        <button class="nav-item nav-link active"  onclick="pestana(event, 'categoria')">Categorias</button>
        <button class="nav-item nav-link active"  onclick="pestana(event, 'modalidad')">Modalidades</button>
    </nav>




    <section class="seccion_central">
        
        <div id="tipo" class="tabcontent">
            <?php include 'componentes/listado/tipo.php'; ?>
        </div>

        <div id="nivel" class="tabcontent">
            <?php include 'componentes/listado/nivel.php'; ?>
        </div>

        <div id="clasificacion" class="tabcontent">
            <?php include 'componentes/listado/clasificacion.php'; ?>
        </div>

        <div id="categoria" class="tabcontent">
            <?php include 'componentes/listado/categoria.php'; ?>
        </div>

        <div id="modalidad" class="tabcontent">
            <?php include 'componentes/listado/modalidad.php'; ?>
        </div>


    </section>

    <footer id="footer"></footer>
</body>
</html>
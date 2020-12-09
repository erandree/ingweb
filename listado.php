<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyectos Disponibles</title>
    
        <!--Carga CSS escenciales todas las páginas modificables-->
        <link rel="stylesheet" href="css/componentes_esenciales/estilos_comunes.css">
        <link rel="stylesheet" href="css/componentes_esenciales/header.css">
        <link rel="stylesheet" href="css/componentes_esenciales/footer.css">

        <!--Boostrap últimos CSS Y JavaScript-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        
        <!--Carga de librería para el carrsel-->

        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> <!--Carrusel CSS-->
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script> <!--Carrusel JS-->


        <!--Carga CSS escencial de la página-->
        <link rel="stylesheet" href="css/carrusel.css">
        
        <!--Carga JS escencial de la página-->
        <script src="js/navegacion.js"></script>
        <script src="js/clicknav.js"></script>
        <script src="js/script-registro.js"></script>

    </head>

<?php

//Conexión a la Base de Datos
require 'ProbarconexionBD.php';
            
$tablaproyectos = "SELECT * FROM proyectos"; 
$consultageneral = $conn->query($tablaproyectos);

?>

<body>

    <!--Cargar el Header-->
     <?php
        include_once 'componentes/esenciales/header.php';
    ?>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <a class="navbar-brand" href="#">Buscar por:</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a id="tipos" class="nav-link" onclick="pestana(event, 'tipo')" >Tipos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" onclick="pestana(event, 'nivel')">Nivel</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" onclick="pestana(event, 'clasificacion')">Clasificación</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" onclick="pestana(event, 'categoria')">Categoría</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" onclick="pestana(event, 'modalidad')">Modalidad</a>
                    </li>
                </ul>
            </div>
    </nav>

    <section class="seccion_central">
        
        <div id="tipo" class="tabcontent">
            <?php include 'componentes/listado/proyectos/tipo.php'; ?>
        </div>

        <div id="nivel" class="tabcontent">
            <?php include 'componentes/listado/proyectos/nivel.php'; ?>
        </div>

        <div id="clasificacion" class="tabcontent">
            <?php include 'componentes/listado/proyectos/clasificacion.php'; ?>
        </div>

        <div id="categoria" class="tabcontent">
            <?php include 'componentes/listado/proyectos/categoria.php'; ?>
        </div>

        <div id="modalidad" class="tabcontent">
            <?php include 'componentes/listado/proyectos/modalidad.php'; ?>
        </div>

    </section>

    <!--Cargar el Footer-->
    <?php
        include_once 'componentes/esenciales/footer.php'
    ?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SSU - Menu</title>
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

        <!--Carga componentes-->
        <script>
        $(function(){
            $("#header").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/header.php"); 
        });
        $(function(){
            $("#footer").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/footer.html"); 
        });

        </script>

    <?php


        require 'ProbarconexionBD.php';


        $tablafunciones = "SELECT * FROM funciones"; 
        $consultageneral = $conn->query($tablafunciones);

        $categorias = "SELECT DISTINCT categoria FROM funciones";
        $consultaespecifica = $conn->query($categorias);

        session_start();
        $usuario = $_SESSION['username'];
        
        $nombre = "SELECT * FROM `participantes` WHERE `correoutp` = '$usuario'";
        $consultausuario = $conn->query($nombre); 
    ?>



    </head>
<body class="fondo-uki">



    <section class="seccion_central">

        
        <?php
            if($consultaespecifica->num_rows > 0)
            {
                while($row = $consultaespecifica->fetch_assoc())
                {
                    ?>
                    <div class="menu_contenedores">
                        <h1 class="titulo_categoria"> <?php echo $row['categoria'];?> </h1> 
                        <div class="carousel-bg">
                            <section class="carousel" data-flickity='{ "wrapAround": false, "pageDots": false}'>
                    <?php
                    while($row2 = $consultageneral->fetch_assoc())
                    {
                        if($row['categoria'] == $row2['categoria'])
                        {
                            ?>
                            <a href="<?php echo $row2['direccion']?>">
                                <div class="carosel-cell cada_anime">
                                        <img class="menu_imagen" src="<?php echo $row2['imagen'] ?>" alt="menu_imagen1">
                                        <b><?php echo $row2['nombre'] ?></b>
                                </div>
                            </a>
                        
                        <?php

                        }
                        else
                            {
                            }
                    }
                    $consultageneral->data_seek(0);
                        ?>
                            </section>
                        </div>
                    </div>
                <?php 
                }
            }
            else
            {
            echo "no hay datos22";
            }
        ?>
        </div>
    </section>

    <footer id="footer"></footer>
</body>
</html>
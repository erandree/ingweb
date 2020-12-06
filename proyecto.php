
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles</title>

        <!--Carga CSS escenciales todas las páginas modificables-->
        <link rel="stylesheet" href="css/componentes_esenciales/estilos_comunes.css">
        <link rel="stylesheet" href="css/componentes_esenciales/header.css">
        <link rel="stylesheet" href="css/componentes_esenciales/footer.css">

        <!--Boostrap últimos CSS Y JavaScript-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


        <!--Carga CSS escencial de la página-->
        <link rel="stylesheet" href="css/estilo-detalles.css">
        
        <!--Carga JS escencial de la página-->


        

    </script>
    </head>
    <body>
        <!--Conexión a la base de Datos-->
        <?php
            require 'ProbarconexionBD.php';
        ?>

        <!--Cargar el Header-->
        <?php
            include_once 'componentes/esenciales/header.php';
        ?>

        <div class="fondoabajo">
            <section class="fondoarriba">
                <?php include 'detallesproyecto.php'; ?>
            </section>
        </div>

        <!--Cargar el Footer-->
        <?php
            include_once 'componentes/esenciales/footer.php'
        ?>
    </body>
</html>
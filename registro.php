<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro usuario</title>

        <link rel="stylesheet" href="formoid_files/formoid1/formoid-solid-purple.css" type="text/css" />
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos_comunes.css">



        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script>
        $(function(){
            $("#header").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/header.html"); 
        });
        $(function(){
            $("#footer").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/footer.html"); 
        });
        $(function(){
            $("#generales").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/registro/generales.html"); 
        });

        $(function(){
            $("#informacion").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/registro/informacion.html"); 
        });

        $(function(){
            $("#actividades").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/registro/actividades.html"); 
        });

        $(function(){
            $("#facultades").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/registro/facultades.html"); 
        });

        $(function(){
            $("#participantes").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/registro/participantes.html"); 
        });

        $(function(){
            $("#encargados").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/registro/encargados.html"); 
        });

        </script>

    </head>
    <body>
        <form class="formoid-solid-green" style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:1000px;min-width:150px" method="post">
            <div class="title">
                <h2>REGISTRO DE PROYECTO</h2>
            </div>
            <div id="generales"></div>
            <div id="informacion"></div>
            <div id="actividades"></div>
            <div id="facultades"></div>
            <div id="participantes"></div>
            <div id="encargados"></div>

	        <div class="submit">
		        <input type="submit" value="Submit"/>
	        </div>
        </form>

    </body>
</html>
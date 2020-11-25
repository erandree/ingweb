<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicio Social Universitario</title>
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="footer.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
        $(function(){
            $("#header").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/header.html"); 
        });
        $(function(){
            $("#footer").load("https://raw.githubusercontent.com/erandree/ingweb/master/componentes/footer.html"); 
        });
</script>

</head>
<body>
<header id="header"></header>

<a href="registro.php">
resgitro de propuesta
</a>
<br>

<a href="administracion.php">
administracion de propuestas
</a>

<br>

<!--motivo agregar-->
<a href="listado.php">
Listado de propuestas
</a>

<!--Detalles de cada una-->

<footer id="footer"></footer>
</body>
</html>
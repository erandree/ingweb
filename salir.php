<?php
/* Aquí cerramos la sesión en el sistema*/

session_start();

session_destroy();

header("location: index.php")


?>
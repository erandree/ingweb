<div class="container">

    <div class="row  ">
        <div class="col-md-2 col-sm-12 alinear">
            <a class="inicio" href="menu.php">
                <img src="https://utp.ac.pa/sites/default/files/tropical_utp_logo.jpg" alt="logo" id="logo">
            </a>
        </div>

        <div class="col-md-5 col-sm-12 alinearizquierda">
                <span style="font-size: 20px;">
                    Camino a la excelencia a través del mejoramiento continuo 
                </span>
                <br>
                <span style="font-size: 20px;">
                    Universidad Tecnologíca de Panamá
                </span>
                <br>
                <span style="font-size: 20px;">
                    Servicio Social Universitario
                </span>
        </div>

        <div class="col-md-3 col-sm-6 col-6 alinear">
            <a href="cuenta.html" id="link_perfil">
                <img src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" id="icono_perfil">
                <span><?php 
                while($row3 = $consultausuario->fetch_assoc()){
                    echo $row3['nombre'];
                    echo " ";
                    echo $row3['apellido'];
                    }
                ?>
                </span>
            </a>
        </div>

        <div class="col-md-2 col-sm-6 col-6 alinear">
            <a href="salir.php">
                <button type="button" class="btn btn-danger">Cerrar Sesión</button>
            </a>
        
        </div>


    </div>
</div>
<section id="contenido_de_header2">

</section>
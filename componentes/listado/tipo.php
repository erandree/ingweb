
<?php

$tipoproyecto = "SELECT DISTINCT tipo FROM proyectos";
$consultaespecifica = $conn->query($tipoproyecto);

            if($consultaespecifica->num_rows > 0)
            {
                while($row = $consultaespecifica->fetch_assoc())
                {
                    ?>
                    <div class="menu_contenedores">
                        <h1 class="titulo_categoria"> <?php echo $row['tipo'];?> </h1> 
                        <div class="carousel-bg">
                            <section class="carousel" data-flickity='{ "wrapAround": false, "pageDots": false}'>
                    <?php
                    while($row2 = $consultageneral->fetch_assoc())
                    {
                        if($row2['estado'] == 'Disponible')
                        {
                            if($row['tipo'] == $row2['tipo'])
                                {
                                    ?>
                                        <a href="proyecto.php?id=<?php echo $row2['id']?>">
                                            <div class="carosel-cell cada_anime">
                                                <img class="menu_imagen" src="<?php echo $row2['direccionimg'] ?>" alt="menu_imagen1">
                                                <b><?php echo $row2['nombre'] ?></b>
                                            </div>
                                        </a>
                        
                                    <?php

                                }
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
        ?>
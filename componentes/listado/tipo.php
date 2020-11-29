
<?php

$tipoproyecto = "SELECT DISTINCT tipo FROM proyectos";
$resultado2 = $conn->query($tipoproyecto);

            if($resultado2->num_rows > 0)
            {
                while($row = $resultado2->fetch_assoc())
                {
                    ?>
                    <div class="menu_contenedores">
                        <h1 class="titulo_categoria"> <?php echo $row['tipo'];?> </h1> 
                        <div class="carousel-bg">
                            <section class="carousel" data-flickity='{ "wrapAround": false, "pageDots": false}'>
                    <?php
                    while($row2 = $resultado1->fetch_assoc())
                    {
                        if($row['tipo'] == $row2['tipo'])
                        {
                            ?>
                            <a href="detalleproyecto.php?id=<?php echo $row2['id']?>">
                                <div class="carosel-cell cada_anime">
                                        <img class="menu_imagen" src="<?php echo $row2['direccionimg'] ?>" alt="menu_imagen1">
                                        <b><?php echo $row2['nombre'] ?></b>
                                </div>
                            </a>
                        
                        <?php

                        }
                        else
                            {
                            }
                    }
                    $resultado1->data_seek(0);
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


        <div class="menu_contenedores">
            <h1 class="titulo_categoria"> Proyectos </h1> 
            <div class="carousel-bg">
                <section class="carousel" data-flickity='{ "wrapAround": false, "pageDots": true, "contain": true}'>
                <?php
                while($row2 = $consultageneral->fetch_assoc()){
                    if($row2['estado'] == 'Disponible')
                    {
                    ?>
                        <a href="proyecto.php?id=<?php echo $row2['id']?>">
                            <div class="carosel-cell cada_anime">
                                <img class="menu_imagen" src="<?php echo $row2['direccionimg'] ?>" alt="Objetivo: <?php echo $row2['objetivo'];?> - descripcion: <?php echo $row2['descripcion'] ?>  " title="Tipo: <?php echo $row2['tipo'] ?> - Nivel: <?php echo $row2['nivel'] ?> - Clasificación: <?php echo $row2['clasificacion'] ?> - Categoría: <?php echo $row2['categoria'] ?>">
                                <b><?php echo $row2['nombre'] ?></b>
                            </div>
                        </a>
                    <?php
            }
            }
                        ?>
                </section>
            </div>
        </div>
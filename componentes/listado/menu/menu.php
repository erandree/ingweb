<?php

$tablafunciones = "SELECT * FROM funciones"; 
$consultageneral = $conn->query($tablafunciones);

$categorias = "SELECT DISTINCT categoria FROM funciones";
$consultaespecifica = $conn->query($categorias);

?>


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
                            <section class="carousel" data-flickity='{ "wrapAround": false, "pageDots": true, "contain": true}'>
                    <?php
                    while($row2 = $consultageneral->fetch_assoc())
                    {
                        if($row['categoria'] == $row2['categoria'])
                        {
                            ?>
                            <a href="<?php echo $row2['direccion']?>">
                                <div class="carosel-cell cada_anime">
                                        <img class="menu_imagen" src="<?php echo $row2['imagen'] ?>" alt="<?php echo $row2['nombre'] ?>"" title="<?php echo $row2['categoria'] ?> - <?php echo $row2['nombre'] ?>">
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
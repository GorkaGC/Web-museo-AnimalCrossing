<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "head.php";
    ?>
    <title>Tienda</title>
</head>

<body>
    <?php include "nav.php"; ?>
    <div class="tienda full-container">
        <h1 id="producto">Tienda</h1>

        <div class="tienda-content container">
            <div class="barra_navegacion">
                <input type="text" id="barra_busqueda" name="busqueda" placeholder="Buscar producto">
                <?php

                if (!empty($_GET['error'])) {
                    echo (($_GET['error'])) == 'userNotRegistered' ? '<h3>Debe <a href="control.php?f=login">iniciar sesión</a> para poder realizar una compra.</h3>' : '<h3>El pedido no ha podido completarse.</h3>';
                }
            ?>
            </div>

            <div class="tienda-products">

                <?php
                 if (empty($_SESSION['producto'])) {
                    header("Location: control.php?f=store");
                }
                $productos = $_SESSION["producto"];
                
                $cont = sizeof($productos);
                for ($i = 0; $i < $cont; $i++) {
                ?>
                <div class="caja-producto">
                    <!--IMAGEN PRODUCTO -->
                    <div class="caja-imagen">
                        <img id="img_producto" src="<?php echo $productos[$i]->getImg();  ?>">
                    </div>
                    <div class="contenido-texto">
                        <div class="texto-producto">
                            <h3><?php echo $productos[$i]->getNombre();  ?> </h3>
                            <!-- DESCRIPCION -->
                            <!-- PRECIO -->
                            <p id="precio"> <?php echo $productos[$i]->getPrecio();  ?> <span>€</span></p>
                        </div>
                        <div class="carrito-imagen">
                            <a
                                href="control.php?f=iniciarCompra&idProducto=<?php echo $productos[$i]->getIdProducto();?>"><img
                                    id="carrito" src="media/carrito.png"></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>



            </div>
        </div>

    </div>


    <?php include "footer.php"; ?>

</body>

</html>
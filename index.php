<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        include "head.php";
    ?>
    <title>Inicio</title>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="main-content full-container">
        <div class="banner">
            <h1>LA HISTORIA <br>DE </h1>
            <img src="./media/acTitle.png" alt="AnimalCrossing Title">
        </div>
        <div class="content container">
            <div class="block-entradas container">
                <?php
                if (empty($_SESSION['div'])) {
                    header("Location: control.php?f=index");
                }
                $div =  $_SESSION['div'];
                $cont = sizeof($div);
                for($i = 0; $i < $cont; $i++){
            ?>
                <div class="entrada">
                    <div class="entrada-titulo">
                        <img src="<?php echo $div[$i]->getImagen(); ?>" alt="Imagen entrada">
                        <div class="titulo">
                            <p><?php echo $div[$i]->getTitulo(); ?></p>
                        </div>
                    </div>
                    <div class="entrada-texto">
                        <p><?php echo $div[$i]->getTexto(); ?></p>
                    </div>
                </div>
                <?php 
                } ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
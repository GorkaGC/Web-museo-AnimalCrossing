<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>INDEX</title>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="main-content full-container">
        <div class="banner">
            <h1>LA HISTORIA <br>DE </h1>
            <img src="./media/acTitle.png" alt="AnimalCrossing Title">
        </div>
        <!-- ¿DIV TITULO/BANNER? -->
        <div class="content container">
            <audio autoplay="" loop="" src="media/index.mp3"></audio>


            <!-- DIV BLOQUES DE CONTENIDO -->
            <div class="block-entradas container">
                <?php
                $div =  $_SESSION['div'];
                //var_dump($div);
                $cont = sizeof($div);
                for($i = 0; $i < $cont; $i++){
            ?>
                <div class="entrada">
                    <div class="entrada-titulo">
                        <img src="<?php echo $div[$i]->getImagen(); ?>">
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
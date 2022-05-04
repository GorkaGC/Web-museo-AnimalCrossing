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
    <header class="full-container">
        <div class="navbar container">
            <div class="icon-main">
                <img src="media/icon_main1.png" alt="iconoDePaginaPrincipal">
            </div>
            <div class="nav-links">
                <a href="control.php?f=index" title="Historia">
                    <img src="media/icon_history.png" alt="iconoDeHistoria">
                </a>
                <a href="control.php?f=store" title="Tienda">
                    <img src="media/icon_shop.png" alt="iconoDeTienda">
                </a>
                <a href="control.php?f=games" title="Juegos">
                    <img src="media/icon_games.png" alt="iconoDeJuegos">
                </a>
            </div>

        </div>
    </header>

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
                require_once 'control.php';
                $div =  $_SESSION['div'] ;
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




    <footer class="full-container">
        <div class="contenido container">
            <div class="contacto-general">
                <div class="contacto"> <a href="#"> Contacta con nosotros </a></div>
            </div>
            <div class="social">
                <!--
                <a href="#"> <i class="fa-brands fa-facebook" style="color:#3b5998"></i></a>
                <a href="#"> <i class="fa-brands fa-twitter" style="color:#00acee"></i></a>
                <a href="#"> <i class="fa-brands fa-youtube" style="color:#FF0000"></i></a>
                <a href="#"> <i class="fa-brands fa-instagram" style="color:#8a3ab9"></i></a>
                -->
                <a href="#"> <img src="media/facebook.png"></a>
                <a href="#"> <img src="media/twitter.png"></a>
                <a href="#"> <img src="media/youtube.png"></a>
                <a href="#"> <img src="media/instagram.png"></a>
            </div>

            <div class="links">
                <ul>
                    <li>All rights reserved C</li>
                    <li>Created by: <span>Nerea Martinez</span> and <span>Gorka García</span></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
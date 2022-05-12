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
    <title>CONTACTO</title>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="contacto-full full-container">
        <div class="contacto full-container">
            <div class="who">
                <h1>¿QUIENES SOMOS?</h1>
                <?php
                $datos_nosotros =  $_SESSION['nosotros'];
                //var_dump($div);
                $cont = sizeof($datos_nosotros);
                for($i = 0; $i < $cont; $i++){
                   
                ?>
                <div class="who-content">
                    <img src="<?php echo $datos_nosotros[$i]->getUrlImgCreador(); ?>">
                    <div class="who-text">
                        <h3><?php echo $datos_nosotros[$i]->getNombreCreador(); ?></h3>
                        <p><?php echo $datos_nosotros[$i]->getInfoCreador(); ?></p>
                    </div>
                </div>
                    <?php 
                }
                    ?>
            </div>
            <div class="form-contact container">
                <h1>CONTACTO</h1>
                <div class="form-build">
                    <form method="post">
                        <input type="text" class="inputs" id="nombre" placeholder="Nombre">
                        <input type="text" class="inputs" id="correo" placeholder="Correo Electronico">
                        <textarea placeholder="Pon tu mensaje" id="mensaje"></textarea>
                        <label><input type="checkbox" id="cbox1" value="first_checkbox"> Acepto la politica de privacidad</label><br>
                        <input type="submit" id="sub" value="ENVIAR">
                        <div class="arrow-down"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
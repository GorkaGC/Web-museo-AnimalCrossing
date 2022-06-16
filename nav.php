<?php

/* NECESITAMOS REQUERIR LA CLASE ANTES DE SESSION, O NOS DA ERROR DE INCOMPLETE_CLASS */
require "divIndex.php";
require "juego.php";
require "creador.php";
require "user.php";
require "order.php";
require "productos.php";

if (!isset($_SESSION)) {
    session_start();
}
?>
<header class="full-container">
    <div class="navbar container">
        <div class="icon-main">
            <img id="tom" src="media/icon_main1.png" alt="Icono principal">
        </div>
        <div class="nav-links">
            <a class="menuItem" href="control.php?f=index" title="Historia">
                <img src="media/icon_history.png" alt="Enlace a página historia">
            </a>
            <a class="menuItem" href="control.php?f=store" title="Tienda">
                <img src="media/icon_shop.png" alt="Enlace a página tienda">
            </a>
            <a class="menuItem" href="control.php?f=games" title="Juegos">
                <img src="media/icon_games.png" alt="Enlace a página juegos">
            </a>
            <?php
        if (empty($_SESSION['userLoged'])) {
        ?>
            <a class="menuItem" href="control.php?f=login&option=login">
                <div class="sign-up">Inicia Sesión</div>
            </a>
            <?php } else {
            ?>
            <a class="menuItem" href="control.php?f=userInterface">
                <div class="sign-up"> <?php echo $_SESSION['user']->getUserName(); ?></div>
            </a>
            <?php
        }
        ?>
        </div>
        <button class="hamburger">
            <i class="menuIcon fa-solid fa-bars"></i>
            <i class="closeIcon fa-solid fa-xmark"></i>
        </button>
    </div>
</header>
<?php

/* NECESITAMOS REQUERIR LA CLASE ANTES DE SESSION, O NOS DA ERROR DE INCOMPLETE_CLASS */
require "divIndex.php";
require "juego.php";
require "creador.php";

if (!isset($_SESSION)) {
    session_start();
}


?>
<header class="full-container">
    <div class="navbar container">
        <div class="icon-main">
            <img src="media/icon_main1.png" alt="">
        </div>
        <div class="nav-links">
            <a class="menuItem" href="control.php?f=index" title="Historia">
                <img src="media/icon_history.png" alt="">
            </a>
            <a class="menuItem" href="control.php?f=store" title="Tienda">
                <img src="media/icon_shop.png" alt="">
            </a>
            <a class="menuItem" href="control.php?f=games" title="Juegos">
                <img src="media/icon_games.png" alt="">
            </a>
            <a class="menuItem" href="#">
                <div class="sign-up">Inicia Sesión</div>
            </a>
        </div>
        <button class="hamburger">
        <i class="menuIcon fa-solid fa-bars"></i>
        <i class="closeIcon fa-solid fa-xmark"></i>
        </button>
    </div>
</header>
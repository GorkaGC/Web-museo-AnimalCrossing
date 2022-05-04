<?php

require "conexion.php";


$conn = new ConectaBD();


$urlDestino = $_GET['f'];
switch ($urlDestino) {
    case "index":
        header("Location: index.php");
        break;
    case "games":
        header("Location: games.php");
        break;
    case "contact":
        header("Location: contacto.php");
        break;
    case "store":
        header("Location: store.php");
        break;
}
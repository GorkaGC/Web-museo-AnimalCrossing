 <?php

require "conexion.php";
require "divIndex.php";
session_start();

$conn = new ConectaBD();


$urlDestino = $_GET['f'];

switch ($urlDestino) {
    case "index":
       $div = $conn->set_divs_index();
       $_SESSION['div'] = $div;
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
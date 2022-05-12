 <?php

require "conexion.php";
require "divIndex.php";
require "juego.php";
require "creador.php";


if (!isset($_SESSION)) {
    session_start();
}

$conn = new ConectaBD();


$urlDestino = $_GET['f'];

switch ($urlDestino) {
    case "index":
        $div = $conn->set_divs_index();
        $_SESSION['div'] = $div;
        header("Location: index.php");
        break;
    case "games":
        $games = $conn->getAllGames();
        $_SESSION['listGames'] = $games;
        header("Location: games.php");
        break;
    case "contact":
        $datos_nosotros = $conn->getAllCreators();
        $_SESSION['nosotros'] = $datos_nosotros;
        header("Location: contacto.php");
        break;
    case "store":
        header("Location: store.php");
        break;
}
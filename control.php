 <?php

require "conexion.php";
require "divIndex.php";
require "juego.php";
require "creador.php";
require "user.php";


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
        $_SESSION['curiosities'] = $conn->getCuriositiesFromGame("game_ac");
        $_SESSION['news'] = $conn->getNewsFromGame("game_ac");
        $_SESSION['platforms'] = $conn->getPlatformsFromGame("game_ac");
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
    case "login":
        $_SESSION['optionLogin'] = $_GET['option'];
        header("Location: login.php");
        break;
    case "resultLogin":
        $n = $_REQUEST['userName'];
        $p = $_REQUEST['userPass'];
        $usuarioExiste = $conn->checkUser($n, $p);

        if($usuarioExiste) {
            $_SESSION['userLoged'] = $usuarioExiste;
            $_SESSION['user'] = $conn->returnUser($n);
            header("Location: index.php");
        } else {
            echo "Error";
            header("Location: login.php");
        }
       
        break;

    case "resultRegistro":
        $n = $_REQUEST['userName'];
        $p = $_REQUEST['userPass'];
        $m = $_REQUEST['userMail'];
        $u = new User($n, $p, $m);
        $usuarioInsertado = $conn->insertUser($u);

        if($usuarioInsertado) {
            header("Location: login.php");
        } else {
            echo "Error";
            $_SESSION['optionLogin'] = "registro";
            header("Location: login.php");
        }
        
        break;

    case "userInterface":
        echo "User Interface~~";
        echo "<br><a href='control.php?f=logOut'>Cerrar Sesión</a>";
        
        break;

    case "logOut":
        $_SESSION['userLoged'] = false;
        header("Location: index.php");
        break;
}
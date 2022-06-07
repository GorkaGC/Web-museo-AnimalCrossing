 <?php

require "conexion.php";
require "divIndex.php";
require "juego.php";
require "creador.php";
require "user.php";
require "order.php";
require "productos.php";


if (!isset($_SESSION)) {
    session_start();
}

$conn = new ConectaBD();

if(!empty($_GET['f'])) {
    $urlDestino = $_GET['f'];
} else {
    $urlDestino = $_POST['f'];
}


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
        $productos = $conn->takeProducts();
        $_SESSION['producto'] = $productos;
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
        $_SESSION['optionUserInterface'] = "checkUserInfo";
        $_SESSION['lastOrder'] = $conn->selectLastOrderByUser($_SESSION['user']);
        header("Location: userInterface.php");
        break;

    case "userInterfaceEditUserInfo":
        $_SESSION['optionUserInterface'] = "editUserInfo";
        header("Location: userInterface.php");
        break;

    case "userInterfacecheckUserOrders":
        $_SESSION['optionUserInterface'] = "checkUserOrders";
        $_SESSION['allUserOrders'] = $conn->selectAllOrdersByUser($_SESSION['user']);
        header("Location: userInterface.php");
        break;

    case "logOut":
        $_SESSION['userLoged'] = false;
        header("Location: index.php");
        break;

    case "alterUserTable":
        $userName = $_POST['userName'] == $_SESSION['user']->getUserName() ? $_SESSION['user']->getUserName() : $_POST['userName'];
        $userLastName = $_POST['userLastname'] == $_SESSION['user']->getUserLastname() ? $_SESSION['user']->getUserLastname() : $_POST['userLastname'];
        $userMail = $_POST['userMail'] == $_SESSION['user']->getUserMail() ? $_SESSION['user']->getUserMail() : $_POST['userMail'];
        $userAddress = $_POST['userAddress'] == $_SESSION['user']->getUserAddress() ? $_SESSION['user']->getUserAddress() : $_POST['userAddress'];
        $userPass = $_POST['userPass'] == $_SESSION['user']->getUserPass() ? $_SESSION['user']->getUserPass() : $_POST['userPass'];

        $u = new User($userName, $userPass, $userMail);
        $u->createUser($userName, $userPass, $userMail, $userAddress, $userLastName);
        $u->setUserID($_SESSION['user']->getUserID());

        $usuarioModificado = $conn->alterUserTable($u);

        if ($usuarioModificado) {
            $_SESSION['user'] = $u;
            $_SESSION['optionUserInterface'] = "checkUserInfo";
            header("Location: userInterface.php");
        } else {
            echo "Error";
        }
        break;

    case "sendContactMsg":
        //Warning: mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() in C:\Users\alexg\OneDrive\Escritorio\Web-museo-AnimalCrossing\control.php on line 134
        $nombre = $_POST['contactName'];
        $email = $_POST['contactMail'];
        $asunto = 'Formulario Contacto';
        $mensaje = $_POST['contactMsg'];


        if(mail('neeotp1510@gmail.com', $asunto, $mensaje)){
            echo "Correo enviado";
        }

        break;
 }
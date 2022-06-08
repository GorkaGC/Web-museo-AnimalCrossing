<?php

class ConectaBD
{
    /** DESCOMENTAR EL USER/PASS QUE NECESITES PARA NO ANDAR BORRANDO */
    private $servername = "localhost";
    private $database = "animalcrossing";
    private $username = "user";
    private $password = "pass";
    //private $username = "root";
    //private $password = "";
    //private $username = "Gorka";
    //private $password = "2d4wmi1";
    private $conn;

    function __construct()
    {
        $this->servername;
        $this->database;
        $this->username;
        $this->password;
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
    }

    public function set_divs_index()
    {
        $sql = "SELECT * FROM history";

        $result  = $this->conn->query($sql);
        $lista_divs = array();

        while ($row = $result->fetch_assoc()){
            $div = new divIndex($row['URL_IMG'],$row['TITLE'],$row['TEXT']);
            $lista_divs[] = $div;
        }
        return $lista_divs;
    }

    public function getAllGames() {
        $sql = "SELECT * FROM game ORDER BY GAME_NUMBER";

        $result  = $this->conn->query($sql);
        $listGames = array();

        while ($row = $result->fetch_assoc()){
            $game = new Juego($row['ID_GAME'], $row['URL_COVER_IMG'], $row['TITLE_GAME'], $row['GAME_DESC'], $row['RELEASE_DATE'], $row['URL_TRAILER']);
            $listGames[] = $game;
        }
        return $listGames;
    }

    public function getCuriositiesFromGame($idGame) {
        $sql = "SELECT * FROM curiosity WHERE ID_GAME = '$idGame'";

        $result = $this->conn->query($sql);
        $list = array();

        while ($row = $result->fetch_assoc()) {
            $list[] = $row['DESCRIPTION'];
        }
        return $list;
    }

    public function getNewsFromGame($idGame) {
        $sql = "SELECT * FROM new WHERE ID_GAME = '$idGame'";

        $result = $this->conn->query($sql);
        $list = array();

        while ($row = $result->fetch_assoc()) {
            $list[] = $row['NEW_DESCRIPTION'];
        }
        return $list;
    }

    public function getPlatformsFromGame($idGame) {
        $sql = "SELECT * FROM platform WHERE ID_GAME = '$idGame'";

        $result = $this->conn->query($sql);
        $list = array();

        while ($row = $result->fetch_assoc()) {
            $list[] = $row['PLATFORM_NAME'];
        }
        return $list;
    }

    public function getAllCreators() {
        $sql = "SELECT * FROM creator";

        $result  = $this->conn->query($sql);
        $listCreators = array();

        while ($row = $result->fetch_assoc()){
            $creator = new Creador($row['NAME_CREATOR'], $row['URL_CREATOR_IMG'], $row['INFO_CREATOR']);
            $listCreators[] = $creator;
        }
        return $listCreators;
    }

    public function checkUser($n, $p) {
        $sql = "Select * from user where USER_NAME = '$n' AND USER_PASS = '$p'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function returnUser($n) {
        $sql = "select * from user where USER_NAME = '$n'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        $u = new User($row["USER_NAME"], $row["USER_PASS"], $row["USER_MAIL"]);
        $u->setUserMail($row["USER_MAIL"]);
        $u->setUserLastname($row["USER_LASTNAME"]);
        $u->setUserAddress($row["USER_ADDRESS"]);
        $u->setUserID($row["USER_ID"]);
        return $u;
    }

    public function insertUser(User $u) {
        $previousCheck = $this->conn->query("Select * from user where USER_NAME = '" . $u->getUserName() . "' OR USER_MAIL = '" . $u->getUserMail() . "'");
        if ($previousCheck->num_rows == 1) {
            echo "ese usuario existe";
            die();
            return false;
        } else {
            $sql = "INSERT INTO user (USER_NAME, USER_PASS, USER_MAIL) VALUES ('" . $u->getUserName() . "', '" . $u->getUserPass() . "', '" . $u->getUserMail() . "')";
            if ($this->conn->query($sql)) {
                echo "usuario insertado";
                die();
                return true;
            } else {
                echo "usuario no insertado";
                die();
                return false;
            }
        }
    }

    public function selectLastOrderByUser(User $u) {
        $sql = "select * from orders where CUSTOMER_ID = '". $u->getUserID() ."' ORDER BY ORDER_ID DESC";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        $o = new Order($row["ORDER_ID"], $row["CUSTOMER_ID"], $row["ORDER_DATE"], $row["STATUS"]);

        return $o;
    }

    public function selectAllOrdersByUser(User $u) {
        $sql = "select * from orders where CUSTOMER_ID = '". $u->getUserID() ."' ORDER BY ORDER_ID DESC";
        $result = $this->conn->query($sql);

        $listOrders = array();

        while ($row = $result->fetch_assoc()){
            $order = new Order($row["ORDER_ID"], $row["CUSTOMER_ID"], $row["ORDER_DATE"], $row["STATUS"]);
            $listOrders[] = $order;
        }
        return $listOrders;
    }


    public function alterUserTable(User $u) {
        $sql = "UPDATE user SET USER_NAME = '". $u->getUserName()."', 
        USER_LASTNAME = '".$u->getUserLastname()."', USER_MAIL = '".$u->getUserMail()."', USER_ADDRESS = '". $u->getUserAddress() ."', 
        USER_PASS = '".$u->getUserPass()."' WHERE `USER_ID` = ".$u->getUserID()."";

        $result = $this->conn->query($sql);

        return $result;
    }

    public function takeProducts(){
        $sql = "SELECT * FROM item";

        $result  = $this->conn->query($sql);
        
        $products = array();

        while ($row = $result->fetch_assoc()){
            $producto = new productos($row['ITEM_IMG'],$row['ITEM_DESCRIPTION'],$row['UNIT_PRICE']);
            $products[] = $producto;
        }
        
        return $products;
    }

}
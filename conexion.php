<?php

class ConectaBD
{
    /** DESCOMENTAR EL USER/PASS QUE NECESITES PARA NO ANDAR BORRANDO */
    private $servername = "localhost";
    private $database = "animalcrossing";
    //private $username = "user";
    //private $password = "pass";
    private $username = "root";
    private $password = "";
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

    /**
     * Función que devuelve toda la info de la tabla history.
     */
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

    /**
     * Función que devuelve toda la info de la tabla game.
     */
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

    /**
     * Función que devuelve todas las curiosidades de un juego cuyo ID_GAME corresponde al recibido por parámetro.
     */
    public function getCuriositiesFromGame($idGame) {
        $sql = "SELECT * FROM curiosity WHERE ID_GAME = '$idGame'";

        $result = $this->conn->query($sql);
        $list = array();

        while ($row = $result->fetch_assoc()) {
            $list[] = $row['DESCRIPTION'];
        }
        return $list;
    }

    /**
     * Función que devuelve todas las novedades de un juego cuyo ID_GAME corresponde al recibido por parámetro.
     */
    public function getNewsFromGame($idGame) {
        $sql = "SELECT * FROM new WHERE ID_GAME = '$idGame'";

        $result = $this->conn->query($sql);
        $list = array();

        while ($row = $result->fetch_assoc()) {
            $list[] = $row['NEW_DESCRIPTION'];
        }
        return $list;
    }

    /**
     * Función que devuelve todas las plataformas de un juego cuyo ID_GAME corresponde al recibido por parámetro.
     */
    public function getPlatformsFromGame($idGame) {
        $sql = "SELECT * FROM platform WHERE ID_GAME = '$idGame'";

        $result = $this->conn->query($sql);
        $list = array();

        while ($row = $result->fetch_assoc()) {
            $list[] = $row['PLATFORM_NAME'];
        }
        return $list;
    }

    /**
     * Función que devuelve toda la info de la tabla creator.
     */
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

    /**
     * Función que comprueba si existe un usuario en la base de datos que coincida con el nombre y contraseña recibidos por parámetro.
     */
    public function checkUser($n, $p) {
        $sql = "Select * from user where USER_NAME = '$n' AND USER_PASS = '$p'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función que devuelve toda la info de un usuario según el nombre recibido por parámetro.
     */
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

    /**
     * Función que inserta un registro en la tabla user, recibe por parámetro un objeto de la clase User.
     */
    public function insertUser(User $u) {
        $previousCheck = $this->conn->query("Select * from user where USER_NAME = '" . $u->getUserName() . "' OR USER_MAIL = '" . $u->getUserMail() . "'");
        if ($previousCheck->num_rows == 1) {
            return false;
        } else {
            $sql = "INSERT INTO user (USER_NAME, USER_PASS, USER_MAIL) VALUES ('" . $u->getUserName() . "', '" . $u->getUserPass() . "', '" . $u->getUserMail() . "')";
            if ($this->conn->query($sql)) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Función que recupera el último pedido de la tabla orders para un usuario recibido por parámetro.
     */
    public function selectLastOrderByUser(User $u) {
        $sql = "select * from orders where CUSTOMER_ID = '". $u->getUserID() ."' ORDER BY ORDER_ID DESC";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        $o = new Order($row["ORDER_ID"], $row["CUSTOMER_ID"], $row["ORDER_DATE"], $row["STATUS"]);

        return $o;
    }

    /**
     * Función que recumera todos los pedidos de la tabla orders para un usuario recibido por parámetro.
     */
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

    /**
     * Función que modifica en la tabla user los datos de un usuario recibido por parámetro.
     */
    public function alterUserTable(User $u) {
        $sql = "UPDATE user SET USER_NAME = '". $u->getUserName()."', 
        USER_LASTNAME = '".$u->getUserLastname()."', USER_MAIL = '".$u->getUserMail()."', USER_ADDRESS = '". $u->getUserAddress() ."', 
        USER_PASS = '".$u->getUserPass()."' WHERE `USER_ID` = ".$u->getUserID()."";

        $result = $this->conn->query($sql);

        return $result;
    }

    /**
     * Función que devuelve toda la info de la tabla item.
     */
    public function takeProducts(){
        $sql = "SELECT * FROM item";

        $result  = $this->conn->query($sql);
        
        $products = array();

        while ($row = $result->fetch_assoc()){
            $producto = new productos($row['ITEM_ID'], $row['ITEM_IMG'], $row['ITEM_DESCRIPTION'],$row['UNIT_PRICE']);
            $products[] = $producto;
        }
        
        return $products;
    }

    /**
     * Función que devuelve un producto de la tabla item según el ITEM_ID recibido por parámetro.
     */
    public function returnProductByID($id) {
        $sql = "SELECT * FROM item WHERE ITEM_ID = $id";
        $result  = $this->conn->query($sql);
        $row = $result->fetch_assoc();

        $p = new productos($row['ITEM_ID'], $row['ITEM_IMG'], $row['ITEM_DESCRIPTION'],$row['UNIT_PRICE']);

        return $p;
    }

    /**
     * Función que devuelve el último ORDER_ID de la tabla orders.
     */
    public function returnLastOrderID() {
        $sql = "SELECT ORDER_ID FROM `orders` ORDER BY ORDER_ID DESC";
        $result  = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            $ultimoId = 1;
        } else {
            $row = $result->fetch_assoc();
            $ultimoId = $row['ORDER_ID'];
        }
        return $ultimoId;

        
    }

    /**
     * Función que inserta un registro en la tabla orders, recibe por parámetro el usuario que realiza el pedido, el producto comprado y 
     * la cantidad de producto.
     */
    public function insertOrder(User $u, productos $i, $c) {
        $now = date_create()->format('Y-m-d');
        $orderID = $this->returnLastOrderID()+1;

        $sql = "INSERT INTO `orders` (`ORDER_ID`, `CUSTOMER_ID`, `ORDER_DATE`, `STATUS`) VALUES ('$orderID', '".$u->getUserID()."', '$now', 'EN PREPARACIÓN');";
        
        $result  = $this->conn->query($sql);

        $resultDetail = $this->insertDetails($i, $c, $orderID);

        $resultDetail ? $result = true : $result = false;

        if (!$result) {
            $sql = "DELETE FROM `orders` WHERE `orders`.`ORDER_ID` = $orderID";
            $this->conn->query($sql);
        }
        
        return $result;
    }

    /**
     * Función que inserta un registro en la tabla details, recibe por parámetro el producto comprado, la cantidad y el ORDER_ID del pedido.
     */
    public function insertDetails(productos $i, $c, $orderID) {
        
        $sql = "INSERT INTO `details` (`ORDER_ID`, `ITEM_ID`, `ITEM_QUANTITY`, `DETAIL_UNIT_PRICE`) VALUES ('$orderID', '".$i->getIdProducto()."', '$c', '".$i->getPrecio()."')";

        $result = $this->conn->query($sql);
        return $result;
    }

    /**
     * Función que borra un registro de la tabla user correspondiente al usuario pasado por parámetro.
     */ 
    public function deleteUserAccount(User $u) {
        $sql = "DELETE FROM `user` WHERE `user`.`USER_ID` = '".$u->getUserID()."'";
        $result = $this->conn->query($sql);

        return $result;
    }
}
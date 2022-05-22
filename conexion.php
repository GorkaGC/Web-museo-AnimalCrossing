<?php

class ConectaBD
{
    /** DESCOMENTAR EL USER/PASS QUE NECESITES PARA NO ANDAR BORRANDO */
    private $servername = "localhost";
    private $database = "animalcrossing";
    //private $username = "user";
    //private $password = "pass";
    //private $username = "root";
    //private $password = "";
    private $username = "Gorka";
    private $password = "2d4wmi1";
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
        $sql = "SELECT * FROM game";

        $result  = $this->conn->query($sql);
        $listGames = array();

        while ($row = $result->fetch_assoc()){
            $game = new Juego($row['ID_GAME'], $row['URL_COVER_IMG'], $row['TITLE_GAME'], $row['GAME_DESC'], $row['RELEASE_DATE']);
            $listGames[] = $game;
        }
        return $listGames;
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
        $sql = "Select * from user where USER_NAME = '$n' OR USER_MAIL = '$n' AND USER_PASS = '$p'";
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



}
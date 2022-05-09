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



}
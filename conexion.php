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
    private $conn;

    function __construct()
    {
        $this->servername;
        $this->database;
        $this->username;
        $this->password;
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
    }

    function set_divs_index()
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
}


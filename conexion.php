<?php

class ConectaBD
{

    private $servername = "localhost";
    private $database = "prueba";
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

    function set_divs_index()
    {
        $sql = "SELECT * FROM indexphp";

        $result  = $this->conn->query($sql);
        $lista_divs = array();

        while ($row = $result->fetch_assoc()){
            $div = new divIndex($row['imagen'],$row['titulo'],$row['texto']);
            $lista_divs[] = $div;
        }
        return $lista_divs;
    }
}


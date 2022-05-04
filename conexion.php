<?php

class ConectaBD {

private $servername = "localhost";
private $database = "animalcrossing";
private $username = "user";
private $password = "pass";
private $conn;

function __construct() {
    $this->servername;
    $this->database;
    $this->username;
    $this->password;
    $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
}

}
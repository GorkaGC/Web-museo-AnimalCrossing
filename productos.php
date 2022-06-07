<?php

class productos {
    private $img;
    private $nombre;
    private $precio;


    public function __construct($img, $nombre,$precio){
        $this->img = $img;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getImg(){
        return $this->img;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPrecio(){
        return $this->precio;
    }

    public function setImg($img):void{
        $this->img = $img;
    }
    public function setNombre($nombre):void{
        $this->nombre = $nombre;
    }
    public function setPrecio($precio):void{
        $this->precio = $precio;
    }

}
?>
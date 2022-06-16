<?php

class productos {
    private $idProducto;
    private $img;
    private $nombre;
    private $precio;

    public function __construct($idProducto, $img, $nombre,$precio){
        $this->idProducto = $idProducto;
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

    /**
     * Get the value of idProducto
     */ 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set the value of idProducto
     *
     * @return  self
     */ 
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }
}
?>
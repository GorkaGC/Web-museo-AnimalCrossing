<?php
class divIndex{
    private $imagen;
    private $titulo;
    private $texto;

    public function __construct($imagen, $titulo, $texto){
        $this->imagen = $imagen;
        $this->titulo = $titulo;
        $this->texto = $texto;
    }

        public function getImagen(){
            return $this->imagen;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getTexto(){
            return $this->texto;
        }

        public function setImagen($imagen):void{
            $this->imagen = $imagen;
        }
        public function setTitulo($titulo):void{
            $this->titulo = $titulo;
        }
        public function setTexto($texto):void{
            $this->texto = $texto;
        }
}

?>
<?php
class creador{
    private $nombreCreador;
    private $urlImgCreador;
    private $infoCreador;

    public function __construct($nombreCreador, $urlImgCreador, $infoCreador){
        $this->nombreCreador = $nombreCreador;
        $this->urlImgCreador = $urlImgCreador;
        $this->infoCreador = $infoCreador;
    }

       

    /**
     * Get the value of nombreCreador
     */ 
    public function getNombreCreador()
    {
        return $this->nombreCreador;
    }

    /**
     * Set the value of nombreCreador
     *
     * @return  self
     */ 
    public function setNombreCreador($nombreCreador)
    {
        $this->nombreCreador = $nombreCreador;

        return $this;
    }

    /**
     * Get the value of urlImgCreador
     */ 
    public function getUrlImgCreador()
    {
        return $this->urlImgCreador;
    }

    /**
     * Set the value of urlImgCreador
     *
     * @return  self
     */ 
    public function setUrlImgCreador($urlImgCreador)
    {
        $this->urlImgCreador = $urlImgCreador;

        return $this;
    }

    /**
     * Get the value of infoCreador
     */ 
    public function getInfoCreador()
    {
        return $this->infoCreador;
    }

    /**
     * Set the value of infoCreador
     *
     * @return  self
     */ 
    public function setInfoCreador($infoCreador)
    {
        $this->infoCreador = $infoCreador;

        return $this;
    }
}

?>
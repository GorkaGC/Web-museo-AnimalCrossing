<?php
class Juego{
    private $idGame;
    private $urlImg;
    private $titleGame;
    private $gameDesc;
    private $releaseDate;

    public function __construct($idGame, $urlImg, $titleGame, $gameDesc, $releaseDate){
        $this->idGame = $idGame;
        $this->urlImg = $urlImg;
        $this->titleGame = $titleGame;
        $this->gameDesc = $gameDesc;
        $this->releaseDate = $releaseDate;
    }

        /**
     * Get the value of idGame
     */ 
    public function getIdGame()
    {
        return $this->idGame;
    }

    /**
     * Set the value of idGame
     *
     * @return  self
     */ 
    public function setIdGame($idGame)
    {
        $this->idGame = $idGame;

        return $this;
    }


    /**
     * Get the value of urlImg
     */ 
    public function getUrlImg()
    {
        return $this->urlImg;
    }

    /**
     * Set the value of urlImg
     *
     * @return  self
     */ 
    public function setUrlImg($urlImg)
    {
        $this->urlImg = $urlImg;

        return $this;
    }

    /**
     * Get the value of titleGame
     */ 
    public function getTitleGame()
    {
        return $this->titleGame;
    }

    /**
     * Set the value of titleGame
     *
     * @return  self
     */ 
    public function setTitleGame($titleGame)
    {
        $this->titleGame = $titleGame;

        return $this;
    }

    /**
     * Get the value of gameDesc
     */ 
    public function getGameDesc()
    {
        return $this->gameDesc;
    }

    /**
     * Set the value of gameDesc
     *
     * @return  self
     */ 
    public function setGameDesc($gameDesc)
    {
        $this->gameDesc = $gameDesc;

        return $this;
    }



    /**
     * Get the value of releaseDate
     */ 
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set the value of releaseDate
     *
     * @return  self
     */ 
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }
}

?>
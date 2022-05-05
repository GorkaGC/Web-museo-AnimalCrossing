<?php
class Juego{
    private $urlImg;
    private $titleGame;
    private $gameDesc;

    public function __construct($urlImg, $titleGame, $gameDesc){
        $this->urlImg = $urlImg;
        $this->titleGame = $titleGame;
        $this->gameDesc = $gameDesc;
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
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include "head.php";
    ?>
    <title>Juegos</title>
</head>

<body>
    <?php include "nav.php"; ?>

    <?php   
if (empty($_SESSION['listGames'])) {
    header("Location: control.php?f=games");
}
    $listGames = $_SESSION['listGames'];
    $text = $listGames[0]->getGameDesc();
    ?>
    <div class="games-full full-container">
        <div class="games-content container">
            <h1>Juegos</h1>
            <div class="container games-pag">
                <div class="games-list">
                    <?php 
                $cont = sizeof($listGames);
                for ($i=0; $i < $cont; $i++) { 
                    ?>
                    <div class="img-container"
                        onclick="getGameInfoOnClick('<?php echo $listGames[$i]-> getIdGame(); ?>')">
                        <img src="<?php echo $listGames[$i]-> getUrlImg(); ?>" alt="" id="<?php echo $i ?>" />
                    </div>
                    <?php } ?>
                    <label class="custom-select">
                        <select name="games" id="juegoSeleccionado" onchange="getGameInfoOnChange()">
                            <?php
                    for ($i=0; $i < $cont; $i++) { 
                    ?>
                            <option value="<?php echo $listGames[$i]-> getIdGame(); ?>">
                                <?php echo $listGames[$i]->getTitleGame(); ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>


                <div class="block-game-description">
                    <div class="game-title-row">
                        <div id='id-title-game'>
                            <h2><?php echo $listGames[0]->getTitleGame(); ?></h2>
                        </div>
                        <div id='id-release-date'> <?php echo $listGames[0]->getReleaseDate(); ?></div>
                    </div>
                    <div class="game-trailer-title-row">
                        <h3>Trailer</h3>
                        <p>Video promocional sobre el videojuego: <span
                                id="id-trailer-game-name"><?php echo $listGames[0]->getTitleGame(); ?></span></p>
                    </div>
                    <div class="game-trailer-row">
                        <video controls muted id="id-game-trailer">
                            <source src="<?php echo $listGames[0]->getUrlTrailer(); ?>" type="video/mp4" />
                        </video>
                    </div>

                    <div class="game-arg-row">
                        <h3>Argumento</h3>
                        <p id='id-game-description'> <?php echo $listGames[0]->getGameDesc(); ?></p>
                    </div>
                    <div class="game-extras-row">
                        <section id="main">
                            <div id="tabs">
                                <span class="diana" id="uno"></span>
                                <a href="#uno" class="tab-e">Curiosidades</a>
                                <span class="diana" id="dos"></span>
                                <a href="#dos" class="tab-e">Novedades</a>
                                <span class="diana" id="tres"></span>
                                <a href="#tres" class="tab-e">Plataformas</a>
                                <div id="pnl_1" class="active">
                                    <div>
                                        <ul id="id-game-curiosities">
                                            <?php 
                                            $contC = sizeof($_SESSION['curiosities']);
                                            for ($i=0; $i < $contC; $i++) { 
                                                ?>
                                            <li> <?php echo $_SESSION['curiosities'][$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div id="pnl_2">
                                    <div>
                                        <ul id="id-game-news">
                                            <?php 
                                            $contN = sizeof($_SESSION['news']);
                                            if ($contN == 0) {
                                               ?> <p>No contiene información.</p> <?php
                                            } else {
                                                for ($i=0; $i < $contN; $i++) { 
                                                    ?>
                                            <li> <?php echo $_SESSION['news'][$i] ?></li>
                                            <?php } 
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div id="pnl_3">
                                    <div>
                                        <ul id="id-game-platforms">
                                            <?php 
                                            $contP = sizeof($_SESSION['platforms']);
                                            for ($i=0; $i < $contP; $i++) { 
                                                ?>
                                            <li> <?php echo $_SESSION['platforms'][$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>
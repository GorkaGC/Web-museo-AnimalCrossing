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

    <style>

    </style>
</head>

<body>
    <?php include "nav.php"; ?>

    <?php   
if (empty($_SESSION['listGames'])) {
    header("Location: control.php?f=games");
}
    $listGames = $_SESSION['listGames'];
    //var_dump($listGames);

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
                    <div class="img-container" id='imgContainer'>
                        <img src="<?php echo $listGames[$i]-> getUrlImg(); ?>" alt="" id="<?php echo $i ?>"
                            onclick="displayGameInfo()">

                    </div>
                    <!--
                <div class="hr">

                </div>-->

                    <?php } ?>

                </div>



                <div class="block-game-description">
                    <div class="game-title-row">
                        <div> <?php echo $listGames[0]->getTitleGame(); ?></div>
                        <div> <?php echo $listGames[0]->getReleaseDate(); ?></div>
                    </div>
                    <div class="game-trailer-row">
                        trailer
                    </div>

                    <div class="game-arg-row">
                        <h3>Argumento</h3>
                        <p> <?php echo $listGames[0]->getGameDesc(); ?></p>
                    </div>



                    <div class="game-arg-row">
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
                                        <p> <?php echo $listGames[0]->getGameDesc(); ?></p>
                                    </div>
                                </div>

                                <div id="pnl_2">
                                    <div>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                            inventore
                                            veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
                                            enim
                                            ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                                            quia
                                            consequuntur magni dolores.</p>

                                        <p>Neque porro quisquam est, qui
                                            dolorem
                                            ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non
                                            numquam
                                            eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                            voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                            corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                        </p>
                                    </div>
                                </div>

                                <div id="pnl_3">
                                    <div>
                                        <p> No officiis lobortis eam. Soluta laboramus mei cu, sea modo dicant eu,
                                            cu
                                            ius eius aperiri. An pro dicam contentiones. Duo amet lorem officiis ex,
                                            an
                                            legimus nusquam atomorum per, per cu erat ornatus. Nibh oratio eam eu.
                                            An
                                            lobortis sapientem delicatissimi mea, ex dicunt tacimates quo, nec ad
                                            aeque
                                            adipisci efficiantur.</p>

                                        <p> Pri ad quando suscipit conclusionemque, ad vel dico ubique. Et sit
                                            utinam
                                            apeirian. Ea nemore delicatissimi eos, cum adhuc dignissim ad, putent
                                            ocurreret has ut. Eos amet duis solet id, est ne prima nostro virtute,
                                            ea
                                            pri etiam recteque disputando. Enim dolorum vivendum at vel, vis odio
                                            consul
                                            te.</p>
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

<script>
/* function displayGameInfo(x) {
    var prueba = x.id;

} */
</script>


<!-- 
    https://stackoverflow.com/questions/6450810/how-do-i-distribute-values-of-an-array-in-three-columns/6463658#6463658
               
                <img src="" alt="" onmouseover="display(this)" id="game_ac">
                <hr>
                <img src="animal_crossing_wild_world.png" alt="" onmouseover="display(this)" id="game_ac_ww">
                <hr>
                <img src="animal_crossing_city_folk.png" alt="" onmouseover="display(this)" id="game_ac_cf">
                <hr>
                <img src="animal_crossing_lets_go_to_the_city.png" alt="" onmouseover="display(this)" id="game_ac_lgttc">
                <hr>
                <img src="animal_crossing_new_leaf.png" alt="" onmouseover="display(this)" id="game_ac_nl">
                <hr>
                <img src="animal_crossing_new_horizons.png" alt="" onmouseover="display(this)" id="game_ac_nh">
-->
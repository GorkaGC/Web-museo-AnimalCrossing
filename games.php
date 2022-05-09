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

    $listGames = $_SESSION['listGames'];
    //var_dump($listGames);

    $text = $listGames[0]->getGameDesc();
    //var_dump($text);

     // PRUEBA
    // $count = 0;
    // for ($i=0; $i < strlen($text); $i++) { 
    //     echo "$text[$i]";
    //     if ($text[$i] === '.') {
    //         $count++;
    //         if ($count>1) {
    //             echo '<br>';
    //         }
            
    //     }
    // }
    
    ?>

    

    <div class=" full-container">
        <div class="games-content container">
        <h1>Juegos</h1>
        <div class="container games-pag">
            <div class="games-list">
                <?php 
                $cont = sizeof($listGames);
                for ($i=0; $i < $cont; $i++) { 
                    ?>
                <div class="img-container">
                    <img src="<?php echo $listGames[$i]-> getUrlImg(); ?>" alt="" onmouseover="display(this)"
                        id="game_ac">

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
            </div>
        </div>
    </div>
        </div>
        
    


    <?php include "footer.php"; ?>
</body>

</html>


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
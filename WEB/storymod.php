<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Martin Carpenter</title>

    <meta name="description" content="Martin carpenter Games">
    <!--page description-->
    <meta name="keywords" content="Martin Carpenter,Games,level">
    <!--Page keywords-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Setting up a web page visibility zone for the user-->

    <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir">
    <!--Page authors-->
    <link rel="icon" type="image/x-con" href="image/logomartin.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/choiceoflevel.css">
    <?php

    ?>

</head>

<body>

<script>
    //on convertit la variable path en php en variable javascript
    //var path = "<?php //echo $path; ?>";
    // function RedirectPage($buttonID){
    //         path = GetPathFromDB($buttonID);
    //         $url = "users_levels.php?level=".$path;
    //         header("Location: rules.php");
    //         exit();
    // }


    </script>
    <video id="background-video" muted="" autoplay="autoplay" playsinline loop>
        <source src="image/background.mp4" type="video/mp4">
    </video>
    <header>
        <div class="buttonhead">
            <button class="back" type=submit>
                <a href="game.php">
                    <img class="backimg" src="image/button/arrow.png">
                </a>
            </button>
            <a class="al" - href="settingingames/settinglevelchoice.php">
                <img class="settingimg" src="image/button/boutonsetting.png" />
            </a>

        </div>
    </header>
    <main class="main">
    <button id="niveau" class="niveau" >
            <a>
                1
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                2
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                3
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                4
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                5
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                6
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                7
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                8
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                9
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                10
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                11
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                12
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                13
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                14
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                15
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                16
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                17
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                18
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                19
            </a>
        </button>
        <button id="niveau" class="niveau" type=submit>
            <a>
                20
            </a>
        </button>
        <SCript>
                // Sélectionnez tous les boutons avec la classe "niveau"
const boutons = document.querySelectorAll('.niveau');

// Parcourez chaque bouton et ajoutez un gestionnaire d'événements de clic
boutons.forEach(bouton => {
  bouton.addEventListener('click', () => {
    // Récupérez le numéro affiché dans l'élément <a>
    const numero = bouton.querySelector('a').textContent.trim();
    //on redirige vers la page de jeu avec le niveau choisi
    window.location.href = "users_levels.php?story_level=" + numero;
  });
});
//on convertit la variable numero JS en variable php

        </SCript>
    </main>
</body>

</html>
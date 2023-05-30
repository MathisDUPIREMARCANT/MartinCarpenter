<?php
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
    <link rel="icon" type="image/x-con" href="WEB/image/logo.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/choiceoflevel.css">
    <?php
        if(isset($_COOKIE['ColorButton'])==TRUE){
            $style=$_COOKIE['ColorButton']; //on récupère le theme choisi enregistré dans le cookie
            echo"
            <link rel='stylesheet' href='CSS/Changecolorbutton/$style.css' />";
            }
        ?>
</head>

<body>
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
        <button id="niveau" class="niveau" type=submit>
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
    </main>
</body>

</html>
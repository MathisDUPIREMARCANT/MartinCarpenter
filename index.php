<?php
session_start() ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Martin Carpenter</title>

    <meta name="description" content="Martin carpenter Homepages">
    <!--page description-->
    <meta name="keywords" content="Martin Carpenter,Connexion,Rules,Games ">
    <!--Page keywords-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Setting up a web page visibility zone for the user-->

    <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir">
    <!--Page authors-->
    <link rel="icon" type="image/x-con" href="WEB/image/logo.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="WEB/CSS/index.css">
    <?php
        if(isset($_COOKIE['ColorButton'])==TRUE){
        $style=$_COOKIE['ColorButton']; //on récupère le theme choisi enregistré dans le cookie
        echo"
        <link rel='stylesheet' href='WEB/CSS/Changecolorbutton/$style.css' />";
        }
        ?>
</head>

<body class="body">

    <video id="background-video" autoplay="autoplay" playsinline loop>
        <source src="WEB/image/background.mp4" type="video/mp4">
    </video>

    <header>
        <div class="buttonhead">
            <button class="avatar" type=submit>
                <a href="WEB/user.php">
                    <img class="avatarimg" src="WEB/image/button/martin.png" />
                </a>
            </button>

            <a class="al" - href="WEB/settingingames/setting.php">
                <img class="settingimg" src="WEB/image/button/boutonsetting.png" />
            </a>

        </div>
    </header>
    </div>
    <div class="Main_grid">
        <main>
            <div class="Titre">Martin Carpenter</div>

            <div class="buttons">
                <button id="Button" class="Button" type="submit">
                    <a id="writebutton" class='writebutton' href="WEB/game.php">Play</a>
                </button>

                <button id="Button" class="Button" type="submit">
                    <a id="writebutton" class="writebutton" href="WEB/rules.php">Rules</a>
                </button>



                <button id="Button" class="Button" type="submit">
                    <a id="writebutton" class='writebutton' href="WEB/sign_in_up.php">Connexion</a>
                </button>


            </div>
        </main>
    </div>
    <div class="Footer">
        <footer>

            <audio class="audio" controls>
                <source src="WEB/image/music.mp3" type="video/mp4">
            </audio>

            </button>
        </footer>
    </div>
</body>
</div>

</html>
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
    <link rel="stylesheet" href="CSS/game.css">
    <?php
    if(isset($_COOKIE['Colorgame'])==TRUE){
    $style=$_COOKIE['Colorgame']; //on récupère le theme choisi enregistré dans le cookie
    echo"
    <link rel='stylesheet' href='CSS/Changecolor/$style.css' />";
    }
    ?>
</head>

<body>
    <script>
    function togglePopup() {
        var popup = document.getElementById("popup");
        if (popup.style.display === "none") {
            popup.style.display = "block";
        } else {
            popup.style.display = "none";
        }
    }

    function hideButton() {
        var boutonPause = document.getElementById("boutonPause");
        boutonPause.style.display = "none";
        var main = document.getElementById("main");
        main.style.display = "none";
        var savepos = document.getElementById("savepos");
        savepos.style.display = "none";
    }

    function showButton() {
        var boutonPause = document.getElementById("boutonPause");
        boutonPause.style.display = "block";
        var main = document.getElementById("main");
        main.style.display = "flex";
        var savepos = document.getElementById("savepos");
        savepos.style.display = "block";
    }
    </script>
    <video id="background-video" autoplay="autoplay" playsinline loop>
        <source src="image/background.mp4" type="video/mp4">
    </video>

    <header>
        <div class="buttonhead">
            <button id="boutonPause" class="pause" type="submit" onclick="togglePopup(); hideButton()">
                <a class="al"><img class="pauseimg" src="image/buttonpause.png"></a>
            </button>
            <a id="savepos" class="savepos">
                <img class="save" src="image/save.png" />
            </a>
        </div>
        <div id="popup" style="display: none;">
            <button class="Button" type="submit">
                <a class="al" href="game.php">Retry</a>
            </button>

            <button class="Button" type="submit">
                <a class="al" href="../index.php">Back Home</a>
            </button>

            <button class="Button" type="submit" onclick="togglePopup(); showButton()">
                <a class="al">Resume</a>
            </button>

            <button class="Button" type="submit">
                <a class="al" href="settingingames/settingrandommod.php">Setting</a>
            </button>
        </div>
    </header>
    <main Id="main" class="main">
        <div id="game" class="game">
            <div class="martinplace">
                <img class="martin" src="image/martin1.png">
            </div>
        </div>
    </main>
</body>

</html>
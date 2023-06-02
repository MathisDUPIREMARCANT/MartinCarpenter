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
    <link rel="icon" type="image/x-con" href="image/logo.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/win.css">
    <?php
   if(isset($_COOKIE['ColorButton'])==TRUE){
    $style=$_COOKIE['ColorButton']; //on récupère le theme choisi enregistré dans le cookie
    echo"
    <link rel='stylesheet' href='CSS/Changecolorbutton/$style.css' />";
    }
    if(isset($_COOKIE['Colorgame'])==TRUE){
        $style=$_COOKIE['Colorgame']; //on récupère le theme choisi enregistré dans le cookie
        echo"
        <link rel='stylesheet' href='CSS/Changecolor/$style.css' />";
        }
    ?>
</head>


<body>

    <video id="background-video2" autoplay="autoplay" playsinline loop>
        <source src="image/b.mp4" type="video/mp4">
    </video>
    <header>
        <div class="buttonhead">
            <button class="back" type="submit">
                <a class="al" - href="../index.php"><img class="backimg" src="image/button/vide.png"></a>
            </button>
        </div>
    </header>
    <main>
        <div class="win">
            You WIN !
        </div>
        <script>
            //on redirige vers la page de jeu au bout de 3 secondes
            setTimeout(function() {
                window.location.href = "../index.php";
            }, 3000);
        </script>
    </main>
</body>
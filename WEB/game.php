<?php
session_start();
if(isset($_SESSION['username'])){
    echo'

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
    <link rel="stylesheet" href="CSS/gamehome.css">
</head>

<body>
    <video id="background-video" muted="" autoplay="autoplay" playsinline loop>
        <source src="image/background.mp4" type="video/mp4">
    </video>
    <header>
        <div class="buttonhead">
            <button class="back" type=submit>
                <a href="../index.php">
                    <img class="backimg" src="image/arrow.png">
                </a>
            </button>
            <a class="al" - href="settingingames/settinghomegame.php">
                <img class="settingimg" src="image/boutonsetting.png" />
            </a>

        </div>
    </header>
    <main class="main">
        <button class="Buttonstory" onclick="redirectTo("storymod.php")"><a class="textstory">Story
                Mod</a></button>
        <div class="games">
            <button class="Buttoneasy" onclick="redirectTo('randommod.php')"><a class="texteasy">Easy Mod</a></button>
            <button class="Buttonmedium" onclick="redirectTo('randommod.php')"><a class="textmedium">Medium
                    Mod</a></button>
            <button class="Buttonhard" onclick="redirectTo("randommod.php")"><a class="texthard">Hard Mod</a></button>
        </div>
        <div class="creationgames">
            <button class="Buttoncreate" onclick="redirectTo("createmod.php")"><a class="textcreate">Create
                    Mod</a></button>
            <button class="ButtonLevel" onclick="redirectTo("level.php")"><a class="textlevel">My Level</a></button>
        </div>


    </main>

    <script>
    function redirectTo(url) {
        window.location.href = url;
    }
    </script>
</body>

</html>';
}
else{ 
    header("Location: sign_in_up.php?fail=2");
    return;
}
?>
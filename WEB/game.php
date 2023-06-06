<?php
session_start();
if(isset($_SESSION['username'])){
    
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
                    <img class="backimg" src="image/button/arrow.png">
                </a>
            </button>
            <a class="al" - href="settingingames/settinghomegame.php">
                <img class="settingimg" src="image/button/boutonsetting.png" />
            </a>

        </div>
    </header>
    <main class="main">
    <div class="game">
        <button class="Buttonstory" onclick="redirectTo('storymod.php')"><a class="textstory">Story
                Mode</a></button>
        <button class="Buttonstory" onclick="redirectTo('randommod.php?mod=custom')"><a class="textstory">Custom
            Mode</a></button>
            </div>
        <div class="games">
            <button class="Buttoneasy" onclick="redirectTo2('randommod.php?mod=easy')"><a class="texteasy">Easy Mode</a></button>
            <button class="Buttonmedium" onclick="redirectTo2('randommod.php?mod=medium')"><a class="textmedium">Medium
                    Mode</a></button>
            <button class="Buttonhard" onclick="redirectTo2('randommod.php?mod=hard')"><a class="texthard">Hard Mode</a></button>
        </div>
        <div class="creationgames">
            <button class="Buttoncreate" onclick="redirectTo('createmod.php')"><a class="textcreate">Create
                    level</a></button>
            <button class="ButtonLevel" onclick="redirectTo('level.php')"><a class="textlevel">My Levels</a></button>
        </div>


    </main>

    <script>
    var id = Date.now(); //ID POUR LA VICTOIRE
    function redirectTo2(url) {
        window.location.href = url + "&id=" + id;
    }
    function redirectTo(url) {
        window.location.href = url;
    }
    </script>
</body>

</html>
<?php
}
else{ 
    header("Location: sign_in_up.php");
    return;
}
?>
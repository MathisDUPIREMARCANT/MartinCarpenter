<?php
session_start() ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" >
    
    <title>Martin Carpenter</title>
   
    <meta name="description" content="Martin carpenter Homepages" >
    <!--page description-->
    <meta name="keywords" content="Martin Carpenter,Connexion,Rules,Games " >
    <!--Page keywords-->
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Setting up a web page visibility zone for the user-->
    
    <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir" >
    <!--Page authors-->
    <link rel="icon" type="image/x-con" href="WEB/image/logo.ico" >
    <!--Browser icon-->
    <link rel="stylesheet" href="WEB/CSS/index.css">
</head>

<body >
<video
      id="background-video"
      muted=""
      autoplay="autoplay"
      playsinline
      loop>
      <source src="WEB/image/background.mp4" type="video/mp4" ></video>
    <header>
        <div class="buttonhead">
    <button class="avatar" type=submit>
        <a href="WEB/user.php">
        <img class="avatarimg" src="WEB/image/avatar.png"  >
        </a>
    
   <button class="setting" type="submit" onclick="showPopup()">
    <a class="al"- href="WEB/setting.php" ><img class="settingimg" src="WEB/image/para.png" ></a>
    </button>

    
</div>
    </header>
    <main>


    <div class="buttons">
    <button class="button" type="submit">
    <a class='al' href="WEB/game.php"
    >PLAY</a>
    </button>

    <button class="button" type="submit" >
    <a class="al" href="WEB/rules.php">Rules</a>
    </button>


        
    <button class="button" type="submit">
    <a class='al' href="WEB/sign_in_up.php"
    >CONNEXION</a>
    </button>

    
</div>
    </main>
    <footer >
    <audio class="audio" controls>
            <source src="WEB/image/music.mp3" type="video/mp4">
    </audio>
    </footer>
</body>
</html>

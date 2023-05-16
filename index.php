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
    <link rel="stylesheet" href="WEB/CSS/header.css">
</head>

<body>
<video
      id="background-video"
      muted=""
      autoplay="autoplay"
      playsinline
      loop
    >
      <source src="WEB/image/fond.mp4" type="video/mp4" ></video
    >
    <header>
        <div class="boutonhead">
    <button class="avatar" type=submit>
        <a href="WEB/user.php">
        <img class="avatarimg" src="WEB/image/avatar.png"  >
        </a>
    </button>
    <button class="setting" type=submit>
    <a href="WEB/option.php">
    <img class="settingimg" src="WEB/image/para.png" >
    </a>
    </button>
    <button class="bouton" type="submit" onclick="showPopup()">
    <a class="al" href="WEB/rules.php">Rules</a>
    </button>

    <div id="popup" style="display: none;">
        <!-- Contenu de votre pop-up -->
        Texte du pop-up
    </div>

    <script>
        function showPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";
        }
    </script>
</div>
    </header>
    <main>


    <div class="boutons">
    <button class="bouton" type=""submit">
    <a class='al' href="WEB/game.php"
    >PLAY</a>
    </button>

    <button class="bouton" type="submit" >
    <a class="al" href="WEB/rules.php">Rules</a>
    </button>


        
    <button class="bouton" type="submit">
    <a class='al' href="WEB/sign_in_up.php"
    >CONNEXION</a>
    </button>

    <button class="bouton" type="submit">
    <a class='al' href="WEB/sign_in_up.php"
    >Inscription</a>
    </button>
</div>
    </main>
    <footer>
    <audio class="audio" controls>
            <source src="WEB/image/music.mp3" type="video/mp4">
          </audio>
    </footer>
</body>
</html>

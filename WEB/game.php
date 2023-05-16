<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" >
    
    <title>Martin Carpenter</title>
   
    <meta name="description" content="Martin carpenter Games" >
    <!--page description-->
    <meta name="keywords" content="Martin Carpenter,Games,level" >
    <!--Page keywords-->
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Setting up a web page visibility zone for the user-->
    
    <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir" >
    <!--Page authors-->
    <link rel="icon" type="image/x-con" href="WEB/image/logo.ico" >
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/gamehome.css">
</head>
<body> 
    <header>
    <div class="buttonhead">
    <button class="arrow" type=submit>
        <a href="../index.php">
        <img class="arrowimg" src="image/arrow.png"  >
        </a>
    </button>
    </div>
</header>
    <main class="main">
     
        <button class="story" onclick="redirectTo('storymod.php')">Story Mod</button>
        <button class="easy" onclick="redirectTo('easymod.php')">Easy Mod</button>
        <button class="medium" onclick="redirectTo('mediummod.php')">Medium Mod</button>
        <button class="hard" onclick="redirectTo('hardmod.php')">Hard Mod</button>


</main>

    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>




</body>
</html> 
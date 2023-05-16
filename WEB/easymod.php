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
    <link rel="stylesheet" href="CSS/game.css">
    <link rel="stylesheet" href="CSS/pause.css">
</head>
<body> 
    <header>
        <div class="buttonhead">
        <button id="boutonPause" class="pause" type="submit" onclick="togglePopup(); hideButton()">
            <a class="al"><img class="pauseimg" src="image/butonpause.png"></a>
        </button>
        </div>
        <div id="popup" style="display: none;">
            <button class="retry" type="submit">
                <a class="al" href="game.php">Retry</a>
            </button>

            <button class="back" type="submit">
                <a class="al" href="../index.php">Back Home</a>
            </button>

            <button class="resume" type="submit" onclick="togglePopup(); showButton()">
                <a class="al">Resume</a>
            </button>

            <button class="setting" type="submit">
                <a class="al" href="settingenjeux/settingeasymod.php">Setting</a>
            </button>
        </div>

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
            }

            function showButton() {
                var boutonPause = document.getElementById("boutonPause");
                boutonPause.style.display = "block";
            }
        </script>

    </header>






</body>
</html>   
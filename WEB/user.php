<?php
session_start();
if(isset($_SESSION['username'])){
    echo'
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
    
        <title>Martin Carpenter</title>
    
        <meta name="description" content="Martin carpenter information user">
        <!--page description-->
        <meta name="keywords" content="Martin Carpenter,id,mp,name">
        <!--Page keywords-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--Setting up a web page visibility zone for the user-->
    
        <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir">
        <!--Page authors-->
        <link rel="icon" type="image/x-con" href="WEB/image/logo.ico">
        <!--Browser icon-->
        <link rel="stylesheet" href="CSS/user.css">
    </head>
    
    <body>
        <header>
            <div class="buttonhead">
                <button class="back" type=submit>
                    <a href="../index.php">
                        <img class="backimg" src="image/arrow.png">
                    </a>
                </button>
                <a class="al" - href="settingingames/settinguser.php">
                    <img class="settingimg" src="image/boutonsetting.png" />
                </a>
    
            </div>
        </header>
        <main>
            <div class="cont">
                <div class="user">
                    <img class="imgmartin" src="image/martin.png" alt="">
                </div>
            </div>
            <div class="cont2">
                <div class="Compte">
    
                    <div class="name">
                        Name
                    </div>
                    <div class="line">
                        Personal Best:
                        <br>
                        Email :
                        <br>
                        Username :
                    </div>
                    <div class="logout">
                        <a class="textlogout" href=" logout.php">Logout
                        </a>
                    </div>
                </div>
                <div class="classement">
                    <div class="compte">
                        Compte:
                    </div>
                    <div class="list">
                        <div class="line2">
                            <ul>
                                <li>dadou</li>
                                <li>leloup</li>
                            </ul>
                        </div>
                        <div class="line3">
                            <ul>
                                <li>dadou</li>
                                <li>leloup</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    </html>';
}
else{
    header("Location: sign_in_up.php?fail=2");
    return;
}

?>

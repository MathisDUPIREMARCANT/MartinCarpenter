<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
$conn = new mysqli('localhost', 'root', 'root', 'martin');
try{
    require("traitement/DB_connect.php");             
    $reqPrep1="SELECT username,email,password,score FROM users WHERE username='$_SESSION[username]'";
    $req1 =$conn->prepare($reqPrep1);
    $req1->execute();
    $resultat = $req1->fetchAll();
    $sql = "SELECT score, username FROM users ORDER BY score DESC LIMIT 25";
    $result = $conn->query($sql);
}
catch(Exception $e){
    
    die("Erreur : " . $e->getMessage());
}

if(isset($_SESSION['username'])){
foreach($resultat as $row){
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
        <link rel="icon" type="image/x-con" href="WEB/image/logomartin.ico">
        
        <!--Browser icon-->
        <link rel="stylesheet" href="CSS/user.css">
    </head>
    
    <body>
        <header>
            <div class="buttonhead">
                <button class="back" type=submit>
                    <a href="../index.php">
                        <img class="backimg" src="image/button/arrow.png">
                    </a>
                </button>
                <a class="al" - href="settingingames/settinguser.php">
                    <img class="settingimg" src="image/button/boutonsetting.png" />
                </a>
    
            </div>
        </header>
        <main>
            <div class="cont">
                <div class="user">
                    <img class="imgmartin" src="image/button/martin.png" alt="">
                </div>
            </div>
            <div class="cont2">
                <div class="Compte">
    
                    <div class="name">
                        '.$row["username"].'
                    </div>
                    <div class="line">
                        Personal Best: '.$row["score"].'
                        <br>
                        Email : '.$row["email"].'
                    </div>
                    <div class="logout">
                        <a class="textlogout" href=" logout.php">Logout
                        </a>
                    </div>
                </div>
                ';
            };
                echo'
                <div class="classement">
                    <div class="compte">
                        Compte:
                    </div>
                    <div class="list">
                        <div class="line2">

                           ';
                           $stmt = $conn->query($sql);

                        // Récupération des résultats dans un tableau
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Vérification des résultats de la requête
                        if (count($results) > 0) {
                            // Affichage des données dans un tableau HTML
                           
                            echo "<br>Username    Score<br>";
                            
                            // Parcourir les résultats et afficher les données
                            foreach ($results as $row) {
                                echo $row["username"]."  ";
                                echo $row["score"]."  ";
                                echo "<br>";
                            }
                            
                         
                        } else {
                            echo "Aucun résultat trouvé.";
                        }
                           
                           
                                echo "</table>";
                                echo'
                            </ul>
                        </div>
                    </div>
                </div>
            
        </main>
    </body>
    </html>';};



?>
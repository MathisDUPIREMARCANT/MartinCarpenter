<?php
session_start() ;
try{
    require("traitement/DB_connect.php");             
    $reqPrep1="SELECT username, email, score, progression FROM users";
    $req1 =$conn->prepare($reqPrep1);
    $req1->execute();
    $resultat = $req1->fetchAll();
}
catch(Exception $e){
    
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Martin Carpenter</title>

    <meta name="description" content="Martin carpenter Homepages">
    <!--page description-->
    <meta name="keywords" content="Martin Carpenter,Connexion,Rules,Games ">
    <!--Page keywords-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Setting up a web page visibility zone for the user-->

    <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir">
    <!--Page authors-->
    <link rel="icon" type="image/x-con" href="WEB/image/logomartin.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/admin.css">
    <?php
        if(isset($_COOKIE['ColorButton'])==TRUE){
        $style=$_COOKIE['ColorButton']; //on récupère le theme choisi enregistré dans le cookie
        echo"
        <link rel='stylesheet' href='CSS/Changecolorbutton/$style.css' />";
        }
        ?>
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


        </div>
    </header>
    <main>
        <div class="container">
            <table class="sticky">
                <tr>
                    <th>User</th>
                    <th class="col">Email</th>
                    <th>Score</th>
                    <th>Progress</th>
                    <th>Delete</th>
                </tr>
            </table>
            <div class="overflow">
                <table class="user">
                    <?php
                foreach($resultat as $row){
                ?>
                    <tr>
                        <td><?php echo $row['username']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['score']?></td>
                        <td><?php echo $row['progression']?></td>
                        <td><a href='delete.php?user=<?php echo $row['username'] ?>'>Delete</a></td>
                    </tr>
                    <?php
                }
                ?>

                </table>
            </div>
        </div>
    </main>
</body>
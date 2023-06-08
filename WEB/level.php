<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Martin Carpenter</title>

    <meta name="description" content="Martin carpenter level create">
    <!--page description-->
    <meta name="keywords" content="Martin Carpenter,level,create ">
    <!--Page keywords-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Setting up a web page visibility zone for the user-->

    <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir">
    <!--Page authors-->
    <link rel="icon" type="image/x-con" href="image/logomartin.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/level.css">
</head>

<body>

    <header>
        <div class="buttonhead">
            <button class="back" type="submit">
                <a class=" al" - href="../index.php"><img class="backimg" src="image/button/vide.png"></a>
            </button>
        </div>
    </header>
    <main>
        <div class="level">
            <div class="Title">
                Personnal Levels
            </div>
            <div class="Title2">
                Workshop
            </div>
            <div class="levels">
                <?php
                try{
                require("traitement/DB_connect.php");
                $reqPrep1="SELECT user,difficulty,rows,colls,islands,path FROM users_level WHERE user='$_SESSION[username]'";
                $req1 =$conn->prepare($reqPrep1);
                $req1->execute();
                $resultat = $req1->fetchAll();
                
                }
                catch(Exception $e){

                die("Erreur : " . $e->getMessage());
                } 
                foreach($resultat as $row){
                    $level=$row['path'];
                ?>

                    <a class="lev" href="users_levels.php?JSON=<?php echo urlencode($level); ?>&rows=<?php echo $row["rows"] ?>&columns=<?php echo $row["colls"]?>&mod=1&id=1&siuu=1">
                    Made by <?php echo $row["user"] ?><br>
                    Grid: <?php echo $row["rows"]."x".$row["colls"]." with ".$row["islands"]." islands" ?><br>
                    Difficulty: <?php echo " ".$row["difficulty"] ?>

                </a>
                <?php } ?>
            </div>
            <div class="levels">
                <?php
                try{
                require("traitement/DB_connect.php");
                $reqPrep1="SELECT user,difficulty,rows,colls,islands,path FROM users_level ";
                $req1 =$conn->prepare($reqPrep1);
                $req1->execute();
                $resultat = $req1->fetchAll();
                
                }
                catch(Exception $e){

                die("Erreur : " . $e->getMessage());
                } 
                foreach($resultat as $row){
                    $level=$row['path'];
                ?>

                <a class="lev" href="users_levels.php?level=<?php echo urlencode($level); ?>">
                    Made by <?php echo $row["user"] ?><br>
                    Grid: <?php echo $row["rows"]."x".$row["colls"]." with ".$row["islands"]." islands" ?><br>
                    Difficulty:<?php echo " ".$row["difficulty"] ?>

                </a>
                <?php } ?>
            </div>
        </div>
    </main>
</body>
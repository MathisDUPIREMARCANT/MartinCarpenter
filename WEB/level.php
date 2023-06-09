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
<script>
                      <?php

?>
    function postRedirect(url, params) {
        console.log("postRedirect");
    var form = document.createElement("form");
    form.method = "post";
    form.action = url;
        console.log(url);
    // Create input fields for each parameter
    for (var key in params) {
      if (params.hasOwnProperty(key)) {
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = params[key];
        console.log(input.value);
        form.appendChild(input);
      }
    }
    console.log(form);

    // Append the form to the body and submit
    document.body.appendChild(form);
    form.submit();
  }

    function redirection(level, rows,  columns){
        console.log("redirection");
    var params = { mod: "1", JSON: level, columns: rows, rows: rows, id: 1, siuu: 1 };
  var url = "users_levels.php";
   postRedirect(url, params);
  }
                </script>

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
                require("traitement/DB_connect.php");
                $reqPrep1="SELECT number,user,difficulty,rows,colls,islands,path FROM users_level WHERE user='$_SESSION[username]'";
                $req1 =$conn->prepare($reqPrep1);
                $req1->execute();
                $resultat = $req1->fetchAll();
                
                foreach($resultat as $row){
                    $number=$row['number'];
?>
<a class="lev" href="users_levels.php?number=<?php echo $number ;?>"> 
    Made by <?php echo $row["user"] ?><br>
    Grid: <?php echo $row["rows"]."x".$row["colls"]." with ".$row["islands"]." islands" ?><br>
    Difficulty:<?php echo " ".$row["difficulty"] ?>
</a>

<?php } ?>
            
            </div>
            <div class="levels">
                <?php
                try{
                require("traitement/DB_connect.php");
                $reqPrep1="SELECT * FROM users_level ";
                $req1 =$conn->prepare($reqPrep1);
                $req1->execute();
                $resultat = $req1->fetchAll();
                
                }
                catch(Exception $e){

                die("Erreur : " . $e->getMessage());
                } 
                foreach($resultat as $row){
                    $level=$row['path'];
                    $number2 =$row['number'];
                ?>

                <a class="lev" href="users_levels.php?number=<?php echo $number2 ;?>">
                    Made by <?php echo $row["user"] ?><br>
                    Grid: <?php echo $row["rows"]."x".$row["colls"]." with ".$row["islands"]." islands" ?><br>
                    Difficulty:<?php echo " ".$row["difficulty"] ?>

                </a>

                <?php } ?>
            </div>
        </div>
    </main>
</body>
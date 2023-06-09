<?php
session_start();
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
    <link rel="stylesheet" href="CSS/game.css">
    <?php
   if(isset($_COOKIE['ColorButton'])==TRUE){
    $style=$_COOKIE['ColorButton']; //on récupère le theme choisi enregistré dans le cookie
    echo"
    <link rel='stylesheet' href='CSS/Changecolorbutton/$style.css' />";
    }
    if(isset($_COOKIE['Colorgame'])==TRUE){
        $style=$_COOKIE['Colorgame']; //on récupère le theme choisi enregistré dans le cookie
        echo"
        <link rel='stylesheet' href='CSS/Changecolor/$style.css' />";
        }
    ?>
</head>

<body>
<video id="background-video" autoplay="autoplay" playsinline loop>
        <source src="image/background.mp4" type="video/mp4">
    </video>
<main Id="main" class="main">
<div id="game" class="game">
<script>

<?php
include("traitement/DB_connect.php");

$brdg = $_GET["brdg"];
$brdg = explode(",", $brdg);

$pxl = $_GET["pxl"];
$pxl = explode(",", $pxl);
$rows = $_GET['row'];
$columns = $_GET['column'];
$resultat = "[";
for ($i = 0; $i < count($brdg); $i++) {
    $command = 'Placements.exe'. ' '. $columns . ' ' . $rows . ' ' . $brdg[$i] . ' ' . $pxl[$i];
    $output = exec($command);
    $resultat = $resultat.$output;
    if($i != count($brdg)-1){
        $resultat = $resultat.",";
    }
}  
$resultat = $resultat."]";
if($resultat != "[Invalid arguments. Usage: program_name <width> <height> <bridge_count> <board>]"){
$pixelArt = $_GET['JSON'];
$nbiles = $_GET['nbiles'];
$difficulty = ($rows*$columns*$nbiles)/20;
//on stock les valeurs dans la base de données
//on recupere le pseudo de l'utilisateur
$username = $_SESSION['username'];
$sql = "INSERT INTO users_level (path, user, rows, colls, islands, difficulty, soluce) VALUES ('$pixelArt', '$username', '$rows', '$columns', '$nbiles', '$difficulty', '$resultat')";
//on prepare la requete
$stmt = $conn->prepare($sql);
//on execute la requete
$stmt->execute();


?>
//on dit que le niveau a bien été enregistré
alert("Your level has been saved");
//on redirige vers la page d'accueil
window.location.href = "../index.php";
<?php
}else{
    ?>
    //on dit que le niveau n'a pas été enregistré
    alert("Your level is not valid or has a problem in it. please try again");
    //on redirige vers la page d'accueil
    window.location.href = "../index.php";
    <?php
}
?>
</script>
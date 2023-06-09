<?php
session_start();
include("traitement/DB_connect.php");
if ($_POST['mod'] == "easy"){
    $nbiles = 7;
}else if($_POST['mod'] == "medium"){
    $nbiles = 10;
}else if($_POST['mod'] == "hard"){
    $nbiles = 25;
}
else if($_POST['mod'] == "custom"){
    $nbiles = $_POST['nbiles'];
}
$rows = $_POST['rows'];
$columns = $_POST['columns'];
$pixelArt = $_POST['JSON'];
$difficulty = ($rows*$columns*$nbiles)/20;
//on stock les valeurs dans la base de données
//on recupere le pseudo de l'utilisateur
$username = $_SESSION['username'];
//on echo les varivales
if($_POST['mod'] == "custom"){
    $pixelArt = "[".$pixelArt."]";
}
$sql = "INSERT INTO users_level (path, user, rows, colls, islands, difficulty, soluce) VALUES ('$pixelArt', '$username', '$rows', '$columns', '$nbiles', '$difficulty', '$pixelArt')";
//on prepare la requete
$stmt = $conn->prepare($sql);
//on execute la requete
$stmt->execute();
?>
<script>
//on dit que le niveau a bien été enregistré
alert("Your level has been saved");
//on redirige vers la page d'accueil
window.location.href = "../index.php";
</script>
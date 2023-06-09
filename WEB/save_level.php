<?php
session_start();
include("traitement/DB_connect.php");
if ($_GET['mod'] = "easy"){
    $nbiles = 7;
}else if($_GET['mod'] = "medium"){
    $nbiles = 10;
}else if($_GET['mod'] = "hard"){
    $nbiles = 25;
}
$rows = $_GET['row'];
$columns = $_GET['column'];
$pixelArt = $_GET['JSON'];
$difficulty = ($rows*$columns*$nbiles)/20;
//on stock les valeurs dans la base de données
//on recupere le pseudo de l'utilisateur
$username = $_SESSION['username'];
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
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
$conn = new mysqli('localhost', 'root', 'root', 'martin');
try{
    require("../traitement/DB_connect.php");             
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



?>
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
    <link rel="icon" type="image/x-con" href="../image/logomartin.ico">

    <!--Browser icon-->
    <link rel="stylesheet" href="../CSS/user.css">
</head>
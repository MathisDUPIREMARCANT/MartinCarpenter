<?php
require("DB_connect.php");

//Fonction qui permet d'éviter les injections SQL
function valider_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

//Fonction qui permet de valider le format des emails junia
function verificationEmail($email){
	$patteremail1 = "/[a-zA-Z.-]+@[a-z.A-Z]*(junia.com)$/";
	$testemail = preg_match($patteremail1,$email);
	if ($testemail){
		return true;
	} else {
		return false;
	}
}

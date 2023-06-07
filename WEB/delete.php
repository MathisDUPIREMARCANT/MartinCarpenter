<?php
session_start() ;

		try{
            require("traitement/DB_connect.php"); 
			$user=$_GET["user"];
			//Compléter ICI
			$reqPrep1="DELETE FROM users WHERE `username`='$user'";
			$req1 =$conn->prepare($reqPrep1);
            $req1->execute();
            header("Location:admin.php");
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
	

?>
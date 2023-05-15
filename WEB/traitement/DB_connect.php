<?php
    $DBHOST = 'localhost';
    $DBUSER = 'root';
    $DBPASS = 'root';
    $DBNAME = 'martin';



    $dsn = "mysql:dbname=$DBNAME;host=$DBHOST";

    //On se connecte à la base avec le trycatch
    try{
        //On va instancier PDO
        $conn = new PDO($dsn, $DBUSER,$DBPASS);
       // echo"On est connectés à la base de données";

        //On s'assure d'envoyer des données en utf8 : 
        $conn->exec("SET NAMES utf8");

            //On définit un mode de fetch par défault pour ne pas le spécifier à chaque fetch:
        $conn->setAttribute(PDO::FETCH_ASSOC,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        die($e->getMessage());
    }
?>

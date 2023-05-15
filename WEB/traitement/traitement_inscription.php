<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            require_once("fonctions.php");
            //detection pb mot de passe ou email
            if (
                (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                || (!isset($_POST['password']) || empty($_POST['password']))
                )
            {
                echo('Il faut un email et un mot de passe valides pour se connecter.');
                return;
            }
            //on verifie si le mot de passe correspond a la confirmation mot de passe (on verifie que password == pass)
            if($_POST['password'] != $_POST['pass']){
                //on propose a l'utilisateur de s'inscrire a nouveau
                header("Location: ../sign_in_up.php?inscrip=1");
                return;
            }
            //appel de la base de donnée 
            require_once("DB_connect.php");
            //on récupère les données du formulaire d'inscritpion : on hash le mot de passe et on valide les données
            $email = valider_donnees($_POST['email']);
            $password = password_hash(valider_donnees($_POST['password']), PASSWORD_DEFAULT);
            //on vérifie que l'email n'est pas déjà utilisé
            $requete = $conn->prepare('SELECT COUNT(*) AS `nb_email` FROM `users` WHERE `email` = ?');
            $requete->execute(array($email));
            $donnees = $requete->fetch();
            if ($donnees['nb_email'] > 0) {
                header("Location: ../sign_in_up.php?inscrip=2");
                return;
            }
            if($donnees['nb_email'] == 0){
                $username = $_POST['username'];
                $requete = $conn->prepare('INSERT INTO `users`(`email`, `password`, `username`) VALUES(?, ?, ?)');
                $requete->execute(array($email, $password, $username));
                //on met dans la colonne photo_profil le chemin vers l'image par défaut
                //on met le mail dans une session pour pouvoir l'utiliser dans la page confirmation.php
                $_SESSION['email'] = $email;
                header("Location: ../index.php");
            }
        ?>
    </body>
</html>
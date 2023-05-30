<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <?php
        //appel de la base de donnée 
        require_once("DB_connect.php");
        require_once("fonctions.php");

      
        
        //detection pb mot de passe ou email
    if(isset($_POST["Connexion"])){
        if ((!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            || (!isset($_POST['password']) || empty($_POST['password'])) || !verificationEmail($_POST["email"])){
                echo('il faut un email et un mot de passe valides pour se connecter.');
                return;
        } else {
            $email = valider_donnees($_POST["email"]);
            $password = valider_donnees($_POST["password"]);

            //on récupère les données de la page connection et on verifie la cohérence avec la bdd
            $req = "SELECT * FROM `users` WHERE `email` = '$email'";
            $requete = $conn->prepare($req);
            $requete->execute();         
            $donnees = $requete->fetch();
            //on regarde si l'utilisateur est admin : mail admin = admin.admin@student.junia.com et mdp = admin
            if($email == "admin.admin@student.junia.com" && password_verify($password, $donnees['password'])){
                $_SESSION['username'] = "admin";
                $_SESSION['email'] = $email;
                header("Location: ../admin.php");
                return;
            }
            $requete = $conn->prepare('SELECT COUNT(*) AS `nb_email` FROM `users` WHERE `email` = ?');
            $requete->execute(array($email));
            $res = $requete->fetch();
            $nombre_email = $res['nb_email'];
            $conn = NULL;
            if($nombre_email != 1){
               header("Location: ../sign_in_up.php?fail=0");
               return;
                    }
                }
                if (password_verify($password, $donnees['password'])){
                    //on met l'id de l'utilisateur dans une session pour pouvoir l'utiliser dans les autres pages
                    $_SESSION['username'] = $donnees['username'];
                    $_SESSION['email'] = $email;
                    $username = $_SESSION['username']; 
                    //set cookies 
                    if (isset($_POST['remember-me'])) {
                        // L'utilisateur a coché "Se souvenir de moi"
                        setcookie('user_id', $user_id, time() + (86400 * 30), "/"); // 86400 = 1 jour, 30 jours de durée de vie du cookie
                    } else {
                        // L'utilisateur n'a pas coché "Se souvenir de moi"
                        setcookie('user_id', $user_id, time() + (60 * 45), "/"); // Le cookie expirera à la fermeture du navigateur
                    }
                    //on redirige l'utilisateur vers la page d'accueil
                        header('Location:../../index.php');
                        return;
                    
                }else{
                    header("Location: ../sign_in_up.php?fail=2");
                    return;
                } 
            }
        ?>
</body>

</html>
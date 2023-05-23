<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/sign_in_up.css">
</head>

<body>

    <header>
        <div class="buttonhead">
            <button class="back" type="submit" onclick="showPopup()">
                <a class="al" - href="../index.php"><img class="backimg" src="image/vide.png"></a>
            </button>


        </div>
    </header>
    <?php
            session_start();
            if(empty($_SESSION["username"])){
                if(isset($_GET["inscrip"]) && (($_GET["inscrip"] == 0) || ($_GET["inscrip"] == 1) || ($_GET["inscrip"] == 2))){ 
                    $page_inscription = 10;
                } else if(isset($_GET['reset']) && (($_GET["reset"] == 2) || ($_GET["reset"] == 3))){ //ici on test le liens pour savoir quelle formulaire afficher
                    $page_inscription = 15;
                } else if(isset($_GET["fail"]) && ($_GET["fail"] == 4)){
                    $page_inscription = 15;
                } else {
                    $page_inscription = 1;
                }
        ?>
    <div class="container">
        <div class="login-container">
            <input id="item-1" type="radio" name="item" class="sign-in"
                <?php echo $page_inscription == 1 ? 'checked' : ''; ?> style="display:none;">
            <label for="item-1" class="item">Sign In</label>
            <input id="item-2" type="radio" name="item" class="sign-up"
                <?php echo $page_inscription == 10 ? 'checked' : ''; ?> style="display:none;">
            <label for="item-2" class="item">Sign Up</label>
            <input id="item-3" type="radio" name="item" class="forgot-password"
                <?php echo $page_inscription == 15 ? 'checked' : ''; ?>>
            <label for="item-3" class="item item-reset">Reset</label>
            <div class="login-form">
                <form class="sign-in-htm" action="traitement/traitement_connexion.php" method="post">
                    <?php
                                echo'<h2 class="comment">Connect to Martin Carpenter !</h2>';
                                if(isset($_GET["fail"]) && $_GET["fail"] == "0"){
                                    echo'<h2 id="fail" class="comment" >No account for this email !</h2>';
                                }
                                if(isset($_GET["fail"]) && $_GET["fail"] == "2"){
                                    echo'<h2 id="fail" class="comment" >Your logins are wrong !</h2>';
                                }
                        ?>
                    <?php 
                        if(isset($_GET["state"]) && $_GET["state"] == "end"){
                            echo'<h2 class="comment">End of registration</h2>'; ?>
                    <div class="group">
                        <input placeholder="Username" id="user" name="email" type="email" class="input"
                            autocomplete="username" required pattern="^[A-Za-z0-9._%+-]+@(student\.)?junia\.com$">
                    </div>
                    <div class="group">
                        <input placeholder="Password" id="pass" name="password" type="password" class="input"
                            data-type="password" autocomplete="current-password" required>
                    </div>
                    <div class="group">
                        <input type="checkbox" id="remember-me" checked name="remember-me">
                        <label id="me" for="remember-me">Remember me</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In" name="Connexion">
                    </div>
                    <div class="hr"></div>
                    <?php
                        }else if(empty($_GET["state"])){ 
                            if(isset($_GET["mdp"]) && $_GET["mdp"] == "reset"){
                                echo('<h3 class="comment">Your password has been changed.</h3>');
                            }
                            ?>
                    <div class="group">
                        <input placeholder="Email" id="user" name="email" type="email" class="input"
                            autocomplete="username" required pattern="[a-zA-Z.-]+@([a-z.A-Z]*)(junia.com)$">
                    </div>
                    <div class="group">
                        <input placeholder="Password" id="pass" name="password" type="password" class="input"
                            data-type="password" autocomplete="current-password" required>
                    </div>
                    <div class="group">
                        <input type="checkbox" id="remember-me" checked name="remember-me">
                        <label id="me" for="remember-me"> Remember me</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In" name="Connexion">
                    </div>
                    <div class="hr"></div>
                    <?php } ?>
                </form>
                <form class="sign-up-htm" action="traitement/traitement_inscription.php" method="post">
                    <h2 class="comment">Subscribe to Martin Carpenter !</h2>
                    <?php 
                            if(isset($_GET["inscrip"]) && ($_GET["inscrip"] == 1)){ ?>
                    <h3 class="comment">The passwords are different</h3> <?php
                            } else if(isset($_GET["inscrip"]) && ($_GET["inscrip"] == 2)){
                                ?>
                    <h3 class="comment">The email address already exists </h3> <?php
                            }
                        ?>
                    <div class="group">
                        <input placeholder="Email address" id="email" name="email" type="email" class="input"
                            pattern="^[A-Za-z0-9._%+-]+@(student\.)?junia\.com$" autocomplete="email"
                            autofocus="autofocus" required>
                    </div>
                    <div class="group">
                        <input placeholder="Username" id="username" name="username" type="text" class="input" required>
                    </div>
                    <div class="group">
                        <input placeholder="Password" id="pass1" name="password" type="password" class="input"
                            data-type="password" autocomplete="new-password" required>
                    </div>
                    <div class="group">
                        <input placeholder="Repeat password" id="pass2" name="pass" type="password" class="input"
                            data-type="password" autocomplete="new-password" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="footer">
                        <label for="item-1">Already have an account ?</label>
                    </div>
                </form>
            </div>
            </form> <?php
                            
                        
                    ?>
        </div>
    </div>
    <?php } else { 
            header("Location: ../index.php");
        }
        ?>
</body>

</html>
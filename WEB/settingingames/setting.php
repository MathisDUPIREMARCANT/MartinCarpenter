<?php include("debutsetting.php"); ?>
<?php 
if(isset($_POST['theme'])){
setcookie("Colorgame",$_POST['Choixtheme'],time()+(365*24*3600),'/', '',false,true);
setcookie("ColorButton",$_POST['ChoiceButton'],time()+(365*24*3600),'/', '',false,true);
header('location:setting.php');	
}
?>
<header>
    <div class="buttonhead">
        <button class="back" type=submit>
            <a href="../../index.php">
                <img class="backimg" src="../image/arrow.png">
            </a>
        </button>

        <button class="user" type=submit>
            <a href="../user.php">
                <img class="userimg" src="../image/martin.png">
            </a>
        </button>
    </div>
</header>
<main class="main">
    <div class="up">
        <div class="footitem" id="footsec">
            <!--Début du premier item les réseaux sociaux-->
            <label for="ch" class="iconsocial">
                <h2 class="H2">Suivez-nous :</h2>
            </label>
            <div class="container">
                <!--Container de l'animation -->
                <a href="#"></a>
                <!--Ligne pour effet footer-->
                <a href="https://www.facebook.com/NASA" class="btn"><i class="fab fa-facebook-f"></i></a>
                <!--Affiche l'image du réseaux facebook-->
                <a href="https://twitter.com/nasa?s=11&t=03SfB6n7oJmEwPq1Q9AWhQ" class="btn"><i
                        class="fab fa-twitter"></i></a>
                <!--Affiche l'image du réseaux Twitter-->
                <a href="https://www.linkedin.com/company/nasa?original_referer=https%3A%2F%2Fwww.google.com%2F"
                    class="btn"><i class="fa-brands fa-linkedin"></i></a>
                <!--Affiche l'image du réseaux linkedin-->
                <a href="https://instagram.com/nasa?igshid=YmMyMTA2M2Y=" class="btn"><i
                        class="fab fa-instagram"></i></a>
                <!--Affiche l'image du réseaux instagram-->
                <a href="https://www.youtube.com/@NASA" class="btn"><i class="fab fa-youtube"></i></a>
                <!--Affiche l'image du réseaux youtube-->

            </div>
        </div>
        <div class=" Choix">

            <form method="post" class="formLetter" id="formLetter" action="setting.php">
                <?php include("finsetting.php"); ?>
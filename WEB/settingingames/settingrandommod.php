<?php include("debutsetting.php"); ?>
<?php 
if(isset($_POST['theme'])||isset($_POST['mode'])){
setcookie("Colorgame",$_POST['Choixtheme'],time()+(365*24*3600),'/', '',false,true);
setcookie("ColorButton",$_POST['ChoiceButton'],time()+(365*24*3600),'/', '',false,true);
header("location: ../randommod.php?mod=".$_GET['level']);	
}
?>
<header>
    <div class="buttonhead">
        <button class=" back" type=submit>
            <a href="../randommod.php?mod=<?php echo $_GET['mod'].'&id='.$_GET['id'];?>">
                <img class="backimg" src="../image/button/arrow.png">
            </a>
        </button>
        <a class="user" href="../users/userrandom.php?mod=<?php echo $_GET['mod'];?>">
            <img class="userimg" src="../image/button/martin.png">
        </a>
        </button>
    </div>
</header>
<main class="main">
    <div class="up">
        <div class="footitem" id="footsec">
            <!--Début du premier item les réseaux sociaux-->
            <label for="ch" class="iconsocial">
                <h2 class="H2">Follow Us :</h2>
            </label>
            <div class="container">
                <!--Container de l'animation -->
                <a href="#"></a>
                <!--Ligne pour effet footer-->
                <a target="blank" href="https://www.facebook.com/profile.php?id=100092500047448" class="btn"><i
                        class="fab fa-facebook-f"></i></a>
                <!--Affiche l'image du réseaux facebook-->
                <a target="blank" href="https://twitter.com/MartinKarp" class="btn"><i class="fab fa-twitter"></i></a>
                <!--Affiche l'image du réseaux Twitter-->
                <a target="blank" href="https://discord.gg/wyAk6J2T" class="btn"><i
                        class="fa-brands fa-discord"></i></a>
                <!--Affiche l'image du réseaux linkedin-->
                <a target="blank" href="https://www.instagram.com/martin_big_carpenter/" class="btn"><i
                        class="fab fa-instagram"></i></a>
                <!--Affiche l'image du réseaux instagram-->
                <a target="blank" href="https://youtube.com/@MartinBigCarpenter" class="btn"><i
                        class="fab fa-youtube"></i></a>
                <!--Affiche l'image du réseaux youtube-->

            </div>
        </div>

        <div class=" Choix">
            <form method="post" class="form" id="formLetter"
                action="settingrandommod.php?mod=<?php echo $_GET['level']?>">
                <?php include("finsetting.php"); ?>
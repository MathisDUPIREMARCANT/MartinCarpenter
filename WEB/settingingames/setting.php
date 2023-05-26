<?php include("debutsetting.php"); ?>
<?php 
if(isset($_POST['theme'])){
setcookie("Colorgame",$_POST['Choixtheme'],time()+(365*24*3600),'/', '',false,true);
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
    <div class=" Choix">

        <form method="post" class="formLetter" id="formLetter" action="setting.php">
            <?php include("finsetting.php"); ?>
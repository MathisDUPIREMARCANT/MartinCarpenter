<?php include("debutsetting.php"); ?>
<header>
    <div class="buttonhead">
        <button class=" back" type=submit>
            <a href="../user.php">
                <img class="backimg" src="../image/arrow.png">
            </a>
        </button>
        <a class="user" href="../user.php">
            <img class="userimg" src="../image/martin.png">
        </a>
    </div>
</header>
<main class="main">
    <div class=" Choix">

        <form method="post" class="formLetter" id="formLetter" action="settinguser.php">
            <?php include("finsetting.php"); ?>
<?php include("debutsetting.php"); ?>
<header>
    <div class="buttonhead">
        <button class=" back" type=submit>
            <a href="../storymod.php">
                <img class="backimg" src="../image/arrow.png">
            </a>
        </button>
        <button class="user">
            <a href="../user.php">
                <img class="userimg" src="../image/martin.png">
            </a>
        </button>
    </div>
</header>
<main class="main">
    <div class=" Choix">

        <form method="post" class="formLetter" id="formLetter" action="settinglevelchoice.php">
            <?php include("finsetting.php"); ?>
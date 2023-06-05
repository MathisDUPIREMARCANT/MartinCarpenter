<?php include("debutuser.php"); ?>

<body>
    <header>
        <div class="buttonhead">
            <button class="back" type=submit>
                <a href="../settingingames/settingrandommod.php?mod=<?php echo $_GET['mod'];?>">
                    <img class="backimg" src="../image/button/arrow.png">
                </a>
            </button>
            <a class="al" - href="../settingingames/settingrandommod.php?mod=<?php echo $_GET['mod'];?>">
                <img class="settingimg" src="../image/button/boutonsetting.png" />
            </a>

        </div>
    </header>
    <?php include("finuser.php"); ?>
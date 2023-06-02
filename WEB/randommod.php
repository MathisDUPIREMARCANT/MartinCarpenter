<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Martin Carpenter</title>

    <meta name="description" content="Martin carpenter Games">
    <!--page description-->
    <meta name="keywords" content="Martin Carpenter,Games,level">
    <!--Page keywords-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Setting up a web page visibility zone for the user-->

    <meta name="autors" content="Claus,Dupire-Marcant,Lemoine,Saint-Maxent,Tassin,Vandevoir">
    <!--Page authors-->
    <link rel="icon" type="image/x-con" href="image/logomartin.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/game.css">
    <?php
   if(isset($_COOKIE['ColorButton'])==TRUE){
    $style=$_COOKIE['ColorButton']; //on récupère le theme choisi enregistré dans le cookie
    echo"
    <link rel='stylesheet' href='CSS/Changecolorbutton/$style.css' />";
    }
    if(isset($_COOKIE['Colorgame'])==TRUE){
        $style=$_COOKIE['Colorgame']; //on récupère le theme choisi enregistré dans le cookie
        echo"
        <link rel='stylesheet' href='CSS/Changecolor/$style.css' />";
        }
    ?>
</head>

<body>

    <script>
    function togglePopup() {
        var popup = document.getElementById("popup");
        if (popup.style.display === "none") {
            popup.style.display = "block";
        } else {
            popup.style.display = "none";
        }
    }

    function hideButton() {
        var boutonPause = document.getElementById("boutonPause");
        boutonPause.style.display = "none";
        var main = document.getElementById("main");
        main.style.display = "none";
        var savepos = document.getElementById("savepos");
        savepos.style.display = "none";
    }

    function showButton() {
        var boutonPause = document.getElementById("boutonPause");
        boutonPause.style.display = "block";
        var main = document.getElementById("main");
        main.style.display = "flex";
        var savepos = document.getElementById("savepos");
        savepos.style.display = "block";
    }
    </script>
    <video id="background-video" autoplay="autoplay" playsinline loop>
        <source src="image/background.mp4" type="video/mp4">
    </video>

    <header>
        <div class="buttonhead">
            <button id="boutonPause" class="pause" type="submit" onclick="togglePopup(); hideButton()">
                <a class="al"><img class="pauseimg" src="image/button/buttonpause.png"></a>
            </button>
            <a id="savepos" class="savepos">
                <img class="save" src="image/button/savestar.png" />
            </a>
        </div>
        <div id="popup" style="display: none;">
            <button id="Button" class="Button" type="submit">
                <a id="al" class="al" href="game.php">Retry &emsp; &#160; &#160;
                    <img class="img" src="image/button/retry.png" />
                </a>
            </button>

            <button id="Button" class="Button" type="submit">
                <a id="al" class="al" href="../index.php">Back Home
                    <img class="img" src="image/button/maison.png" />
                </a>
            </button>

            <button id="Button" class="Button" type="submit" onclick="togglePopup(); showButton()">
                <a id="al" class="al">Resume  &emsp;                
                    <img class="img" src="image/button/arrow.png" />
                </a>
            </button>

            <button id="Button" class="Button" type="submit">
                <a id="al" class="al" href="settingingames/settingrandommod.php">Settings   &emsp;              
                    <img class="img" src="image/button/boutonsetting.png" />
                </a>
            </button>
        </div>
    </header>
    <main Id="main" class="main">
    <?php         
                //on récupere les valeurs en url pour les envoyer au .exe (easy, medium, hard, custom)
                if(isset($_GET['mod'])){
                    $mod = $_GET['mod'];
                }
                if(isset($_POST['mod'])){
                    $mod = $_POST['mod'];
                }
                ?>
        <!-- formulaire pour recuperer le nombre d'iles, le nombre de colonnes et le nombre de lignes -->
        <form action="randommod.php?mod=<?php $mod?>" method="post">
        <?php   
        if($mod == 'custom'){?>
            <input type="hidden" name="mod" value="<?php echo $mod; ?>">
            <label for="nb_iles">Number of islands</label>
            <input type="text" name="nb_iles" id="nb_iles">
            <label for="nb_colonnes">Number of columns</label>
            <input type="text" name="nb_colonnes" id="nb_colonnes">
            <label for="nb_lignes">Number of lines</label>
            <input type="text" name="nb_lignes" id="nb_lignes">
            <input Id="button" type="submit" value="Validate">
            <br><br> <br>
            <?php }?>
        </form>
        <div class="grid">
            <div class="martinplace">
                <img class="martin" src="image/martin1.png">
            </div>
            <div id="game" class="game">
            <?php   
//on exec le .exe avec les parametres du formulaire 11 13 30
if($mod == 'easy'){
    $nb_iles = 6;
    $nb_colonnes = 6;
    $nb_lignes = 7;
    $command = 'MartinG.exe'. ' '. $nb_iles . ' ' . $nb_colonnes . ' ' . $nb_lignes;
    $output = exec($command);
    
        $texte_php = $output;
        $texte_js = json_encode($texte_php);
        
}
if($mod == 'medium'){
    $nb_iles = 10;
    $nb_colonnes = 10;
    $nb_lignes = 10;
    $command = 'MartinG_medium.exe'. ' '. $nb_iles . ' ' . $nb_colonnes . ' ' . $nb_lignes;
    $output = exec($command);
    $texte_php = $output;
    $texte_js = json_encode($texte_php);
}
if($mod == 'hard'){
    $nb_iles = 30;
    $nb_colonnes = 11;
    $nb_lignes = 13;
    $command = 'MartinG_hard.exe'. ' '. $nb_iles . ' ' . $nb_colonnes . ' ' . $nb_lignes;
    $output = exec($command);
    $texte_php = $output;
    $texte_js = json_encode($texte_php);
}
if($mod == 'custom'){ 
    if(isset($_POST['nb_iles']) && isset($_POST['nb_colonnes']) && isset($_POST['nb_lignes'])){

        //on recupere les valeurs du formulaire
        $nb_iles = $_POST['nb_iles'];
        $nb_colonnes = $_POST['nb_colonnes'];
        $nb_lignes = $_POST['nb_lignes'];
        
        $command = 'MartinG.exe'. ' '. $nb_iles . ' ' . $nb_colonnes . ' ' . $nb_lignes;
        $output = exec($command);

        
                    
        $texte_php = $output;
        $texte_js = json_encode($texte_php);
    }
}
    ?>
                <!-- on affiche le texte js avec du JS -->
                <div id="bangerang"></div>
                <script type="text/javascript">
                var texte_js = <?php echo $texte_js; ?>;
                var huge = JSON.parse(texte_js);
                <?php ?>
                // huge = {       "Islands" : [           {"links" : 1,                   "Placement" : [5, 5]            },              {"links" : 5,                   "Placement" : [5, 7]            },              {"links" : 6,                   "Placement" : [5, 9]            },              {"links" : 3,                   "Placement" : [1, 9]            },              {"links" : 3,                   "Placement" : [1, 2]            },              {"links" : 5,                   "Placement" : [3, 2]            },              {"links" : 4,                   "Placement" : [5, 2]            },              {"links" : 2,                   "Placement" : [5, 4]            },              {"links" : 2,                   "Placement" : [8, 4]            },              {"links" : 1,                   "Placement" : [8, 6]            }    ],    "Grid": [
                //{                       "size" : [10, 10]               }     ],    "Bridges" : [               {               "width" : 0,            "length" : 1,           "direction" : 0,                 "Placement" : [[5, 6]]         },             {                "width" : 1,            "length" : 1,           "direction" : 0,                 "Placement" : [[5, 8]] },              {               "width" : 1,            "length" : 3,           "direction" : 1,                 "Placement" : [[4, 9],[3, 9],[2, 9]]   },              {               "width" : 0,            "length" : 6,           "direction" : 0,                 "Placement" : [[1, 8],[1, 7],[1, 6],[1, 5],[1, 4],[1, 3]]      },              {              "width" : 1,             "length" : 1,           "direction" : 1,                 "Placement" : [[2, 2]]         },
                //{               "width" : 0,            "length" : 1,           "direction" : 1,                 "Placement" : [[4, 2]] },              {               "width" : 0,            "length" : 1,           "direction" : 0,                 "Placement" : [[5, 3]]         },              {               "width" : 0,            "length" : 2,           "direction" : 1,         "Placement" : [[6, 4],[7, 4]]  },              {               "width" : 0,            "length" : 1,          "direction" : 0,          "Placement" : [[8, 5]]         }    ],    "PlacedBridges":{}}
                var rows = huge.Grid[0].size[0];
                var columns = huge.Grid[0].size[1];

                var gameDiv = document.getElementById('game');
                var gameDivWidth = gameDiv.clientWidth;
                var gameDivHeight = gameDiv.clientHeight;

                function generate_table_no_solution(rows, columns) {
                    // Obtenir la référence du body
                    var body = document.getElementsByTagName("body")[0];
                    // Créer les éléments <table> et <tbody>
                    var tbl = document.createElement("table");
                    var tblBody = document.createElement("tbody");

                    <?php if(isset($_COOKIE['Colorgame'])){
                if($_COOKIE['Colorgame']=="red"){ 
                echo"tbl.style.border = '0.4vw solid #f23e31';
                tbl.style.backgroundColor = '#bf2424e7';";
                }
                elseif($_COOKIE['Colorgame']=="grey"){ 
                echo"tbl.style.border = '0.4vw solid #cecaca';
                tbl.style.backgroundColor = '#aa9a9a38';";
                }
                 elseif($_COOKIE['Colorgame']=="yellow"){ 
                echo"tbl.style.border = '0.4vw solid #eff84aec';
                tbl.style.backgroundColor = '#bfb224e7';";
                }
                 elseif($_COOKIE['Colorgame']=="orange"){ 
                echo"tbl.style.border = '0.4vw solid #f2ab31';
                tbl.style.backgroundColor = '#bf8424e7';";
                }
                elseif($_COOKIE['Colorgame']=="pink"){ 
                    echo"tbl.style.border = '0.4vw solid #f231c8';
                    tbl.style.backgroundColor = '#bf24b2e7';";
                }
                elseif($_COOKIE['Colorgame']=="green"){ 
                echo"tbl.style.border = '0.4vw solid #34f231';
                tbl.style.backgroundColor = '#24bf2ce7';";
                }
                 elseif($_COOKIE['Colorgame']=="purple"){ 
                echo"tbl.style.border = '0.4vw solid #9b31f2';
                tbl.style.backgroundColor = '#8424bfe7';";
                }
                 elseif($_COOKIE['Colorgame']=="blue"  ){ 
                echo"tbl.style.border = '0.4vw solid #19608F';
                tbl.style.backgroundColor = '#247cbfe7';";
                }}
                else{
                    echo"tbl.style.border = '0.4vw solid #19608F';
                    tbl.style.backgroundColor = '#247cbfe7';";
                }?>

                    tbl.style.borderRadius = "20px";
                    tbl.style.width = "70vw";
                    tbl.style.height = "70vh";
                    tbl.style.overflow = "auto"; // allows the table to scroll if necessary



                    // Set table dimensions to match game div
                    tbl.style.width = gameDivWidth + 'px';
                    tbl.style.height = gameDivHeight + 'px';

                    // Créer les cellules
                    for (var i = 0; i < rows; i++) {
                        var row = document.createElement("tr");
                        for (var j = 0; j < columns; j++) {
                            var cell = document.createElement('td');
                            cell.setAttribute('id', `cell-${i}-${j}`);
                            cell.style.width = (gameDivWidth / columns) + 'px';
                            cell.style.height = (gameDivHeight / rows) + 'px';

                            // Vérifier si l'île se trouve à la position actuelle
                            var foundIsland = false;
                            for (var k = 0; k < huge.Islands.length; k++) {
                                if (huge.Islands[k].Placement[0] === i && huge.Islands[k].Placement[1] === j) {
                                    foundIsland = true;
                                    break;
                                }
                            }


                            if (foundIsland) {
                                var islandImage = document.createElement("img");
                                islandImage.setAttribute("id", "island-" + i + "-" + j);
                                if (huge.Islands[k].links == 1) {
                                    islandImage.src = "../WEB/image/iles/ile1.png";
                                    cell.appendChild(islandImage);
                                } else if (huge.Islands[k].links == 2) {
                                    islandImage.src = "../WEB/image/iles/ile2.png";
                                    cell.appendChild(islandImage);
                                } else if (huge.Islands[k].links == 3) {
                                    islandImage.src = "../WEB/image/iles/ile3.png";
                                    cell.appendChild(islandImage);
                                } else if (huge.Islands[k].links == 4) {
                                    islandImage.src = "../WEB/image/iles/ile4.png";
                                    cell.appendChild(islandImage);
                                } else if (huge.Islands[k].links == 5) {
                                    islandImage.src = "../WEB/image/iles/ile5.png";
                                    cell.appendChild(islandImage);
                                } else if (huge.Islands[k].links == 6) {
                                    islandImage.src = "../WEB/image/iles/ile6.png";
                                    cell.appendChild(islandImage);
                                }
                                cell.appendChild(islandImage);
                                islandImage.setAttribute("data-row", i.toString());
                                islandImage.setAttribute("data-col", j.toString());
                                islandImage.addEventListener("click", handleIslandClick);
                                cell.appendChild(islandImage);
                            }
                            row.appendChild(cell);
                            cell.setAttribute("class", 'case');
                            cell.setAttribute("id", "cell-" + i + "-" + j);
                        }


                        tblBody.appendChild(row);
                    }


                    // Ajouter <tbody> à <table>
                    tbl.appendChild(tblBody);
                    // Ajouter <table> au body
                    document.getElementById("bangerang").appendChild(tbl);
                }
                generate_table_no_solution(rows, columns);




                var currentBridge = {
                    start: null,
                    end: null
                };


                function handleIslandClick(event) {
                    var islandId = event.target.getAttribute("id");
                    var islandImage = document.getElementById(islandId);
                    var row = parseInt(islandImage.getAttribute("data-row"));
                    var col = parseInt(islandImage.getAttribute("data-col"));

                    var island;
                    for (var i = 0; i < huge.Islands.length; i++) {
                        if (huge.Islands[i].Placement[0] === row && huge.Islands[i].Placement[1] === col) {
                            island = huge.Islands[i];
                            break;
                        }
                    }

                    console.log('Clic sur une île, coordonnées : ', [row, col], ', île : ',
                        island); // Ajout d'un message de débogage
                    if (currentBridge.start === null) {
                        currentBridge.start = island;
                        console.log('Pont commencé, île de départ : ', island); // Ajout d'un message de débogage
                    } else if (currentBridge.end === null && canPlaceBridge(currentBridge.start, island)) {
                        currentBridge.end = island;
                        console.log('Pont fini, île d\'arrivée : ', island); // Ajout d'un message de débogage
                        placeBridge(currentBridge.start, currentBridge.end);
                        currentBridge.start = null;
                        currentBridge.end = null;
                    }
                }

                function getIslandAt(coordinates) {
                    for (var i = 0; i < huge.Islands.length; i++) {
                        if (huge.Islands[i].Placement[0] === coordinates[0] && huge.Islands[i].Placement[1] ===
                            coordinates[
                                1]) {
                            return huge.Islands[i];
                        }
                    }
                    return null;
                }

                function canPlaceBridge(island1, island2) {
                    // Vérifier si les îles sont sur la même ligne ou la même colonne
                    if (island1.Placement[0] !== island2.Placement[0] && island1.Placement[1] !== island2.Placement[
                            1]) {
                        return false;
                    }
                    var bridgeOrientation = island1.Placement[0] === island2.Placement[0] ? 1 :
                        2; // 1 pour horizontal, 2 pour vertical
                    // Vérifier s'il y a une autre île sur le chemin
                    var minRow = Math.min(island1.Placement[0], island2.Placement[0]);
                    var maxRow = Math.max(island1.Placement[0], island2.Placement[0]);
                    var minCol = Math.min(island1.Placement[1], island2.Placement[1]);
                    var maxCol = Math.max(island1.Placement[1], island2.Placement[1]);
                    for (var i = 0; i < huge.Islands.length; i++) {
                        var island = huge.Islands[i];
                        if (island !== island1 && island !== island2) {
                            if (island.Placement[0] >= minRow && island.Placement[0] <= maxRow && island.Placement[1] >=
                                minCol && island.Placement[1] <= maxCol) {
                                return false;
                            }
                        }
                    }


                    // Vérifier si un des ponts placés serait en conflit avec le nouveau pont
                    for (let r = minRow; r <= maxRow; r++) {
                        for (let c = minCol; c <= maxCol; c++) {
                            if ((r === island1.Placement[0] && r === island2.Placement[0]) || // Horizontal bridge
                                (c === island1.Placement[1] && c === island2.Placement[1])) { // Vertical bridge
                                var cellId = "cell-" + r + "-" + c;
                                if (huge.PlacedBridges[cellId] && huge.PlacedBridges[cellId].orientation !==
                                    bridgeOrientation) {
                                    return false;
                                }
                                if (huge.PlacedBridges[cellId] && huge.PlacedBridges[cellId].count >= 2) {
                                    return false;
                                }
                            }
                        }
                    }
                    console.log('Vérification de la possibilité de placer le pont, île1 : ', island1, ', île2 : ',
                        island2); // Ajout d'un message de débogage
                    // Si toutes les vérifications sont passées, le pont peut être placé
                    return true;
                }




                huge.userPlacedBridges = [];

                let userPlaced = {
                    "Bridges": [],
                };

                tmp2 = {
                    "1": [],
                    "2": []
                };
                console.log('huge.Bridges', huge.Bridges);
                for (var j = 0; j < Object.keys(huge.Bridges).length; j++) {

                    //on verifie la valeur du count
                    if (huge.Bridges[Object.keys(huge.Bridges)[j]].width == 0) {
                        for (var k = 0; k < huge.Bridges[Object.keys(huge.Bridges)[j]].Placement.length; k++) {

                            //on stocke la position des ponts de placedBridges dans userPlacedBridges sous forme d'un tableau de tableau : [[row, col], [row, col], ...]
                            tmp2[huge.Bridges[Object.keys(huge.Bridges)[j]].width + 1].push(huge.Bridges[Object.keys(
                                huge
                                .Bridges)[j]].Placement[k]);
                        }
                    } else {
                        for (var k = 0; k < huge.Bridges[Object.keys(huge.Bridges)[j]].Placement.length; k++) {
                            tmp2[huge.Bridges[Object.keys(huge.Bridges)[j]].width + 1].push(huge.Bridges[Object.keys(
                                huge
                                .Bridges)[j]].Placement[k]);
                        }

                    }
                }

                function check_win() {
                    for (var i = 0; i < huge.Islands.length; i++) {
                        var island = huge.Islands[i];
                        var bridges = getBridgesAroundIsland(island);

                        if (bridges.length > island.links) {
                            var islandCell = document.getElementById("cell-" + island.Placement[0] + "-" + island
                                .Placement[
                                    1]);
                            islandCell.classList.add("error"); // Ajouter la classe CSS "error" à la cellule de l'île
                        } else {
                            var islandCell = document.getElementById("cell-" + island.Placement[0] + "-" + island
                                .Placement[
                                    1]);
                            islandCell.classList.remove(
                                "error"); // Supprimer la classe CSS "error" de la cellule de l'île
                        }
                    }
                    let tmp = {
                        "1": [],
                        "2": []
                    };
                    for (var j = 0; j < Object.keys(huge.PlacedBridges).length; j++) {
                        //on verifie la valeur du count
                        if (huge.PlacedBridges[Object.keys(huge.PlacedBridges)[j]].count == 1) {
                            //on stocke la position des ponts de placedBridges dans userPlacedBridges sous forme d'un tableau de tableau : [[row, col], [row, col], ...]
                            tmp[huge.PlacedBridges[Object.keys(huge.PlacedBridges)[j]].count].push(huge.PlacedBridges[
                                Object
                                .keys(huge.PlacedBridges)[j]].Placement[0]);
                        } else if (huge.PlacedBridges[Object.keys(huge.PlacedBridges)[j]].count == 2) {
                            console.log("pipi")
                            tmp[huge.PlacedBridges[Object.keys(huge.PlacedBridges)[j]].count].push(huge.PlacedBridges[
                                Object
                                .keys(huge.PlacedBridges)[j]].Placement[0]);
                        }

                    }
                    //trie les deux dictionnaires
                    tmp["1"].sort();
                    tmp["2"].sort();
                    tmp2["1"].sort();
                    tmp2["2"].sort();

                    if (JSON.stringify(tmp) === JSON.stringify(tmp2)) {
                        document.location.href = "Win.php";
                    }

                }

                function removeBridge(island1, island2) {
                    // Trouvez les indices des îles dans le tableau huge.Islands
                    var island1Index = huge.Islands.indexOf(island1);
                    var island2Index = huge.Islands.indexOf(island2);

                    // Parcourir toutes les cellules dans huge.PlacedBridges
                    for (var cellId in huge.PlacedBridges) {
                        // Si la cellule contient un pont entre ces deux îles, décrémentez le count ou supprimez le pont
                        var bridgeData = huge.PlacedBridges[cellId];
                        if (bridgeData.islandPair.includes(island1Index) && bridgeData.islandPair.includes(
                                island2Index)) {

                            // Si c'est un double pont, décrémentez le count et supprimez seulement une image de pont
                            if (bridgeData.count > 1) {
                                bridgeData.count--;
                                bridgeData.count--;

                                // Supprimer un pont du DOM
                                var cellElement = document.getElementById(cellId);
                                var bridgeImage = cellElement.getElementsByTagName('img')[0];
                                cellElement.removeChild(bridgeImage);
                            }
                            // Si c'est un pont simple, supprimez-le comme avant
                            else {
                                // Supprimer le pont du DOM
                                var cellElement = document.getElementById(cellId);
                                while (cellElement.firstChild) {
                                    cellElement.removeChild(cellElement.firstChild);
                                }

                                // Supprimer le pont des données
                                delete huge.PlacedBridges[cellId];

                            }
                        }

                    }

                    // Mise à jour de huge.userPlacedBridges
                    huge.userPlacedBridges = [];
                    for (var key in huge.PlacedBridges) {
                        huge.userPlacedBridges.push(huge.PlacedBridges[key].Placement);
                    }
                    console.log('BIG CACZ', huge.PlacedBridges); // For debugging
                    check_win();
                }

                function getBridgesAroundIsland(row, col) {
                    var bridges = [];

                    for (var i = 0; i < huge.PlacedBridges.length; i++) {
                        var bridge = huge.PlacedBridges[i];
                        var bridgeStartRow = bridge.Placement[0][0];
                        var bridgeStartCol = bridge.Placement[0][1];
                        var bridgeEndRow = bridge.Placement[1][0];
                        var bridgeEndCol = bridge.Placement[1][1];

                        if (
                            (bridgeStartRow === row && bridgeStartCol === col) ||
                            (bridgeEndRow === row && bridgeEndCol === col)
                        ) {
                            bridges.push(bridge);
                        }
                    }

                    return bridges;
                }

                function placeBridge(island1, island2) {
                    var bridgeOrientation = island1.Placement[0] === island2.Placement[0] ? 1 :
                        2; // 1 pour horizontal, 2 pour vertical
                    console.log('Placement du pont, île1 : ', island1, ', île2 : ', island2);


                    // Longueur du pont
                    let bridgeLength = Math.abs((bridgeOrientation === 1 ? island1.Placement[1] : island1.Placement[
                            0]) -
                        (bridgeOrientation === 1 ? island2.Placement[1] : island2.Placement[0])) + 1;


                    // Placer le pont
                    for (let i = 0; i < bridgeLength; i++) {
                        var row = bridgeOrientation === 1 ? island1.Placement[0] : Math.min(island1.Placement[0],
                            island2
                            .Placement[0]) + i;
                        var col = bridgeOrientation === 2 ? island1.Placement[1] : Math.min(island1.Placement[1],
                            island2
                            .Placement[1]) + i;


                        // Vérifier si la cellule n'est pas une île
                        var isIsland = false;
                        for (var j = 0; j < huge.Islands.length; j++) {
                            if (huge.Islands[j].Placement[0] === row && huge.Islands[j].Placement[1] === col) {
                                isIsland = true;
                                break;
                            }
                        }


                        // Si la cellule n'est pas une île, alors ajouter le pont
                        if (!isIsland) {
                            var cellId = "cell-" + row + "-" + col;
                            var cellElement = document.getElementById(cellId);
                            console.log('cellId: ', cellId); // For debugging
                            console.log('Cell element: ', cellElement); // For debugging
                            var bridgeData = huge.PlacedBridges[cellId] || {
                                count: 0,
                                orientation: bridgeOrientation,
                                Placement: []
                            };
                            bridgeData.count += 1;
                            bridgeData.Placement.push([row, col]);
                            huge.PlacedBridges[cellId] = bridgeData;
                            console.log('absolute', huge.userPlacedBridges)
                            // Trouvez les indices des îles dans le tableau huge.Islands
                            var island1Index = huge.Islands.indexOf(island1);
                            var island2Index = huge.Islands.indexOf(island2);

                            // Stockez ces indices au lieu des objets îles eux-mêmes
                            bridgeData.islandPair = [island1Index, island2Index];
                            //on rempli un tableau de tableau qui correspond au bridgedtaa.placement pour pouvoir le comparer avec huge.bridges

                            //on stocke les valeur de huge.bridges dans un dictionnaire en fonction de leur witdh
                            var bridgeImage = document.createElement("img");


                            if (bridgeOrientation === 1) { // Si c'est un pont horizontal
                                bridgeImage.style.width = "100%"; // Largeur du pont en pixels
                                bridgeImage.style.height = "35%"; // Hauteur du pont en pixels
                                //si c'est un double pont
                                if (bridgeData.count > 1) {
                                    //on supprime l'image du pont
                                    //on verifie si il y a une image dans la cellule
                                    if (cellElement.firstChild) {
                                        cellElement.removeChild(cellElement.firstChild);
                                    }
                                    bridgeImage.style.width = "100%"; // Largeur du pont en pixels
                                    bridgeImage.style.height = "80%"; // Hauteur du pont en pixels
                                    bridgeImage.src = "../WEB/image/iles/bridge_h.png";
                                } else { // Sinon, c'est un pont simple
                                    bridgeImage.src = "../WEB/image/iles/bridge_h.png";
                                }

                            } else { // Sinon, c'est un pont vertical
                                bridgeImage.style.width = "20%"; // Largeur du pont en pixels
                                bridgeImage.style.height = "100%"; // Hauteur du pont en pixels


                                //si c'est un double pont
                                if (bridgeData.count > 1) {
                                    //on supprime l'image du pont
                                    if (cellElement.firstChild) {
                                        cellElement.removeChild(cellElement.firstChild);
                                    }
                                    bridgeImage.style.width = "50%"; // Largeur du pont en pixels
                                    bridgeImage.style.height = "100%"; // Hauteur du pont en pixels
                                    bridgeImage.src = "../WEB/image/iles/bridge_V.png";
                                } else { // Sinon, c'est un pont simple
                                    bridgeImage.src = "../WEB/image/iles/bridge_V.png";
                                }
                            }
                            //on creer une fonction pour supprimer les ponts quand l'on clique dessus
                            cellElement.appendChild(bridgeImage);

                            // ...
                            //on creer une fonction pour supprimer les ponts quand l'on clique dessus
                            bridgeImage.addEventListener('click', () => removeBridge(island1, island2));
                            cellElement.appendChild(bridgeImage);
                            // ...
                            console.log('lololol', huge.PlacedBridges); // For debugging
                            console.log(huge.Bridges)
                            //on stocke la position des ponts de placedBridges dans userPlacedBridges sous forme d'un tableau de tableau : [[row, col], [row, col], ...]
                            huge.userPlacedBridges = [];
                            for (var key in huge.PlacedBridges) {
                                huge.userPlacedBridges.push(huge.PlacedBridges[key].Placement);
                                //on definit un witdh de 0
                                huge.userPlacedBridges.width = 0;
                            }




                        }
                    }
                    check_win();
                }
                </script>
            </div>
        </div>
    </main>
</body>

</html>
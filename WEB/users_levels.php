<?php
session_start();


function GetPath($number){
    require("traitement/DB_connect.php");
    $sql = "SELECT path FROM levels WHERE number='$number'";
    $result = $conn->query($sql);
    $path = $result->fetch(PDO::FETCH_ASSOC);
    return $path;
}
if(isset($_GET['JSON'])){
$texte_php = $_GET["JSON"];
$texte_js = json_encode($texte_php);
//on importe la solution du niveau dans la base de donnée
require("traitement/DB_connect.php");
$sql = "SELECT soluce FROM users_level WHERE path='$texte_php'";
$result = $conn->query($sql);
$soluce = $result->fetch(PDO::FETCH_ASSOC);
foreach($soluce as $key => $value){
    $soluce = $value;
}
$texte_js = json_encode($soluce);
}
if(isset($_GET['story_level'])){
    $story_level = $_GET['story_level'];

    $texte_js = GetPath($story_level);
        //on convertit le tableau path en chaine de caractère avec un foreach
        foreach($texte_js as $key => $value){
            $texte_js = $value;
        }
    json_encode($texte_js);
}
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
        </div>
        <div id="popup" style="display: none;">
            <button id="Buttonp" class="Buttonp" type="submit" onclick="togglePopup(); showButton()">
                <a id="test" class="al" href="game.php">Retry &emsp; &#160; &#160;
                    <img class="img" src="image/button/retry.png" />
                </a>
            </button>

            <button id="Buttonp" class="Buttonp" type="submit">
                <a id="al" class="al" href="../index.php">Back Home
                    <img class="img" src="image/button/maison.png" />
                </a>
            </button>

            <button id="Buttonp" class="Buttonp" type="submit" onclick="togglePopup(); showButton()">
                <a id="al" class="al">Resume &emsp;
                    <img class="img" src="image/button/arrow.png" />
                </a>
            </button>

            <button id="Buttonp" class="Buttonp" type="submit">
                <a id="al" class="al" href="settingingames/settinguserslevels.php?level=<?php echo urlencode($_GET['level'])?>">Settings
                    &emsp;
                    <img class="img" src="image/button/boutonsetting.png" />
                </a>
            </button>
        </div>
    </header>
    <main Id="main" class="main">
    <div class="grid">
            <div class="martinplace">
                <img class="martin" src="image/martin1.png">
            </div>
            <div id="game" class="game">
                <!-- on affiche le texte js avec du JS -->
                <div id="bangerang"></div>
                <script type="text/javascript">
                var texte_js = <?php echo $texte_js; ?>;
                <?php if(!isset($_GET['story_level'])){ ?>
                var huge = JSON.parse(texte_js);
                <?php }
                else{ ?>
                    var huge = texte_js;
                    <?php }?>
                <?php ?>
                // huge = {       "Islands" : [           {"links" : 1,                   "Placement" : [5, 5]            },              {"links" : 5,                   "Placement" : [5, 7]            },              {"links" : 6,                   "Placement" : [5, 9]            },              {"links" : 3,                   "Placement" : [1, 9]            },              {"links" : 3,                   "Placement" : [1, 2]            },              {"links" : 5,                   "Placement" : [3, 2]            },              {"links" : 4,                   "Placement" : [5, 2]            },              {"links" : 2,                   "Placement" : [5, 4]            },              {"links" : 2,                   "Placement" : [8, 4]            },              {"links" : 1,                   "Placement" : [8, 6]            }    ],    "Grid": [
                //{                       "size" : [10, 10]               }     ],    "Bridges" : [               {               "width" : 0,            "length" : 1,           "direction" : 0,                 "Placement" : [[5, 6]]         },             {                "width" : 1,            "length" : 1,           "direction" : 0,                 "Placement" : [[5, 8]] },              {               "width" : 1,            "length" : 3,           "direction" : 1,                 "Placement" : [[4, 9],[3, 9],[2, 9]]   },              {               "width" : 0,            "length" : 6,           "direction" : 0,                 "Placement" : [[1, 8],[1, 7],[1, 6],[1, 5],[1, 4],[1, 3]]      },              {              "width" : 1,             "length" : 1,           "direction" : 1,                 "Placement" : [[2, 2]]         },
                //{               "width" : 0,            "length" : 1,           "direction" : 1,                 "Placement" : [[4, 2]] },              {               "width" : 0,            "length" : 1,           "direction" : 0,                 "Placement" : [[5, 3]]         },              {               "width" : 0,            "length" : 2,           "direction" : 1,         "Placement" : [[6, 4],[7, 4]]  },              {               "width" : 0,            "length" : 1,          "direction" : 0,          "Placement" : [[8, 5]]         }    ],    "PlacedBridges":{}}
                huge2 = huge;
                huge = huge[0]
                
                var columns = huge.Grid[0].size[0];
                var rows = huge.Grid[0].size[1];

                var gameDiv = document.getElementById('game');
                var gameDivWidth = gameDiv.clientWidth;
                var gameDivHeight = gameDiv.clientHeight;
                //fonction pour recuperer les cookies 
                function getCookie(name) {
                    var value = "; " + document.cookie;
                    var parts = value.split("; " + name + "=");
                    if (parts.length == 2) return parts.pop().split(";").shift();
                }

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
                    tbl.style.overflow = "scroll"; // allows the table to scroll if necessary




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
                                if (huge.Islands[k].Placement[0] === i && huge.Islands[k].Placement[1] ===
                                    j) {
                                    foundIsland = true;
                                    break;
                                }
                            }


                            if (foundIsland) {
                                var islandImage = document.createElement("img");
                                islandImage.setAttribute("id", "island-" + i + "-" + j);
                                //on verifie le status du cookie "mode" 
                                if (getCookie("mode") == 1) {
                                    if (huge.Islands[k].links == 1) {
                                        islandImage.src = "image/images_temporaires/1.png";
                                        cell.appendChild(islandImage);
                                    } else if (huge.Islands[k].links == 2) {
                                        islandImage.src = "image/images_temporaires/2.png";
                                        cell.appendChild(islandImage);
                                    } else if (huge.Islands[k].links == 3) {
                                        islandImage.src = "image/images_temporaires/3.png";
                                        cell.appendChild(islandImage);
                                    } else if (huge.Islands[k].links == 4) {
                                        islandImage.src = "image/images_temporaires/4.png";
                                        cell.appendChild(islandImage);
                                    } else if (huge.Islands[k].links == 5) {
                                        islandImage.src = "image/images_temporaires/5.png";
                                        cell.appendChild(islandImage);
                                    } else if (huge.Islands[k].links == 6) {
                                        islandImage.src = "image/images_temporaires/6.png";
                                        cell.appendChild(islandImage);
                                    }
                                 else if (huge.Islands[k].links == 7) {
                                        islandImage.src = "image/images_temporaires/7.png";
                                        cell.appendChild(islandImage);
                                    } else if (huge.Islands[k].links == 8) {
                                        islandImage.src = "image/images_temporaires/8.png";
                                        cell.appendChild(islandImage);
                                    }
                                } else {
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
                                    else if (huge.Islands[k].links == 7) {
                                        islandImage.src = "../WEB/image/iles/ile7.png";
                                        cell.appendChild(islandImage);
                                    }
                                    else if (huge.Islands[k].links == 8) {
                                        islandImage.src = "../WEB/image/iles/ile8.png";
                                        cell.appendChild(islandImage);
                                    }
                                    
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

                 
                    if (currentBridge.start === null) {
                        currentBridge.start = island;
                        
                    } else if (currentBridge.end === null && canPlaceBridge(currentBridge.start, island)) {
                        currentBridge.end = island;
                       
                        placeBridge(currentBridge.start, currentBridge.end);
                        currentBridge.start = null;
                        currentBridge.end = null;
                    }
                }

                function getIslandAt(coordinates) {
                    for (var i = 0; i < huge.Islands.length; i++) {
                        if (huge.Islands[i].Placement[0] === coordinates[0] && huge.Islands[i].Placement[
                                1] ===
                            coordinates[
                                1]) {
                            return huge.Islands[i];
                        }
                    }
                    return null;
                }

                function canPlaceBridge(island1, island2) {
                    // Vérifier si les îles sont sur la même ligne ou la même colonne
                    if (island1.Placement[0] !== island2.Placement[0] && island1.Placement[1] !== island2
                        .Placement[
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
                            if (island.Placement[0] >= minRow && island.Placement[0] <= maxRow && island
                                .Placement[1] >=
                                minCol && island.Placement[1] <= maxCol) {
                                return false;
                            }
                        }
                    }


                    // Vérifier si un des ponts placés serait en conflit avec le nouveau pont
                    for (let r = minRow; r <= maxRow; r++) {
                        for (let c = minCol; c <= maxCol; c++) {
                            if ((r === island1.Placement[0] && r === island2.Placement[0]) ||
                                // Horizontal bridge
                                (c === island1.Placement[1] && c === island2.Placement[1])
                            ) { // Vertical bridge
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
                 
                    // Si toutes les vérifications sont passées, le pont peut être placé
                    return true;
                }
                



                huge.userPlacedBridges = [];

                let userPlaced = {
                    "Bridges": [],
                };

       // On initie tmp2 comme un tableau vide.
       let tmp2 = [];


for (var yes = 0; yes < huge2.length; yes++) {
    let solution = {
        "1": [],
        "2": []
    };


    for (var j = 0; j < Object.keys(huge2[yes].Bridges).length; j++) {
        var width = huge2[yes].Bridges[Object.keys(huge2[yes].Bridges)[j]].width;
        var placement = huge2[yes].Bridges[Object.keys(huge2[yes].Bridges)[j]].Placement;
        for (var k = 0; k < placement.length; k++) {
             real = (width + 1);
           
            solution["" + real].push(placement[k]);
        }
    }


    tmp2.push(solution);
}
                function check_win() {

                    for (var i = 0; i < huge.Islands.length; i++) {
                        var island = huge.Islands[i];
                        var bridges = getBridgesAroundIsland(island);

                        if (bridges.length > island.links) {
                            var islandCell = document.getElementById("cell-" + island.Placement[0] + "-" +
                                island
                                .Placement[
                                    1]);
                            islandCell.classList.add(
                                "error"); // Ajouter la classe CSS "error" à la cellule de l'île
                        } else {
                            var islandCell = document.getElementById("cell-" + island.Placement[0] + "-" +
                                island
                                .Placement[
                                    1]);
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
                            tmp[huge.PlacedBridges[Object.keys(huge.PlacedBridges)[j]].count].push(huge
                                .PlacedBridges[
                                    Object
                                    .keys(huge.PlacedBridges)[j]].Placement[0]);
                        } else if (huge.PlacedBridges[Object.keys(huge.PlacedBridges)[j]].count == 2) {
                           
                            tmp[huge.PlacedBridges[Object.keys(huge.PlacedBridges)[j]].count].push(huge
                                .PlacedBridges[
                                    Object
                                    .keys(huge.PlacedBridges)[j]].Placement[0]);
                        }

                    }
                    //trie les deux dictionnaires
                    tmp["1"].sort();
    tmp["2"].sort();
    
    tmp2.forEach(solution => {
        solution["1"].sort();
        solution["2"].sort();
    });


    
    amogus = tmp2[0];
   

    // Vérifie si tmp correspond à l'une des solutions dans tmp2
    for (var siu = 0; siu < tmp2.length; siu++) {
        if (JSON.stringify(tmp) === JSON.stringify(tmp2[siu])) {
            document.location.href = "Win.php?mod=10&score=50";
            break;
        }
    }
}


                document.getElementById("test").addEventListener("click", retryClicked);

                function retryClicked(event) {
                    event.preventDefault(); // Empêche le comportement par défaut du lien

                    // Parcourir toutes les cellules dans huge.PlacedBridges
                    for (var cellId in huge.PlacedBridges) {
                        // Supprimer le pont du DOM
                        var cellElement = document.getElementById(cellId);
                        while (cellElement.firstChild) {
                            cellElement.removeChild(cellElement.firstChild);
                        }

                        // Supprimer le pont des données
                        delete huge.PlacedBridges[cellId];
                    }

                    // Réinitialiser huge.userPlacedBridges
                    huge.userPlacedBridges = [];
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
                    


                    // Longueur du pont
                    let bridgeLength = Math.abs((bridgeOrientation === 1 ? island1.Placement[1] : island1
                            .Placement[
                                0]) -
                        (bridgeOrientation === 1 ? island2.Placement[1] : island2.Placement[0])) + 1;


                    // Placer le pont
                    for (let i = 0; i < bridgeLength; i++) {
                        var row = bridgeOrientation === 1 ? island1.Placement[0] : Math.min(island1
                            .Placement[0],
                            island2
                            .Placement[0]) + i;
                        var col = bridgeOrientation === 2 ? island1.Placement[1] : Math.min(island1
                            .Placement[1],
                            island2
                            .Placement[1]) + i;


                        // Vérifier si la cellule n'est pas une île
                        var isIsland = false;
                        for (var j = 0; j < huge.Islands.length; j++) {
                            if (huge.Islands[j].Placement[0] === row && huge.Islands[j].Placement[1] ===
                                col) {
                                isIsland = true;
                                break;
                            }
                        }


                        // Si la cellule n'est pas une île, alors ajouter le pont
                        if (!isIsland) {
                            var cellId = "cell-" + row + "-" + col;
                            var cellElement = document.getElementById(cellId);
                           
                            var bridgeData = huge.PlacedBridges[cellId] || {
                                count: 0,
                                orientation: bridgeOrientation,
                                Placement: []
                            };
                            bridgeData.count += 1;
                            bridgeData.Placement.push([row, col]);
                            huge.PlacedBridges[cellId] = bridgeData;
                            
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
                                    bridgeImage.style.width = "100%"; // Largeur d1u pont en pixels
                                    bridgeImage.style.height = "75%"; // Hauteur du pont en pixels
                                    bridgeImage.src = "../WEB/image/iles/bridgedouble.png";
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
                                    bridgeImage.style.width = "80%"; // Largeur du pont en pixels
                                    bridgeImage.style.height = "100%"; // Hauteur du pont en pixels
                                    bridgeImage.src = "../WEB/image/iles/bridgedoubleverticale.png";
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
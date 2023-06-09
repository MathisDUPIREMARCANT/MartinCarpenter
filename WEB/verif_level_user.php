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
<main Id="main" class="main">
<div id="game" class="game">
<video id="background-video" autoplay="autoplay" playsinline loop>
        <source src="image/background.mp4" type="video/mp4">
    </video>
<?php
//on récupère les données du formulaire
$pixelArt = $_POST['pixelArt'];

$command = 'MartinS.exe'. ' '. $_POST['columns'] . ' ' . $_POST['rows'] . ' ' . $pixelArt;
$output = exec($command);
$pixelArt = $output; 


?>
<script>
                function postRedirect(url, params) {
    var form = document.createElement("form");
    form.method = "post";
    form.action = url;

    // Create input fields for each parameter
    for (var key in params) {
      if (params.hasOwnProperty(key)) {
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = params[key];
        form.appendChild(input);
      }
    }

    // Append the form to the body and submit
    document.body.appendChild(form);
    form.submit();
  }
    //on convertit rows et columns de variable php en variables js
    let rows = <?php echo json_encode($_POST['rows']); ?>;
    let columns = <?php echo json_encode($_POST['columns']); ?>;

    let gridSize = [rows,columns];
   
    let pixelArt = <?php echo json_encode($pixelArt); ?>;
   
    //on stocke les differentes solutions dans un tableau (les differentes solutions sont séparées par des " ")
    solution = pixelArt.split(" ");
    //on recupere les solutions dans le tableau (uniquement les solutions qui ont un index impaire comme pixelArt[1], pixelArt[3]...) et on les supprime de pixelart
    var Nb_bridge = []; //tableau qui contient le nombre de ponts pour chaque
    var pixel = []; //tableau qui contient les pixels
    for (let i = 0; i < solution.length/2; i++) {
        //on push la solution dans le tableau pixel
        
        Nb_bridge.push(solution[2*i+1]);
        pixel.push(solution[2*i]);

    }
   
    pixelArt =  solution;
  
    //window.location.href = "pixelart_json.php?JSON=" + pixel + "&row=" + <?php echo json_encode($_POST['rows']); ?> + "&column=" + <?php echo json_encode($_POST['columns']); ;?> + "&brdg="  + Nb_bridge;
    <?php 
    if (isset($_POST['mod']) || isset($_POST['id']) || isset($_POST['siuu'])){
    $mod = $_POST['mod'];
    $id = $_POST['id'];
    $siuu = $_POST['siuu'];
    }

    $oui = 'Placements.exe'. ' '. $_POST['columns'] . ' ' . $_POST['rows'] . ' ' . 0 . ' ' . $_POST['pixelArt'];
    $non = exec($oui);
    $pixelArtnosol = $non;
    ?>
    var params = { mod: 2, JSON: <?php echo json_encode($pixelArtnosol); ?>, nbiles: <?php echo json_encode($_POST['nbiles']); ?>, column: <?php echo json_encode($_POST['columns']); ?>, row: <?php echo json_encode($_POST['rows']); ?>, id: 2, siuu: 2, pxl: pixel, brdg: Nb_bridge };
    var url = "pixelart_json.php";
                postRedirect(url, params);
    //window.location.href = "pixelart_json.php?JSON=" + <?php echo json_encode($pixelArtnosol); ?> + "&siuu=" + <?php echo json_encode($_POST['siuu']); ?> + "&pxl=" + pixel + "&mod=1" + "&row=" + <?php echo json_encode($_POST['rows']); ?> + "&column=" + <?php echo json_encode($_POST['columns']); ?> + "&brdg="  + Nb_bridge + "&nbiles=" + <?php echo json_encode($_POST['nbiles']); ?>;

    //on récupere le nombre de ponts et d'iles dans le pixelart
    let nbIslands = 0;
    //on compte le nombre d'iles dans le pixelart
    //for (let j = 0; j < pixelArt.length; j++) {

//}
   
    let bridge = {
                "width": 0,
                "length": 0,
                "direction": null,
                "Placement": [[0, 0]]
            };
//     function pixelArtToJson(gridSize) {
//     // Initialise l'objet json vide
//     let obj = {
//         "Islands": [],
//         "Grid": [{"size": gridSize}],
//         "Bridges": [],
//         "PlacedBridges": []
//     };


//     let width = gridSize[0];
//     let height = gridSize[1];


//     for (let i = 0; i < pixelArt.length; i++) {
//         let y = Math.floor(i / width);
//         let x = i % width;
//         let symbol = pixelArt[i];


//         // Detect islands
//         if (!isNaN(parseInt(symbol))) {
//             obj.Islands.push({
//                 "links": parseInt(symbol),
//                 "Placement": [y, x]
//             });
//         }
//         // Detect bridges
//         else if (symbol === "~" || symbol === "-" || symbol === "." || symbol === "_") {



//             // Check direction of the bridge (horizontal or vertical) (~ = vertical witdh = 0, _ = horizontal width = 0, - = vertical width = 1, . = horizontal width = 1)
//             if (symbol === "~" || symbol === ".") {
//                 bridge.direction = 1;
//             } else if (symbol === "-" || symbol === "_") {
//                 bridge.direction = 0;
//             }
//             //check width of the bridge
//             if (symbol === "~" || symbol === "_") {
//                 bridge.width = 1;
//             } else if (symbol === "-" || symbol === ".") {
//                 bridge.width = 2;
//             }



            
//         }
        
//     }

//     obj.Bridges.push(bridge);
//     return obj;
// }







</script>
<div id="bangerang"></div>
                <script type="text/javascript">
var rows = huge.Grid[0].size[0];
                var columns = huge.Grid[0].size[1];

                var gameDiv = document.getElementById('game');
                var gameDivWidth = gameDiv.clientWidth;
                var gameDivHeight = gameDiv.clientHeight;
                //fonction pour recuperer les cookies 
                function getCookie(name) {
                    var value = "; " + document.cookie;
                    var parts = value.split("; " + name + "=");
                    if (parts.length == 2) return parts.pop().split(";").shift();
                }

                function generate_table(rows, columns) {
    // Obtenir la référence du body
    var body = document.getElementsByTagName("body")[0];


    // Créer les éléments <table> et <tbody>
    var tbl = document.createElement("table");
    var tblBody = document.createElement("tbody");


    // Créer les cellules
    for (var i = 0; i < rows; i++) {
        var row = document.createElement("tr");


        for (var j = 0; j < columns; j++) {
            var cell = document.createElement("td");


            // Vérifier si l'île se trouve à la position actuelle
            var foundIsland = false;
            for (var k = 0; k < huge.Islands.length; k++) {
                if (huge.Islands[k].Placement[0] === i && huge.Islands[k].Placement[1] === j) {
                    foundIsland = true;
                    break;
                }
            }


            if (foundIsland) {
    //on creer une image pour chaque ile en fonction du nombre de link (1 a 6)
    var islandImage = document.createElement("img");


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
} else {
                // Vérifier si un pont se trouve à la position actuelle
                var bridgeFound = false;
                for (var l = 0; l < huge.Bridges.length; l++) {
                    var bridge = huge.Bridges[l];
                    for (var m = 0; m < bridge.Placement.length; m++) {
                        var bridgePlacement = bridge.Placement[m];
                        if (bridgePlacement[0] === i && bridgePlacement[1] === j) {
                            bridgeFound = true;
                            break;
                        }
                    }
                    if (bridgeFound) {
                        var bridgeImage = document.createElement("img");
                        if (bridge.direction === 1) { // Pont vertical
                            if (bridge.width === 1) {
                               
                                bridgeImage.src = "../WEB/image/iles/bridgedoubleverticale.png";
                            } else {

                                bridgeImage.src = "../WEB/image/iles/bridge_h.png";
                            }
                        } else { // Pont horizontal
                            if (bridge.width === 1) {
                                bridgeImage.src = "../WEB/image/iles/bridgedouble.png";
                            } else {
                                bridgeImage.src = "../WEB/image/iles/bridge_V.png";
                            }
                        }
                        cell.appendChild(bridgeImage);
                        break;
                    }
                }
            }


            row.appendChild(cell);
            cell.setAttribute("class", 'case');
            cell.setAttribute("id", '0');
        }


        tblBody.appendChild(row);
    }


    // Ajouter <tbody> à <table>
    tbl.appendChild(tblBody);
    // Ajouter <table> au body
    document.getElementById("bangerang").appendChild(tbl);
}
  // Appeler cette fonction après avoir généré le tableau
  //on recupere la taille du tableau
  generate_table(rows, columns);
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

                tmp2 = {
                    "1": [],
                    "2": []
                };
              
                for (var j = 0; j < Object.keys(huge.Bridges).length; j++) {

                    //on verifie la valeur du count
                    if (huge.Bridges[Object.keys(huge.Bridges)[j]].width == 1) {
                        for (var k = 0; k < huge.Bridges[Object.keys(huge.Bridges)[j]].Placement
                            .length; k++) {

                            //on stocke la position des ponts de placedBridges dans userPlacedBridges sous forme d'un tableau de tableau : [[row, col], [row, col], ...]
                            tmp2[huge.Bridges[Object.keys(huge.Bridges)[j]].width + 1].push(huge.Bridges[
                                Object.keys(
                                    huge
                                    .Bridges)[j]].Placement[k]);
                        }
                     } else {
                        for (var k = 0; k < huge.Bridges[Object.keys(huge.Bridges)[j]].Placement
                            .length; k++) {
                            tmp2[huge.Bridges[Object.keys(huge.Bridges)[j]].width + 1].push(huge.Bridges[
                                Object.keys(
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
                    tmp2["1"].sort();
                    tmp2["2"].sort();

                    tmp = JSON.stringify(tmp)
                    tmp2 = JSON.stringify(tmp2)
                    
                    if (tmp === tmp2) {


                        document.location.href = "Win.php?mod=" + mod;
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
                    check_win();
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
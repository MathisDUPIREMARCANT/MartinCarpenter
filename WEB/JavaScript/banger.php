<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link id="css" rel="stylesheet" href="Affichage.css">
</head>

<body>
    <style>
        img {
            width: 50px;
            height: 50px;
        }
        td{
            width: 50px;
            height: 50px;
        }
    </style>

<!-- formulaire pour recuperer le nombre d'iles, le nombre de colonnes et le nombre de lignes -->
    <form action="banger.php" method="post">
        <label for="nb_iles">Nombre d'iles</label>
        <input type="text" name="nb_iles" id="nb_iles">
        <label for="nb_colonnes">Nombre de colonnes</label>
        <input type="text" name="nb_colonnes" id="nb_colonnes">
        <label for="nb_lignes">Nombre de lignes</label>
        <input type="text" name="nb_lignes" id="nb_lignes">
        <input type="submit" value="Valider">
        <br><br> <br>  
    </form> 
<?php
$command = 'MartinG6.exe';

$output = exec($command);
?>
<?php
$texte_php = $output;
$texte_js = json_encode($texte_php);
?>
<!-- on affiche le texte js avec du JS -->
<div id="bangerang"></div>
<script type="text/javascript">
    var texte_js = <?php echo $texte_js; ?>;
    var huge = JSON.parse(texte_js);
huge = {    "Islands": [
        {
            "links": 2,
            "Placement": [0, 2]
        },
        {
            "links": 1,
            "Placement": [4, 1]
        },
        {
            "links": 3,
            "Placement": [5, 2]
        },
        {
            "links": 3,
            "Placement": [4, 5]
        }
    ],
    "Grid": [
        {
            "size": [7, 7]
        }
    ],
    "Bridges": [
        {
            "width": 0,
            "length": 3,
            "direction": 0, // 0-horizontal & 1-vertical
            "Placement": [[4, 2], [4, 3],[4, 4]]
        }
    ],
    "PlacedBridges": {} 
};
   /*
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
        islandImage.src = "../image/images_temporaires/3167v-chiffre-1.jpeg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 2) {
        islandImage.src = "../image/images_temporaires/chiffre-2-en-aluminium-decoupe-coloris-et-dimensions-au-choix.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 3) {
        islandImage.src = "../image/images_temporaires/chiffre-3-en-alu-couleur-et-dimensions-au-choix.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 4) {
        islandImage.src = "../image/images_temporaires/chiffre-4-en-aluminium-5-coloris-et-2-dimensions-possibles.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 5) {
        islandImage.src = "../image/images_temporaires/chiffre-5-en-aluminium-5-coloris-au-choix-100-ou-150-mm-de-haut.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 6) {
        islandImage.src = "../image/images_temporaires/6.jpg";
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
                                bridgeImage.src = "../image/images_temporaires/pause.png"; 
                            } else {
                                bridgeImage.src = "../image/images_temporaires/traitv.png";
                            }
                        } else { // Pont horizontal
                            if (bridge.width === 1) {
                                bridgeImage.src = "../image/images_temporaires/egal.webp"; 
                            } else {
                                bridgeImage.src = "../image/images_temporaires/icone-trait-noir.png"; 
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
    var rows = huge.Grid[0].size[0];
    var columns = huge.Grid[0].size[1];
  generate_table(rows, columns);

  //on creer une fonction pour afficher le niveau sans les ponts
    function generate_table_no_solution(rows, columns) {
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
                    var islandImage = document.createElement("img"); //A REMPLACER EN FONCTION DU NOMBRE DE LINKS
                    islandImage.src = "../image/logo.ico"; // Remplacez par le chemin de l'image souhaitée
                    cell.appendChild(islandImage);
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
    generate_table_no_solution(rows, columns); LA C'EST LA V1*/

    var rows = huge.Grid[0].size[0];
var columns = huge.Grid[0].size[1];
function generate_table_no_solution(rows, columns) {
    // Obtenir la référence du body
    var body = document.getElementsByTagName("body")[0];

    // Créer les éléments <table> et <tbody>
    var tbl = document.createElement("table");
    var tblBody = document.createElement("tbody");

    // Créer les cellules
    for (var i = 0; i < rows; i++) {
        var row = document.createElement("tr");

        for (var j = 0; j < columns; j++) {
            var cell = document.createElement('td');
            cell.setAttribute('id', `cell-${i}-${j}`);
            // Vérifier si l'île se trouve à la position actuelle
            var foundIsland = false;
            for (var k = 0; k < huge.Islands.length; k++) {
                if (huge.Islands[k].Placement[0] === i && huge.Islands[k].Placement[1] === j) {
                    foundIsland = true;
                    break;
                }
            }

            if (foundIsland) {
                var islandImage = document.createElement("img"); //A REMPLACER EN FONCTION DU NOMBRE DE LINKS
                islandImage.setAttribute("id", "island-" + i + "-" + j);
                if (huge.Islands[k].links == 1) {
                    islandImage.src = "../image/images_temporaires/3167v-chiffre-1.jpeg";
                    cell.appendChild(islandImage);
                } else if (huge.Islands[k].links == 2) {
                    islandImage.src = "../image/images_temporaires/chiffre-2-en-aluminium-decoupe-coloris-et-dimensions-au-choix.jpg";
                    cell.appendChild(islandImage);
                } else if (huge.Islands[k].links == 3) {
                    islandImage.src = "../image/images_temporaires/chiffre-3-en-alu-couleur-et-dimensions-au-choix.jpg";
                    cell.appendChild(islandImage);
                } else if (huge.Islands[k].links == 4) {
                    islandImage.src = "../image/images_temporaires/chiffre-4-en-aluminium-5-coloris-et-2-dimensions-possibles.jpg";
                    cell.appendChild(islandImage);
                } else if (huge.Islands[k].links == 5) {
                    islandImage.src = "../image/images_temporaires/chiffre-5-en-aluminium-5-coloris-au-choix-100-ou-150-mm-de-haut.jpg";
                    cell.appendChild(islandImage);
                } else if (huge.Islands[k].links == 6) {
                    islandImage.src = "../image/images_temporaires/6.jpg";
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
    
    console.log('Clic sur une île, coordonnées : ', [row, col], ', île : ', island); // Ajout d'un message de débogage
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
        if (huge.Islands[i].Placement[0] === coordinates[0] && huge.Islands[i].Placement[1] === coordinates[1]) {
            return huge.Islands[i];
        }
    }
    return null;
}
function canPlaceBridge(island1, island2) {
    // Vérifier si les îles sont sur la même ligne ou la même colonne
    if (island1.Placement[0] !== island2.Placement[0] && island1.Placement[1] !== island2.Placement[1]) {
        return false;
    }
    var bridgeOrientation = island1.Placement[0] === island2.Placement[0] ? 1 : 2; // 1 pour horizontal, 2 pour vertical
    // Vérifier s'il y a une autre île sur le chemin
    var minRow = Math.min(island1.Placement[0], island2.Placement[0]);
    var maxRow = Math.max(island1.Placement[0], island2.Placement[0]);
    var minCol = Math.min(island1.Placement[1], island2.Placement[1]);
    var maxCol = Math.max(island1.Placement[1], island2.Placement[1]);
    for (var i = 0; i < huge.Islands.length; i++) {
        var island = huge.Islands[i];
        if (island !== island1 && island !== island2) {
            if (island.Placement[0] >= minRow && island.Placement[0] <= maxRow && island.Placement[1] >= minCol && island.Placement[1] <= maxCol) {
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
                if (huge.PlacedBridges[cellId] && huge.PlacedBridges[cellId].orientation !== bridgeOrientation) {
                    return false;
                }
                if (huge.PlacedBridges[cellId] && huge.PlacedBridges[cellId].count >= 2) {
                    return false;
                }
            }
        }
    }
    console.log('Vérification de la possibilité de placer le pont, île1 : ', island1, ', île2 : ', island2); // Ajout d'un message de débogage
    // Si toutes les vérifications sont passées, le pont peut être placé
    return true;
}








function placeBridge(island1, island2) {
    var bridgeOrientation = island1.Placement[0] === island2.Placement[0] ? 1 : 2; // 1 pour horizontal, 2 pour vertical
    console.log('Placement du pont, île1 : ', island1, ', île2 : ', island2);

    // Longueur du pont
    let bridgeLength = Math.abs((bridgeOrientation === 1 ? island1.Placement[1] : island1.Placement[0]) - 
                            (bridgeOrientation === 1 ? island2.Placement[1] : island2.Placement[0])) + 1;

    // Placer le pont
    for (let i = 0; i < bridgeLength; i++) {
        var row = bridgeOrientation === 1 ? island1.Placement[0] : Math.min(island1.Placement[0], island2.Placement[0]) + i;
        var col = bridgeOrientation === 2 ? island1.Placement[1] : Math.min(island1.Placement[1], island2.Placement[1]) + i;

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
            var bridgeData = huge.PlacedBridges[cellId] || { count: 0, orientation: bridgeOrientation, Placement: [] };
            bridgeData.count += 1;
            bridgeData.Placement.push([row, col]);
            huge.PlacedBridges[cellId] = bridgeData;
            var bridgeImage = document.createElement("img");
            if (bridgeOrientation === 1) { // Si c'est un pont horizontal
                bridgeImage.src = "../image/images_temporaires/icone-trait-noir.png"; 
            } else { // Sinon, c'est un pont vertical
                bridgeImage.src = "../image/images_temporaires/traitv.png"; 
            }
            cellElement.appendChild(bridgeImage);

            console.log(huge.PlacedBridges); // For debugging
            console.log(huge.Bridges)
            //on affiche avec console.log la position du premier pont de placedBridges
            console.log(huge.PlacedBridges[cellId].Placement[0]);
        }
    }
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
        islandImage.src = "../image/images_temporaires/3167v-chiffre-1.jpeg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 2) {
        islandImage.src = "../image/images_temporaires/chiffre-2-en-aluminium-decoupe-coloris-et-dimensions-au-choix.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 3) {
        islandImage.src = "../image/images_temporaires/chiffre-3-en-alu-couleur-et-dimensions-au-choix.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 4) {
        islandImage.src = "../image/images_temporaires/chiffre-4-en-aluminium-5-coloris-et-2-dimensions-possibles.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 5) {
        islandImage.src = "../image/images_temporaires/chiffre-5-en-aluminium-5-coloris-au-choix-100-ou-150-mm-de-haut.jpg";
        cell.appendChild(islandImage);
    } else if (huge.Islands[k].links == 6) {
        islandImage.src = "../image/images_temporaires/6.jpg";
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
                                bridgeImage.src = "../image/images_temporaires/pause.png"; 
                            } else {
                                bridgeImage.src = "../image/images_temporaires/traitv.png";
                            }
                        } else { // Pont horizontal
                            if (bridge.width === 1) {
                                bridgeImage.src = "../image/images_temporaires/egal.webp"; 
                            } else {
                                bridgeImage.src = "../image/images_temporaires/icone-trait-noir.png"; 
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
</script>


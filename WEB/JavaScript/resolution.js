huge = {
    "Islands": [
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
            "width": 1,
            "length": 2,
            "direction": 0, // 0-horizontal & 1-vertical
            "Placement": [[3, 2], [3, 3]]
        }
    ],
    "PlacedBridges": {} 
};
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
    // Iterating over all cells between the two islands
    for (let r = Math.min(island1.Placement[0], island2.Placement[0]); r <= Math.max(island1.Placement[0], island2.Placement[0]); r++) {
        for (let c = Math.min(island1.Placement[1], island2.Placement[1]); c <= Math.max(island1.Placement[1], island2.Placement[1]); c++) {
            // If this cell is a part of the bridge
            if ((r === island1.Placement[0] && r === island2.Placement[0]) || // Horizontal bridge
                (c === island1.Placement[1] && c === island2.Placement[1])) { // Vertical bridge

                // Here, before adding the bridge, we should check if the cell is not an island
                var isIsland = false;
                for (var i = 0; i < huge.Islands.length; i++) {
                    if (huge.Islands[i].Placement[0] === r && huge.Islands[i].Placement[1] === c) {
                        isIsland = true;
                        break;
                    }
                }

                // If the cell is not an island, then add the bridge
                if (!isIsland) {
                    var cellId = "cell-" + r + "-" + c;
                    var cellElement = document.getElementById(cellId);
                    console.log('cellId: ', cellId); // For debugging
                    console.log('Cell element: ', cellElement); // For debugging
                    var bridgeData = huge.PlacedBridges[cellId] || { count: 0, orientation: bridgeOrientation };
                    bridgeData.count += 1;
                    huge.PlacedBridges[cellId] = bridgeData;
                    var bridgeImage = document.createElement("img");
                    if (island1.Placement[0] === island2.Placement[0]) { // Si c'est un pont horizontal
                        bridgeImage.src = "../image/images_temporaires/icone-trait-noir.png"; 
                    } else { // Sinon, c'est un pont vertical
                        bridgeImage.src = "../image/images_temporaires/traitv.png"; 
                    }
                    cellElement.appendChild(bridgeImage);
                     
                }
            }
        }
    }
}
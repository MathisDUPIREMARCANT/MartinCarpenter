huge = {        "Islands" : [           {"links" : 1,                   "Placement" : [14, 9]           },
{"links" : 3,                   "Placement" : [14, 1]           },              {"links" : 3,                   "Placement" : [10, 1]           },              {"links" : 2,                   "Placement" : [2, 1]            },             {"links" : 2,                    "Placement" : [2, 8]            },              {"links" : 3,                   "Placement" : [2, 10]           },              {"links" : 3,                   "Placement" : [2, 12]           },             {"links" : 3,                    "Placement" : [2, 18]           },              {"links" : 3,                   "Placement" : [5, 18]           },              {"links" : 1,                   "Placement" : [7, 18]           }    ],    "Grid": [            {                       "size" : [15, 20]               }     ],    "Bridges" : [               {
"width" : 0,            "length" : 7,           "direction" : 0,                 "Placement" : [[14, 8],[14, 7],[14, 6],[14, 5],[14, 4],[14, 3],[14, 2]]        },              {               "width" : 1,            "length" : 3,          "direction" : 1,          "Placement" : [[13, 1],[12, 1],[11, 1]]        },              {               "width" : 0,
"length" : 7,           "direction" : 1,                 "Placement" : [[9, 1],[8, 1],[7, 1],[6, 1],[5, 1],[4, 1],[3, 1]]       },              {               "width" : 0,            "length" : 6,           "direction" : 0,                "Placement" : [[2, 2],[2, 3],[2, 4],[2, 5],[2, 6],[2, 7]]       },              {               "width" : 0,           "length" : 1,            "direction" : 0,                 "Placement" : [[2, 9]]         },              {              "width" : 1,             "length" : 1,           "direction" : 0,                 "Placement" : [[2, 11]]        },
{               "width" : 0,            "length" : 5,           "direction" : 0,                 "Placement" : [[2, 13],[2, 14],[2, 15],[2, 16],[2, 17]]        },              {               "width" : 1,            "length" : 2,          "direction" : 1,          "Placement" : [[3, 18],[4, 18]]        },              {               "width" : 0,           "length" : 1,            "direction" : 1,                 "Placement" : [[6, 18]]        }    ],
    "PlacedBridges":{}};





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
generate_table_no_solution(rows, columns);



 // Cette fonction sera appelée lorsqu'un élément de glisser-déposer commence
 function dragStart(event) {
    var img = new Image();
    img.src = event.target.src;
    event.dataTransfer.setDragImage(img, 0, 0);
    event.dataTransfer.setData("text", event.target.id);
}

// Cette fonction sera appelée lorsqu'un élément est déplacé sur une cellule du tableau JS
function allowDrop(event) {
    event.preventDefault();
}

// Cette fonction sera appelée lorsqu'une image est déposée sur une autre image
function dropOnImage(event) {
    event.stopPropagation(); // Stoppe la propagation de l'événement
}

// Ajouter cette fonction à toutes les images dans le tableau JS
var images = document.getElementsByTagName('img');
for (var i = 0; i < images.length; i++) {
    images[i].addEventListener('drop', dropOnImage);
}


// Cette fonction sera appelée lorsqu'un élément est déposé sur une cellule du tableau JS
function drop(event) {
    event.preventDefault();

    // Vérifie si la cellule cible contient déjà une image
    if (event.target.getElementsByTagName('img').length > 0) {
        return; // Interrompt le processus de dépôt si une image est déjà présente
    }

    var data = event.dataTransfer.getData("text");
    var img = document.getElementById(data);
    var cloneImg = img.cloneNode(true); // clone l'image
    cloneImg.id = "clone_" + Math.floor(Math.random() * 10000); // attribuer un id unique au clone
    cloneImg.draggable = true;
    cloneImg.addEventListener('dragstart', dragStart);
    cloneImg.addEventListener('drop', dropOnImage); // Empêche le dépôt d'une image sur une autre image

    // Vérifie si l'image provient du tableau HTML
    if (img.parentNode.id === "cell1") {
        event.target.appendChild(cloneImg); // ajoute le clone à la nouvelle cellule
    } else {
        event.target.appendChild(img); // déplace l'image si elle ne provient pas du tableau HTML
        img.addEventListener('drop', dropOnImage); // Empêche le dépôt d'une image sur une autre image
    }
}

// Assignez ces fonctions à tous les éléments img dans le tableau HTML
var images = document.getElementsByTagName('img');
for (var i = 0; i < images.length; i++) {
    images[i].draggable = true;
    images[i].addEventListener('dragstart', dragStart);
}

// Assignez ces fonctions à toutes les cellules du tableau JS
var cells = document.getElementsByTagName('td');
for (var i = 0; i < cells.length; i++) {
    cells[i].addEventListener('drop', drop);
    cells[i].addEventListener('dragover', allowDrop);
}



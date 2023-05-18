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
    ]
};



  
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
                var islandImage = document.createElement("img");
                islandImage.src = "../image/logo.ico"; // Remplacez par le chemin de l'image souhaitée
                cell.appendChild(islandImage);
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
                                bridgeImage.src = "../image/butonpause.png"; 
                            } else {
                                bridgeImage.src = "../image/hammer-symbol-color-png (1).png";
                            }
                        } else { // Pont horizontal
                            if (bridge.width === 1) {
                                bridgeImage.src = "../image/arrow.png"; 
                            } else {
                                bridgeImage.src = "../image/para.png"; 
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
  generate_table(7, 7);




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



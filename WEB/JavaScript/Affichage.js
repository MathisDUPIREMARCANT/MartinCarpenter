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
            "Placement": [[3, 2]]
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
                var cellText = document.createTextNode(huge.Islands[k].links);
                cell.appendChild(cellText);
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
                        var bridgeText = "";
                        if (bridge.direction === 1) { // Vertical bridge
                            if (bridge.width === 1) {
                                bridgeText = "||";
                            } else {
                                bridgeText = "|";
                            }
                        } else { // Horizontal bridge
                            if (bridge.width === 1) {
                                bridgeText = "=";
                            } else {
                                bridgeText = "-";
                            }
                        }
                        var bridgeTextNode = document.createTextNode(bridgeText);
                        cell.appendChild(bridgeTextNode);
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

// Ajoutez cette fonction pour rendre les éléments de tableau (td) recevables lors du glisser-déposer
function makeCellsReceivable() {
    var cells = document.getElementsByClassName("case");
    
    // Convertit la collection HTML en tableau
    var cellsArray = Array.from(cells);
    
    // Ajoutez les gestionnaires d'événements pour chaque cellule
    cellsArray.forEach(function(cell) {
      cell.addEventListener("dragover", function(event) {
        event.preventDefault();
      });
    
      cell.addEventListener("drop", function(event) {
        event.preventDefault();
        var imageId = event.dataTransfer.getData("text/plain");
        var image = document.getElementById(imageId);
        cell.appendChild(image);
      });
    });
  }
  
  // Appeler cette fonction après avoir généré le tableau
  generate_table(7, 7);
  makeCellsReceivable();
  



  
 /* 
var e = document.getElementById('bangerang');
e.style.display = 'grid';
e.style.gridTemplateColumns = 'repeat(5, 100px);';
e.style.gridtemplateRows = 'repeat(5, 100px)';
e.style.gridGap = '1px';
e.style.backgroundColor = 'red';
e.style.width = '500px';
e.style.height = '500px';
*/




if (huge.Islands[0].links == 2) {
    for (var i = 0; i < huge.Islands.length; i++) {
        document.getElementById("banger").innerHTML += "<br>" + huge.Islands[i].Placement[1]  + "<img src='https://static.vecteezy.com/system/resources/previews/001/192/291/non_2x/circle-png.png' alt='Mountain' style='width:50px; position:relative; right:34px; top:14px' />";
    }

}

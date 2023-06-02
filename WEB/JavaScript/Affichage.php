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
        td,tr {
            width: 50px;
            height: 50px;
        }
 
    </style>
    <div>
        <h1 id="banger" style="position:relative; left: 40px;"></h1>
        <!-- tableau pour stocker des images -->
        <form action="Affichage.php" method="post">
            <label for="nb_colonnes">Nombre de colonnes</label>
            <input type="text" name="nb_colonnes" id="nb_colonnes">
            <label for="nb_lignes">Nombre de lignes</label>
            <input type="text" name="nb_lignes" id="nb_lignes">
            <input type="submit" value="Valider">
            <br><br> <br>  
        </form>
        <?php
        if (isset($_POST['nb_lignes']) && isset($_POST['nb_colonnes'])){
            $rows = $_POST['nb_lignes'];
            $columns = $_POST['nb_colonnes'];
            //on contvertit des variables php en js 
            ?>
            <script>
var rows = <?php echo json_encode($rows); ?>;
var columns = <?php echo json_encode($columns); ?>;
</script>
<?php
        }
        

?>
        <table border="1">
            <tbody>
                <tr>
                <td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image1" class="original" src="../image/iles/ile1.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image2" class="original" src="../image/iles/ile2.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image3" class="original" src="../image/iles/ile3.png">
</td>
<td class="source-table"> 
    <img draggable="true" ondragstart="dragStart(event)" id="image4" class="original" src="../image/iles/ile4.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image5" class="original" src="../image/iles/ile5.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image6" class="original" src="../image/iles/ile6.png">
</td>

                </tr>
            </tbody>
        </table>
        
        <div id="bangerang"></div>

        <script>huge = {
    "Islands": [],
    "Grid": [],
    "Bridges": [],
    "PlacedBridges": {}
};



/*
function generate_table(rows, columns) {
    // Obtenir la référence du body
    var body = document.getElementsByTagName("body")[0];

    // Créer les éléments <table> et <tbody>
    var tbl = document.createElement("table");
    var tblBody = document.createElement("tbody");
    tbl.style.width = "50px";
    tbl.style.height = "50px";

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
  generate_table(rows, columns);*/



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


// Cette fonction sera appelée lorsqu'un élément est déposé sur une cellule du tableau JS
function drop(event) {
  event.preventDefault();


  // Vérifie si la cellule cible contient déjà une image
  if (event.target.getElementsByTagName("img").length > 0) {
    return; // Interrompt le processus de dépôt si une image est déjà présente
  }


  var data = event.dataTransfer.getData("text");
  var img = document.getElementById(data);
  var cloneImg = img.cloneNode(true); // clone l'image
  var newId = "clone_" + Math.floor(Math.random() * 10000); // attribuer un id unique au clone
  cloneImg.id = newId;
  cloneImg.draggable = true;
  cloneImg.addEventListener("dragstart", dragStart);
  cloneImg.addEventListener("drop", dropOnImage); // Empêche le dépôt d'une image sur une autre image


  // Vérifie si l'image provient du tableau HTML
  if (img.parentNode.classList.contains("source-table")) {
    event.target.appendChild(cloneImg); // ajoute le clone à la nouvelle cellule
  } else {
    event.target.appendChild(img); // déplace l'image si elle ne provient pas du tableau HTML
    img.addEventListener("drop", dropOnImage); // Empêche le dépôt d'une image sur une autre image
  }


  // Obtient la position de la cellule cible
  var rowIndex = event.target.parentNode.rowIndex;
  var cellIndex = event.target.cellIndex;


  // Crée un nouvel objet île avec les informations de position et de liens
  var links = getLinksFromImageId(data);
  var island = {
    id: newId,
    Placement: [rowIndex, cellIndex],
    links: links
  };
  huge.Islands.push(island);


  console.log(huge.Islands);
  console.log(convertToPixelArt());
}


// Fonction utilitaire pour obtenir le nombre de liens à partir de l'ID de l'image
function getLinksFromImageId(imageId) {
  switch (imageId) {
    case "image1":
      return 1;
    case "image2":
      return 2;
    case "image3":
      return 3;
    case "image4":
      return 4;
    case "image5":
      return 5;
    case "image6":
      return 6;
    default:
      return 0;
  }
}



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
function convertToPixelArt(rows, cols) {
  // Créer une matrice vide de dimensions rows x cols
  var matrix = [];
  for (var i = 0; i < rows; i++) {
    matrix[i] = [];
    for (var j = 0; j < cols; j++) {
      matrix[i][j] = "*"; // Définir chaque case comme un espace vide "*"
    }
  }


  // Remplir la matrice avec les numéros d'île en fonction des positions et des liens
  for (var i = 0; i < huge.Islands.length; i++) {
    var island = huge.Islands[i];
    var rowIndex = island.Placement[0];
    var colIndex = island.Placement[1];
    var islandNumber = island.links.toString(); // Convertir le nombre de liens en chaîne de caractères


    // Si les coordonnées de l'île se trouvent à l'intérieur de la matrice
    if(rowIndex < rows && colIndex < cols) {
      matrix[rowIndex][colIndex] = islandNumber;
    }
  }


  // Convertir la matrice en une chaîne de caractères représentant le pixel art de la carte
  var pixelArt = "";
  for (var i = 0; i < rows; i++) {
    pixelArt += matrix[i].join("");
  }
  
  return pixelArt;
}
console.log(convertToPixelArt(rows, columns));

//fonction pour compter le nombre d'iles 
function countIslands(rows, columns) {
  var count = 0;
  for (var i = 0; i < huge.Islands.length; i++) {
    var island = huge.Islands[i];
    var rowIndex = island.Placement[0];
    var colIndex = island.Placement[1];
    if(rowIndex < rows && colIndex < columns) {
      count++;
    }
  }
  return count;
}

// Conversion en pixel art



function myFunction(){
    var pixelArt = convertToPixelArt(rows, columns);
    var iles = countIslands(rows, columns);
var url = "Affichage.php?rows=" + encodeURIComponent(rows) + "&columns=" + encodeURIComponent(columns) + "&pixelArt=" + encodeURIComponent(pixelArt) + "&nbiles=" + encodeURIComponent(iles);

window.location.href = url;
}



</script>

<?php
// Récupérer les paramètres de l'URL
$rows = $_GET['rows'];
$columns = $_GET['columns'];
$pixelArt = $_GET['pixelArt'];
$nbiles = $_GET['nbiles'];

echo "Nombre de lignes : " . $rows . "<br>";
echo "Nombre de colonnes : " . $columns . "<br>";
echo "Pixel art : " . $pixelArt . "<br>";
echo "Nombre d'îles : " . $nbiles . "<br>";

//$command = 'MartinS.exe'. ' '. $rows . ' ' . $columns . ' ' . $nbiles . ' ' . $pixelArt;
//$output = exec($command);
?>

<button onclick="myFunction()">Click me</button>
</body>

</html>

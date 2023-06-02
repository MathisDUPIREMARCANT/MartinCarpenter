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
    <link rel="icon" type="image/x-con" href="WEB/image/logomartin.ico">
    <!--Browser icon-->
    <link rel="stylesheet" href="CSS/create.css">
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
                <img class="save" src="image/button/save.png" onclick="myFunction()"/>
            </a>
        </div>
        <div id="popup" style="display: none;">
            <button id="Button" class="Button" type="submit">
                <a id="al" class="al" href="game.php">Retry</a>
            </button>

            <button id="Button" class="Button" type="submit">
                <a id="al" class="al" href="../index.php">Back Home</a>
            </button>

            <button id="Button" class="Button" type="submit" onclick="togglePopup(); showButton()">
                <a id="al" class="al">Resume</a>
            </button>

            <button id="Button" class="Button" type="submit">
                <a id="al" class="al" href="settingingames/settingcreatemod.php">Setting</a>
            </button>
        </div>
    </header>
    <main Id="main" class="main">
        <div class="choice">
        <table border="1">
            <tbody>
                <tr>
                <td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image1" class="original" src="../WEB/image/iles/ile1.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image2" class="original" src="../WEB/image/iles/ile2.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image3" class="original" src="../WEB/image/iles/ile3.png">
</td>
<td class="source-table"> 
    <img draggable="true" ondragstart="dragStart(event)" id="image4" class="original" src="../WEB/image/iles/ile4.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image5" class="original" src="../WEB/image/iles/ile5.png">
</td>
<td class="source-table">
    <img draggable="true" ondragstart="dragStart(event)" id="image6" class="original" src="../WEB/image/iles/ile6.png">
</td>
        

                </tr>
            </tbody>
        </table>
        </div>
        <div id="display">

        <h1 id="banger" style="position:relative; left: 40px;"></h1>
        <!-- tableau pour stocker des images -->
        <form action="createmod.php" method="post">
            <label for="nb_colonnes">Nombre de colonnes</label>
            <input type="text" name="nb_colonnes" id="nb_colonnes">
            <label for="nb_lignes">Nombre de lignes</label>
            <input type="text" name="nb_lignes" id="nb_lignes">
            <input type="submit" value="Valider">
            <br><br> <br>  

        </form>
         <div id="game" class="game"> 
         <div id="bangerang"></div>
        <div>
        
        <?php
        if (isset($_POST['nb_lignes']) && isset($_POST['nb_colonnes'])){
            $rows = $_POST['nb_lignes'];
            $columns = $_POST['nb_colonnes'];
            ?>
            <script>
var rows = <?php echo json_encode($rows); ?>;
var columns = <?php echo json_encode($columns); ?>;
</script>
<?php
        }
        

?>


        <script>huge = {
    "Islands": [],
    "Grid": [],
    "Bridges": [],
    "PlacedBridges": {}
};
//on affiche les rows et les columns


generate_table_no_solution(rows, columns);
  function generate_table_no_solution(rows, columns) {

    // Obtenir la référence du body
    var body = document.getElementsByTagName("body")[0];

    // Créer les éléments <table> et <tbody>
    var tbl = document.createElement("table");
    var tblBody = document.createElement("tbody");
                tbl.style.borderRadius = "20px";
                tbl.style.backgroundColor = "#247cbfe7";
                tbl.style.width = "70vw";
                tbl.style.height = "70vh";
                tbl.style.overflow = "auto"; // allows the table to scroll if necessary
    // Créer les cellules
    for (var i = 0; i < rows; i++) {
        
        var row = document.createElement("tr");
        for (var j = 0; j < columns; j++) {
            var cell = document.createElement("td");
                //on met des bordures aux cellules


            // Vérifier si l'île se trouve à la position actuelle
            var foundIsland = false;
            for (var k = 0; k < huge.Islands.length; k++) {
                if (huge.Islands[k].Placement[0] === i && huge.Islands[k].Placement[1] === j) {
                    foundIsland = true;
                    break;
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
  event.stopPropagation();
// Vérifie si l'élément est la poubelle
var poubelle = document.getElementById("poubelle");
    if (event.target === poubelle) {
        event.dataTransfer.dropEffect = "move"; // Indique que le glisser-déposer est autorisé
    }
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
  if (event.target.getElementsByTagName("img").length > 0) {
    return; // Interrompt le processus de dépôt si une image est déjà présente
  }


  var data = event.dataTransfer.getData("text");
  var img = document.getElementById(data);
  var cloneImg = img.cloneNode(true); // clone l'image


  var newId;
  if (img.parentNode.classList.contains("source-table")) {
    newId = "clone_" + Math.floor(Math.random() * 10000); // attribuer un id unique au clone
    cloneImg.id = newId;
  } else {
    newId = img.id;
  }
  cloneImg.style.position = "absolute";
cloneImg.style.top = "50%";
cloneImg.style.left = "50%";
cloneImg.style.width = "90%";
cloneImg.style.height = "90%";
cloneImg.style.objectFit = "cover";
cloneImg.style.transform = "translate(-50%, -50%)";


if (img.parentNode.classList.contains("source-table")) {
    event.target.appendChild(cloneImg); // ajoute le clone à la nouvelle cellule
} else {
    event.target.appendChild(img); // déplace l'image si elle ne provient pas du tableau HTML
    img.style.position = "absolute";
    img.style.top = "50%";
    img.style.left = "50%";
    img.style.width = "90%";
    img.style.height = "90%";
    img.style.objectFit = "cover";
    img.style.transform = "translate(-50%, -50%)";
}



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


  // Recherche l'index de l'île correspondante dans huge.Islands en fonction de l'ID de l'image
  var islandIndex = huge.Islands.findIndex(function(island) {
    return island.id === newId;
  });


  // Si l'île est trouvée, met à jour sa position
  if (islandIndex !== -1) {
    huge.Islands[islandIndex].Placement = [rowIndex, cellIndex];
  } else {
    // Crée un nouvel objet île avec les informations de position et de liens
    var links = getLinksFromImageId(data);
    var island = {
      id: newId,
      Placement: [rowIndex, cellIndex],
      links: links
    };
    huge.Islands.push(island);
  }


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
var url = "createmod.php?rows=" + encodeURIComponent(rows) + "&columns=" + encodeURIComponent(columns) + "&pixelArt=" + encodeURIComponent(pixelArt) + "&nbiles=" + encodeURIComponent(iles);

window.location.href = url;
}

var poubelle = document.getElementById("poubelle");
poubelle.addEventListener("drop", dropOnImage);
poubelle.addEventListener("dragover", allowDrop);



</script>

<?php
// Récupérer les paramètres de l'URL
if(isset($_GET['rows']) && isset($_GET['columns']) && isset($_GET['pixelArt']) && isset($_GET['nbiles'])){
$rows = $_GET['rows'];
$columns = $_GET['columns'];
$pixelArt = $_GET['pixelArt'];
$nbiles = $_GET['nbiles'];

echo "Nombre de lignes : " . $rows . "<br>";
echo "Nombre de colonnes : " . $columns . "<br>";
echo "Pixel art : " . $pixelArt . "<br>";
echo "Nombre d'îles : " . $nbiles . "<br>";
}
//$command = 'MartinS.exe'. ' '. $rows . ' ' . $columns . ' ' . $nbiles . ' ' . $pixelArt;
//$output = exec($command);
?>

            <div class="martinplace">
                <img class="martin" src="image/martin1.png">
            </div>
         </div> 
         </div> 
        </div>
        <!-- on ajoute une poubelle pour pouvoir drag and drop pour degager les images -->
        <div id="poubelle" class="poubelle">
    <img class="poubelle" src="../WEB/image/button/TRASH.png">
</div>


<script>
// Obtenir la référence de l'élément poubelle
var trashBin = document.getElementById('poubelle');
// Autoriser le dépôt sur la poubelle
trashBin.addEventListener('dragover', function(event) {
    event.preventDefault(); // nécessaire pour permettre le drop
});

// Gérer le dépôt sur la poubelle
trashBin.addEventListener('drop', function(event) {
    event.preventDefault(); // empêche le navigateur d'ouvrir l'image
    var id = event.dataTransfer.getData("text"); // obtenir l'id de l'image déplacée
    var element = document.getElementById(id); // obtenir la référence de l'image
    element.parentNode.removeChild(element); // supprimer l'image du DOM


    // Recherche l'index de l'île correspondante dans huge.Islands en fonction de l'ID de l'image
    var islandIndex = huge.Islands.findIndex(function(island) {
      return island.id === id;
    });


    // Si l'île est trouvée, la supprime de huge.Islands
    if (islandIndex !== -1) {
      huge.Islands.splice(islandIndex, 1);
    }
});


</script>



    </main>
</body>

</html>
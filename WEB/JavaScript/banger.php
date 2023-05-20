
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
$command = 'MartinG2.exe';

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
    generate_table_no_solution(rows, columns);

</script>



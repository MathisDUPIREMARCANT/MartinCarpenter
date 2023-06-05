<main>
    <div class="cont">
        <div class="user">
            <img class="imgmartin" src="../image/button/martin.png" alt="">
        </div>
    </div>
    <div class="cont2">
        <div class="Compte">
            <?php 
            foreach($resultat as $row){?>
            <div class="name">
                <?php echo $row["username"] ?>
            </div>
            <div class="line">
                Personal Best: <?php echo $row["score"] ?>
                <br>
                Email : <?php echo $row["email"] ?>
            </div>
            <div class="logout">
                <a class="textlogout" href=" ../logout.php">Logout
                </a>
            </div>
        </div>

        <?php
            };
            ?>

        <div class="classement">
            <div class="compte">
                Leader Board:
            </div>
            <div class="list">
                <?php   

                           
                           $stmt = $conn->query($sql);

                        // Récupération des résultats dans un tableau
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Vérification des résultats de la requête
                        if (count($results) > 0) {
                            // Affichage des données dans un tableau HTML
                           
                            echo "
                            <div class='line2'>";
                            
                            // Parcourir les résultats et afficher les données
                            $i=1;
                            foreach ($results as $row) {
                                echo $i.".         ". $row["username"]."  ";
                                echo $row["score"]."  ";
                                echo "<br>";
                                $i++;
                            }
                            
                         
                        } else {
                            echo "Aucun résultat trouvé.";
                        }
                           
                        ?>
                </table>

                </ul>
            </div>
        </div>
        <div class="down">
            slide down ↓
        </div>
    </div>

</main>
</body>

</html>
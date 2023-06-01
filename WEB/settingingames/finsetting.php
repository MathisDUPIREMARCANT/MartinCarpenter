<label> Game board color choice : </label>
<select class="choice" name="Choixtheme">
    <option value="bleu" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="bleu"){ echo"selected";}?>>
        Bleu(couleur par défaut)
    </option>

    <option value="rouge" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="rouge"){ echo"selected";}?>>
        Rouge</option>
    <option value="orange"
        <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="orange"){ echo"selected";}?>>Orange</option>
    <option value="jaune" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="jaune"){ echo"selected";}?>>
        Jaune</option>
    <option value="vert" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="vert"){ echo"selected";}?>>
        Vert</option>

    <option value="violet"
        <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="violet"){ echo"selected";}?>>Violet</option>
    <option value="rose" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="rose"){ echo"selected";}?>>
        Rose</option>
    <option value="gris" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="gris"){ echo"selected";}?>>
        Gris</option>
</select>
<?php
if(isset($_COOKIE['Colorgame'])){
    echo"<div class='color'> The color of the game grid has been changed to $_COOKIE[Colorgame]! </div>";
}
    ?><br>
<div class="ch2">
    <label> Button color choice : </label><br> <select class="choice2" name="ChoiceButton">
        <option value="bleu"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="bleu"){ echo"selected";}?>>Bleu(couleur
            par défaut)
        </option>
        <option value="rouge"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="rouge"){ echo"selected";}?>>Rouge
        </option>
        <option value="orange"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="orange"){ echo"selected";}?>>Orange
        </option>
        <option value="jaune"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="jaune"){ echo"selected";}?>>Jaune
        </option>
        <option value="vert"
            <?php if(isset($_COOKIE['ColorButton'])&& $_COOKIE['ColorButton'] =="vert"){ echo"selected";}?>>Vert
        </option>

        <option value="violet"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="violet"){ echo"selected";}?>>Violet
        </option>
        <option value="rose"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="rose"){ echo"selected";}?>>Rose
        </option>
        <option value="gris"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="gris"){ echo"selected";}?>>Gris
        </option>
    </select>

    <?php
if(isset($_COOKIE['ColorButton'])){
    echo"<div class='color'> The color of the button has been changed to $_COOKIE[ColorButton]! </div>";
}
    ?>
    <input type="submit" class="button" name="theme" Value="Appliquer" />
    </form>
</div>
</div>
</div>
<div class="Credit">
    Credit: CHTI'MI - SAINT-MAXENT Juliette - CLAUS Damia - DUPIRE-MARCANT Mathis - TASSIN Clément - LEMOINE James -
    VANDEVOIR Victor
</div>
</main>
</body>
<label> Game board color choice : </label>
<select class="choice" name="Choixtheme">
    <option value="blue" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="blue"){ echo"selected";}?>>
        Blue(default color)
    </option>

    <option value="red" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="rouge"){ echo"selected";}?>>
        Red</option>
    <option value="orange"
        <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="orange"){ echo"selected";}?>>Orange</option>
    <option value="yellow" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="jaune"){ echo"selected";}?>>
        Yellow
    </option>
    <option value="green" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="vert"){ echo"selected";}?>>
        Green</option>

    <option value="purple"
        <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="violet"){ echo"selected";}?>>Purple</option>
    <option value="pink" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="rose"){ echo"selected";}?>>
        Pink</option>
    <option value="grey" <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['Colorgame']=="gris"){ echo"selected";}?>>
        Grey</option>
</select>
<?php
if(isset($_COOKIE['Colorgame'])){
    echo"<div class='color'> The color of the game grid has been changed to $_COOKIE[Colorgame]! </div>";
}
    ?><br>
<div class="ch2">
    <label> Button color choice : </label><br> <select class="choice2" name="ChoiceButton">
        <option value="blue"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="blue"){ echo"selected";}?>>
            Blue(default color)
        </option>

        <option value="red"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="rouge"){ echo"selected";}?>>
            Red</option>
        <option value="orange"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="orange"){ echo"selected";}?>>Orange
        </option>
        <option value="yellow"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="jaune"){ echo"selected";}?>>
            Yellow
        </option>
        <option value="green"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="vert"){ echo"selected";}?>>
            Green</option>

        <option value="purple"
            <?php if(isset($_COOKIE['Colorgame']) && $_COOKIE['ColorButton']=="violet"){ echo"selected";}?>>Purple
        </option>
        <option value="pink"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="rose"){ echo"selected";}?>>
            Pink</option>
        <option value="grey"
            <?php if(isset($_COOKIE['ColorButton']) && $_COOKIE['ColorButton']=="gris"){ echo"selected";}?>>
            Grey</option>
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
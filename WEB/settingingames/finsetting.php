<label> Game board color choice : </label>
<select class="choice" name="Choixtheme">
    <option value="">Choose color ↓</option>
    <option value="rouge">Rouge</option>
    <option value="orange">Orange</option>
    <option value="jaune">Jaune</option>
    <option value="vert">Vert</option>
    <option value="bleu">Bleu(couleur par défaut)</option>
    <option value="violet">Violet</option>
    <option value="rose">Rose</option>
    <option value="gris">Gris</option>
</select>
<?php
if(isset($_COOKIE['Colorgame'])){
    echo"<div class='color'> The color of the game grid has been changed to $_COOKIE[Colorgame]! </div>";
}
    ?><br>
    <div  class="ch2">
<label> Button color choice : </label><br> <select class="choice2" name="ChoiceButton">
    <option value="">Choose color ↓</option>
    <option value="rouge">Rouge</option>
    <option value="orange">Orange</option>
    <option value="jaune">Jaune</option>
    <option value="vert">Vert</option>
    <option value="bleu">Bleu(couleur par défaut)</option>
    <option value="violet">Violet</option>
    <option value="rose">Rose</option>
    <option value="gris">Gris</option>
</select>

<?php
if(isset($_COOKIE['ColorButton'])){
    echo"<div class='color'> The color of the button has been changed to $_COOKIE[ColorButton]! </div>";
}
    ?>
<input type="submit" class="button"  name="theme" Value="Appliquer" />
</form>
</div>
</div>
</div>
<div class="Credit">
    Credit:
</div>
</main>
</body>
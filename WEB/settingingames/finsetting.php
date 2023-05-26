<label> Game board color choice : </label>
<select name="Choixtheme">
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
<input type="submit" class="bouton" id="bouton" name="theme" Value="Appliquer" />
</form>
<?php
if(isset($_COOKIE['Colorgame'])){
    echo"<div class='color'> The color of the game grid has been changed to $_COOKIE[Colorgame]! </div>";
}
    ?>
</div>
<div class="Credit">
    Credit:
</div>
</main>
</body>
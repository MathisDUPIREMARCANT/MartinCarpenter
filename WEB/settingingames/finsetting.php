<label> Game board color choice : </label>
<select name="Choixtheme">
    <option value="">Choose color ↓</option>
    <option value="orange">Mercure (Orange)</option>
    <option value="vert">Venus (Vert)</option>
    <option value="bleu">Terre (Bleu)</option>
    <option value="rouge">Mars (Rouge)</option>
    <option value="jaune">Jupiter (Jaune)</option>
    <option value="violet">Saturne (Violet par defaut)</option>
    <option value="marron">Uranus (Marron)</option>
    <option value="gris">Neptune (Gris)</option>
</select>
<input type="submit" class="bouton" id="bouton" name="theme" Value="Appliquer" />
</form>
<?php
if(isset($_COOKIE['Colorgame'])==true){
    echo"<div class='color'> The color of the game grid has been changed to $_COOKIE[Colorgame]! </div>";
}
    ?>
</div>
<div class="Credit">
    Credit:
</div>
</main>
</body>
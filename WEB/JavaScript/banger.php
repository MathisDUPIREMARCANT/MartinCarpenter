
<?php
$command = 'MartinG.exe';

$output = exec($command);
echo $output;
?>
<?php
$texte_php = $output;
$texte_js = json_encode($texte_php);
?>
<!-- on affiche le texte js avec du JS -->
<script type="text/javascript">
    var texte_js = <?php echo $texte_js; ?>;
    alert(texte_js);
</script>


<?php
require VUES.'/backoffice/shared.php';
echo $header;
?>

<section>
    <a href="<?php echo getLink(["backoffice"]); ?>">Retour</a>
    <h1><span>EventEase</span> - Modifier les <?php echo $text['fullname']; ?></h1>
</section>

<?php
if(!empty($message)) {
    echo '<div id="message"><p>'.$message.'</p></div>';
}
?>

<section>
    <h2>Utilisation des balises :</h2>
    <ul>
        <li>Titre de niveau 1 : <pre>[h1]Titre[/h1]</pre></li>
        <li>Titre de niveau 2 : <pre>[h2]Titre[/h2]</pre></li>
        <li>Titre de niveau 3 : <pre>[h3]Titre[/h3]</pre></li>
        <li>Texte en gras : <pre>[strong]Texte en gras[/strong]</pre></li>
        <li>Paragraphe : <pre>[p]Texte en gras[/p]</pre></li>
        <li>Retour à la ligne dans un paragraphe : <pre>[br /]</pre></li>
        <li>Liste à puces : <pre>
[ul]
    [li]élément 1[/li]
    [li]élément 2[/li]
[/ul]
        </pre></li>
    </ul>
</section>

<form method="post" action="<?php echo getLink(['backoffice','editBoringTexts',$text['name']])?>">
    <textarea name="value"><?php echo $text['value']; ?></textarea>
    <div class="submit-row"><input type="submit" /></div>
</form>


<?php
echo $footer;
?>

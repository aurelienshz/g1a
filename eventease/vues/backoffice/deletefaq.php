<?php
require VUES.'/backoffice/shared.php';
echo $header;
?>

<section>
    <a href="<?php echo getLink(["backoffice"]); ?>">Retour</a>
    <h1><span>EventEase</span> - Suppression d'une entrée de la FAQ</h1>
</section>

<?php
if(!empty($message)) {
    echo '<section><p>'.$message.' - <a href="'.getLink(["backoffice"]).'">Retour</a></p></section>';
}
?>

<?php
echo $footer;
?>

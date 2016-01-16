<?php
require VUES.'/backoffice/shared.php';
echo $header;
?>

<section>
    <a href="<?php echo getLink(["backoffice"]); ?>">Retour</a>
    <h1><span>EventEase</span> - Modifier la FAQ</h1>
</section>

<?php
if(!empty($message)) {
    echo '<div id="message"><p>'.$message.'</p></div>';
}
?>

<form method="post" action="<?php echo getLink(['backoffice','editfaq',$post['id']])?>">
    <label for="question">Question :</label>
    <input type="text" name="question" id="question" value="<?php echo $post['question']; ?>" />
    <label for="reponse">Réponse :</label>
    <textarea name="reponse" id="reponse"><?php echo $post['reponse']; ?></textarea>
    <div class="submit-row"><input type="submit" /></div>
</form>


<?php
echo $footer;
?>

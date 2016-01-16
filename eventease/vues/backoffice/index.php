<?php
require VUES.'/backoffice/shared.php';
echo $header;
?>
<section>
    <a href="<?php echo getLink(["accueil"]); ?>">Retour au site public</a>
    <h1><span>EventEase</span> - Administration</h1>
</section>
<?php
if(!empty($message)) {
    echo '<div id="message"><p>'.$message.'</p></div>';
}
?>

<section>
    <h2>Page d'accueil</h2>
    <form method="post" action="<?php echo getLink(['backoffice']); ?>">
        <div class="row"><label for="catchphrase">Slogan principal</label><input name="catchphrase" id="catchphrase" value="<?php echo $catchPhrases[0]; ?>" /></div>
        <div class="row"><label for="subcatchphrase">Slogan secondaire</label><input name="subcatchphrase" id="subcatchphrase" value="<?php echo $catchPhrases[1]; ?>" /></div>
        <div class="submit-row"><input type="submit" value="Modifier" /></div>
    </form>
    <form method="post" action="<?php echo getLink(['backoffice']); ?>" enctype="multipart/form-data">
        <div class="row"><label for="background">Image d'arrière-plan</label><input name="background" id="background" type="file"/></div>
        <div class="submit-row"><input type="submit" value="Modifier" /></div>
    </form>
</section>
<section>
    <h2>CGV & Mentions légales</h2>
    <ul>
        <li><a href="<?php echo getLink(['backoffice','editBoringTexts','cgv']); ?>">Modifier les CGU</a></li>
        <li><a href="<?php echo getLink(['backoffice','editBoringTexts','legal']); ?>">Modifier les mentions légales</a></li>
        <li><a href="<?php echo getLink(['backoffice','editBoringTexts','about']); ?>">Modifier la page "A propos"</a></li>
    </ul>
</section>
<section>

    <h2>FAQ</h2>
    <ul id="faq-list">
        <?php
            foreach ($faqPosts as $post) {
                echo '<li>'.$post["question"].'<span class="faq-action"><a href="#">Modifier</a> - <a href="#">Supprimer</a></span></li>';
            }
        ?>
    </ul>
</section>

<?php
echo $footer;

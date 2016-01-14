<?php
require VUES.'/backoffice/shared.php';
echo $header;
?>

<h1><span>EventEase</span> - Administration</h1>

    <?php
    if(!empty($message)) {
        echo '<div id="message"><p>'.$message.'</p></div>';
    }
    ?>

    <div class="category">
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
    </div>
    <div class="category">
        <h2>CGV & Mentions légales</h2>
        <ul>
            <li><a href="<?php echo getLink(['backoffice','editBoringTexts','CGV']); ?>">Modifier les CGV</a></li>
            <li><a href="<?php echo getLink(['backoffice','editBoringTexts','legal']); ?>">Modifier les mentions légales</a></li>
        </ul>
    </div>
    <div class="category">

        <h2>FAQ</h2>
        <ul id="faq-list">
            <li>Comment faire pour x ? <span class="faq-action"><a href="#">Modifier</a> - <a href="#">Supprimer</a></span></li>
            <li>Comment faire pour xxxx ? <span class="faq-action"><a href="#">Modifier</a> - <a href="#">Supprimer</a></span></li>
        </ul>
    </div>

<?php
echo $footer;

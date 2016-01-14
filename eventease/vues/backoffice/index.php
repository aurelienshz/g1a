<?php
require VUES.'/backoffice/shared.php';
echo $header;
?>

<h1><span>EventEase</span> - Administration</h1>


    <div class="category">
        <h2>Page d'accueil</h2>
        <form>
            <div class="row"><label>Slogan principal</label><input /></div>
            <div class="row"><label>Slogan secondaire</label><input /></div>
            <div class="submit-row"><input type="submit" value="Modifier" /></div>
        </form>
        <form>
            <div class="row"><label>Image d'arrière-plan</label><input type="file"/></div>
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

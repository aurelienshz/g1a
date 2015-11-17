<?php
/**** VUE : ACCUEIL ****/
?>

<section id="bigform">
<p id="catchphrase">200ème commit \o/</p>
<p id="subcatchphrase">Bonjour !</p>
    <form method="post" action="">
        <input type="text" placeholder="Texte"/><!--
     --><select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select><!--
     --><select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select><!--
     --><input type="submit" value="Rechercher"/>
    </form>
    <div id="createButtonContainer">
        <a href="<?php echo getLink(['events','create']); ?>">
            <div id="createButton">Créer un évènement</div>
        </a>
    </div>
</section>

<div class="wrapper">
<h4>Suggestions</h4>
    <section id="suggestions" class="row">
        <div class="slideshowDefilement">&lt;</div>
        <div class="imageContainer"><img src="<?php echo IMAGES.'picnic1.jpg'?>" /></div>
        <div class="eventDetails">
            <div id="typeSuggestion"><?php echo $contents['natureSuggestion'];?></div>
            <h5><?php echo $contents['titreSuggestion']; ?></h5>
            <div id="infosPratiques">
                <p></p>
                <span class="fa fa-calendar"></span><p><?php echo $contents['dateSuggestion']; ?></p>
                <span class="fa fa-tag"></span><p><?php echo $contents['typeSuggestion']; ?></p>
                <span class="fa fa-map-marker"></span><p><?php echo $contents['lieuSuggestion']; ?></p>
            </div>
            <p id="eventDescription">
                <?php echo $contents['descriptionSuggestion']; ?>
            </p>
        </div>
        <div class="slideshowDefilement">&gt;</div>
    </section>

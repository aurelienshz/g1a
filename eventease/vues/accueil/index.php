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
            <div id="typeSuggestion">Une idée...</div>
            <h5>Pique-nique au lac</h5>
            <div id="infosPratiques">
                <p></p>
                <span class="fa fa-calendar"></span><p>Demain</p>
                <span class="fa fa-tag"></span><p>Pique-nique</p>
                <span class="fa fa-map-marker"></span><p>Paris</p>
            </div>
            <p id="eventDescription">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="slideshowDefilement">&gt;</div>
    </section>

<?php
/**** VUE : ACCUEIL ****/
?>

<section id="bigform">
<p id="catchphrase">Enjoy events with ease !</p>
<p id="subcatchphrase">Trouvez et participez aux évènements qui vous correspondent</p>
    <form method="post" action="<?php echo getLink(['events','search']); ?>">
        <select name="searchType">
            <option>Mots-clés...</option>
            <option>Près de...</option>
            <option>Prochainement...</option>
        </select><!--
     --><input name="searchValue" class="champCentral" type="text" placeholder="Mots-clés"/><!--
     --><input name="searchValue" class="champCentral google-autocomplete-address" type="text" placeholder="Adresse" style="display:none;"/><!--
     --><input name="searchValue" class="champCentral" type="date" placeholder="Date" style="display:none;"/><!--
     --><input type="submit" value="Rechercher"/>
    </form>
    <div id="createButtonContainer">
        <a class="button" id="createButton" href="<?php echo getLink(['events','create']); ?>">
            Créer un évènement
        </a>
    </div>
</section>

<div class="wrapper">
<h4>Suggestions</h4>
    <section id="suggestions">
        <div>
            <div class="previous">&lt;</div>
            <div class="imageContainer">
              <a href="<?php echo getLink(['events','display']); ?>">
              <img src="<?php echo IMAGES.'picnic1.jpg'?>" />
              </a>
            </div>
            <div class="eventDetails">
                <div id="typeSuggestion">Une idée...</div>
                <h5><?php echo $contents['titreSuggestion']; ?></h5>
                <div id="infosPratiques">
                    <p></p>
                    <span class="fa fa-calendar"></span><p><?php echo $contents['dateSuggestion']; ?></p>
                    <span class="fa fa-tag"></span><p><?php echo $contents['typeSuggestion']; ?></p>
                    <span class="fa fa-map-marker"></span><p><?php echo $contents['lieuSuggestion']; ?></p>
                </div>
                <p id="eventDescription">
                    Lorem Ipsum
                </p>
            </div>
            <div class="next">&gt;</div>
        </div>
        <div>
            <div class="previous">&lt;</div>
            <div class="imageContainer">
              <a href="<?php echo getLink(['events','display']); ?>">
              <img src="<?php echo IMAGES.'picnic1.jpg'?>" />
              </a>
            </div>
            <div class="eventDetails">
                <div id="typeSuggestion">Près de vous...</div>
                <h5>Afterwork ISEP</h5>
                <div id="infosPratiques">
                    <p></p>
                    <span class="fa fa-calendar"></span><p>Jeudi 10 décembre</p>
                    <span class="fa fa-tag"></span><p>Soirée</p>
                    <span class="fa fa-map-marker"></span><p>Issy-les-Moulineaux</p>
                </div>
                <p id="eventDescription">
                    Description...
                </p>
            </div>
            <div class="next">&gt;</div>
        </div>
        <div>
            <div class="previous">&lt;</div>
            <div class="imageContainer">
              <a href="<?php echo getLink(['events','display']); ?>">
              <img src="<?php echo IMAGES.'picnic1.jpg'?>" />
              </a>
            </div>
            <div class="eventDetails">
                <div id="typeSuggestion">Bientôt...</div>
                <h5><?php echo $contents['titreSuggestion']; ?> 3</h5>
                <div id="infosPratiques">
                    <p></p>
                    <span class="fa fa-calendar"></span><p>Demain</p>
                    <span class="fa fa-tag"></span><p>Pique-Nique</p>
                    <span class="fa fa-map-marker"></span><p>Paris</p>
                </div>
                <p id="eventDescription">
                    Ipsum Lorem
                </p>
            </div>
            <div class="next">&gt;</div>
        </div>
    </section>
</div> <!-- /wrapper -->

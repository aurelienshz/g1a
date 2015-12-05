<?php
/**** VUE : ACCUEIL ****/
?>

<section id="bigform">
<p id="catchphrase">Trouvez l'événement qu'il vous faut</p>
<p id="subcatchphrase">En toute simplicité !</p>
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
                <div id="typeSuggestion"><?php echo $contents['natureSuggestion'];?></div>
                <h5><?php echo $contents['titreSuggestion']; ?> 1</h5>
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
                <div id="typeSuggestion"><?php echo $contents['natureSuggestion'];?></div>
                <h5><?php echo $contents['titreSuggestion']; ?> 2</h5>
                <div id="infosPratiques">
                    <p></p>
                    <span class="fa fa-calendar"></span><p><?php echo $contents['dateSuggestion']; ?></p>
                    <span class="fa fa-tag"></span><p><?php echo $contents['typeSuggestion']; ?></p>
                    <span class="fa fa-map-marker"></span><p><?php echo $contents['lieuSuggestion']; ?></p>
                </div>
                <p id="eventDescription">
                    Description des familles.
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
                <div id="typeSuggestion"><?php echo $contents['natureSuggestion'];?></div>
                <h5><?php echo $contents['titreSuggestion']; ?> 3</h5>
                <div id="infosPratiques">
                    <p></p>
                    <span class="fa fa-calendar"></span><p><?php echo $contents['dateSuggestion']; ?></p>
                    <span class="fa fa-tag"></span><p><?php echo $contents['typeSuggestion']; ?></p>
                    <span class="fa fa-map-marker"></span><p><?php echo $contents['lieuSuggestion']; ?></p>
                </div>
                <p id="eventDescription">
                    Ipsum Lorem
                </p>
            </div>
            <div class="next">&gt;</div>
        </div>
    </section>
</div> <!-- /wrapper -->

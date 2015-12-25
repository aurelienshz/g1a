<?php
/**** VUE : ACCUEIL ****/
?>

<section id="bigform">
<p id="catchphrase">Enjoy events with ease !</p>
<p id="subcatchphrase">Trouvez et participez aux évènements qui vous correspondent</p>
    <form method="post" action="<?php echo getLink(['events','search']); ?>">
        <select name="searchType">
            <option value="keywords">Mots-clés...</option>
            <option value="place">Près de...</option>
            <option value="date">Prochainement...</option>
        </select><!--
     --><input name="searchKeywords" class="champCentral" type="text" placeholder="Mots-clés"/><!--
     --><input name="searchPlace" class="champCentral google-autocomplete-address" type="text" placeholder="Adresse" style="display:none;"/><!--
     --><input name="searchDate" class="champCentral" type="date" placeholder="Date" style="display:none;"/><!--
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
    <section id="suggestions" class="simple-slideshow">
        <div class="eventPreview shadow">
			<h4><a href=#>Réglage de la hauteur des boutons du slideshow</a></h4>
			<a href="<?php echo getLink(['events','display']); ?>">
				<img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-calendar"></span>Jamais</p>
				<p><span class="fa fa-tag"></span>Catégoriz cantonnais</p>
				<p><span class="fa fa-map-marker"></span>Où ?</p>
				<p><span class="fa fa-eur"></span>666 €</p>
				<p><span class="fa fa-child"></span>> 18ans</p>
			</div>
			<p class="description">Aurélien a bien travaillé sur la gestion de la hauteur des boutons de défilement.</p>
			<a class="button" href="#">Voir l'évènement</a>
			<div class="clearfix"></div>
		</div>
        <div class="eventPreview shadow">
			<h4><a href=#>Pique-nique -  Devant le palais du Luxembourg</a></h4>
			<a href="<?php echo getLink(['events','display']); ?>">
				<img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-calendar"></span>Demain</p>
				<p><span class="fa fa-tag"></span>Pique-Nique</p>
				<p><span class="fa fa-map-marker"></span>Paris</p>
				<p><span class="fa fa-eur"></span>10€ - 50€</p>
				<p><span class="fa fa-child"></span>> 18ans</p>
			</div>
			<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<a class="button" href="#">Voir l'évènement</a>
			<div class="clearfix"></div>
		</div>
        <div class="eventPreview shadow">
			<h4><a href=#>Pique-nique -  Devant le palais du Luxembourg</a></h4>
			<a href="<?php echo getLink(['events','display']); ?>">
				<img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-calendar"></span>Demain</p>
				<p><span class="fa fa-tag"></span>Pique-Nique</p>
				<p><span class="fa fa-map-marker"></span>Paris</p>
				<p><span class="fa fa-eur"></span>10€ - 50€</p>
				<p><span class="fa fa-child"></span>> 18ans</p>
			</div>
			<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<a class="button" href="#">Voir l'évènement</a>
			<div class="clearfix"></div>
		</div>
    </section>

</div> <!-- /wrapper -->

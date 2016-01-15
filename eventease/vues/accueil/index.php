<?php
/**** VUE : ACCUEIL ****/
?>

<section id="bigform">
<p id="catchphrase"><?php echo $contents['catchPhrases'][0]; ?></p>
<p id="subcatchphrase"><?php echo $contents['catchPhrases'][1]; ?></p>
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
        <div class="eventPreview">
			<h4><a href=#>Pique-nique -  Devant le palais du Luxembourg</a></h4>
			<a href="<?php echo getLink(['events','display']); ?>">
				<img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-calendar"></span>11/06/21016</p>
				<p><span class="fa fa-tag"></span>Pique-nique</p>
				<p><span class="fa fa-map-marker"></span>Jardin du Luxembourg, Paris</p>
				<p><span class="fa fa-eur"></span>Gratuit</p>
				<p><span class="fa fa-child"></span>> Tous ages</p>
			</div>
			<p class="description" style="min-height: 130px;">
			C'est la belle saison et il est temps d'en profiter ! Je vous propose un pique-nique devant le palais du Luxembourg, venez nombreux, et c'est pas grave si vous venez seul, ce sera l'occasion de faire de nouvelles rencontres.
			La seule règle : Amener de quoi manger ou boire.
			Pour savoir si c'est bien notre groupe, j'aurais un panneau "Le pique-nique c'est ici !". 
			</p>
			<a class="button" href="#">Voir l'évènement</a>
			<div class="clearfix"></div>
		</div>
		<div class="eventPreview">
			<h4><a href=#>Pique-nique (2) -  Devant le palais du Luxembourg</a></h4>
			<a href="<?php echo getLink(['events','display']); ?>">
				<img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-calendar"></span>11/06/21016</p>
				<p><span class="fa fa-tag"></span>Pique-nique</p>
				<p><span class="fa fa-map-marker"></span>15, bis Rue de Vaugirard, 75006 Paris</p>
				<p><span class="fa fa-eur"></span>Gratuit</p>
				<p><span class="fa fa-child"></span>> Tous ages</p>
			</div>
			<p class="description" style="min-height: 130px;">
			C'est la belle saison et il est temps d'en profiter ! Je vous propose un pique-nique devant le palais du Luxembourg, venez nombreux, et c'est pas grave si vous venez seul, ce sera l'occasion de faire de nouvelles rencontres.
			La seule règle : Amener de quoi manger ou boire.
			Pour savoir si c'est bien notre groupe, j'aurais un panneau "Le pique-nique c'est ici !". 
			</p>
			<a class="button" href="#">Voir l'évènement</a>
			<div class="clearfix"></div>
		</div>
		<div class="eventPreview">
			<h4><a href=#>Pique-nique (3) -  Devant le palais du Luxembourg</a></h4>
			<a href="<?php echo getLink(['events','display']); ?>">
				<img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-calendar"></span>11/06/21016</p>
				<p><span class="fa fa-tag"></span>Pique-nique</p>
				<p><span class="fa fa-map-marker"></span>15, bis Rue de Vaugirard, 75006 Paris</p>
				<p><span class="fa fa-eur"></span>Gratuit</p>
				<p><span class="fa fa-child"></span>> Tous ages</p>
			</div>
			<p class="description" style="min-height: 130px;">
			C'est la belle saison et il est temps d'en profiter ! Je vous propose un pique-nique devant le palais du Luxembourg, venez nombreux, et c'est pas grave si vous venez seul, ce sera l'occasion de faire de nouvelles rencontres.
			La seule règle : Amener de quoi manger ou boire.
			Pour savoir si c'est bien notre groupe, j'aurais un panneau "Le pique-nique c'est ici !". 
			</p>
			<a class="button" href="#">Voir l'évènement</a>
			<div class="clearfix"></div>
		</div>
    </section>

</div> <!-- /wrapper -->

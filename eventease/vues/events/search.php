<!-- <div id="searchToolbar" class="wrapper">
	<span>XX résultats trouvés</span>
	<div class="tri">
		Trier par :
		<select>
			<option>Nom</option>
			<option>Date</option>
			<option>Tarif</option>
			<option>Durée</option>
			<option>Lieu</option>
		</select>
	</div>
</div> -->
<div class="wrapper">

	<?php
	if(isset($_GET['feature']) && $_GET['feature']=='list') {
		echo '<a href="'.getLink(['events','search']).'" class="button" id="openForm">Recherche avancée</a>';
	}
	?>

	<!-- Barre latérale de sélection des filtres -->
	<div class="sidebar">
		Type d'activité :
		<form>
			<label><input name="categorie" type="radio" value="0" />Test</label><br />
			<label><input name="categorie" type="radio" value="0" />Test</label><br />
			<label><input name="categorie" type="radio" value="0" />Test</label><br />
			<label><input name="categorie" type="radio" value="0" />Test</label><br />
			<label><input name="categorie" type="radio" value="0" />Test</label><br />
		</form>
	</div>

	<div class="results">
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
		</div>
		
	</div>
</div>

<!--
		<div class="resultBox shadow">
			<div class="table">
				<div class="imageEvent">
					<a href=#><img class="eventContainer" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>"></a>
				</div>
				<div class="infoEvent">
					<div class="eventContainer">
						<p class="boldInfo"><span>24/08/2016 à 12h30 - Jardin du Luxembourg, Paris</span> <span class="floatRight"> Gratuit - Ouvert à tous</span></p>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu eros quis turpis pellentesque semper. Nulla et faucibus ipsum. Cras accumsan magna vehicula tempus luctus.</p>
						<p class="floatRight"> En Savoir plus </p>
					</div>
				</div>
			</div>
		</div> -->

<!--
		<div class="eventPreview">
			<div class="imageContainer">
			  <a href="<?php echo getLink(['events','display']); ?>">
			  <img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			  </a>
			</div>
			<div class="eventDetails">
				<h5>Résultat de recherche</h5>
				<div id="infosPratiques">

				</div>
				<p id="eventDescription">
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.
					Lorem Ipsum description coucou évènement description ispeum.

				</p>
			</div>
		</div>
	-->

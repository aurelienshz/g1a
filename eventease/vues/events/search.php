
<div class="wrapper">

<?php
	if(isset($_GET['feature']) && $_GET['feature']=='list') {
		echo '<a href="'.getLink(['events','search']).'" class="button" id="openForm">Recherche avancée</a>';
	}
?>

	<!-- Barre latérale de sélection des filtres -->
	<div class="sidebar">
		<div style="display:none;" class="tri">
		<h3>Trier</h3>
			Trier par :
			<select>
				<option>Pertinence</option>
				<option>Nom</option>
				<option>Date</option>
				<option>Tarif</option>
				<option>Durée</option>
				<option>Lieu</option>
			</select>
		</div>
		<h3>Filtrer</h3>
		<h5>Type</h5>
		<div class="filter filter-type filter-type-all selected">Tous</div>
		<?php foreach($contents['types'] as $type) {
			echo '<div class="filter filter-type">'.$type.'</div>';
		}
		?>

		<h5>Date & heure</h5>
		<div class="filter filter-date filter-date-all selected">Tous</div>
		<div class="filter filter-date">Aujourd'hui</div>
		<div class="filter filter-date">Demain</div>
		<div class="filter filter-date">Ce mois-ci</div>

		<h5>Tarif</h5>
		<div class="filter filter-price filter-price-all selected">Tous</div>
		<div class="filter filter-price">0 - 10 €</div>
		<div class="filter filter-price">10 - 50 €</div>
		<div class="filter filter-price">> 50 €</div>
	</div>

	<div class="results">

<?php
if(isset($contents['searchResults'])) {
	foreach($contents['searchResults'] as $event) { ?>

		<div class="eventPreview shadow">
			<h4><a href="<?php echo getLink(['events','display',$event['id']]); ?>">
				<?php echo $event['titre']; ?>
			</a></h4>
			<a href="<?php echo getLink(['events','display',$event['id']]); ?>">
				<img src="<?php echo PHOTO_EVENT.$event['lien'];?>" />
			</a>
			<div class="infosPratiques">
				<p class="eventCategorie"><span class="fa fa-tag"></span><?php echo $event['type']; ?></p>
				<p class="eventDate"><span class="fa fa-calendar"></span><?php echo $event['debut']; ?></p>
				<p><span class="fa fa-map-marker"></span><?php echo $event['lieu']; ?></p>
				<?php
				if($event['tarif']) {
					echo '<p class="eventTarif"><span class="fa fa-eur"></span>'.$event['tarif'].' €</p>';
				}
				if($event['tranche_age']) {
					echo '<p><span class="fa fa-child"></span> '.$event['tranche_age'].'</p>';
				} ?>
			</div>
			<?php if(isset($event['description'])) {
				echo '<p class="description">'.$event['description'].'</p>';
			} ?>
			<a class="button" href="#">Voir l'évènement</a>
		</div>

<?php
	}
}
else {	// !isset($contents['searchResults'])
	echo '<p>Votre recherche n\'a renvoyé aucun résultat</p>';
}
?>


	</div>
	<div style="clear: both; width: 100%;"></div>
</div>

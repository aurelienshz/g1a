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
			QSDF
		</form>
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
				<p><span class="fa fa-tag"></span><?php echo $event['type']; ?></p>
				<p><span class="fa fa-calendar"></span><?php echo $event['debut']; ?></p>
				<p><span class="fa fa-map-marker"></span><?php echo $event['lieu']; ?></p>
				<?php
				if($event['tarif']) {
					echo '<p><span class="fa fa-eur"></span> '.$event['tarif'].' €</p>';
				}
				if($event['tranche_age']) {
					echo '<p><span class="fa fa-child"></span> '.$event['tranche_age'].'</p>';
				} ?>
			</div>
			<?php if(isset($event['description'])) {
				echo '<p class="description"> '.$event['description'].'</p>';
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
</div>

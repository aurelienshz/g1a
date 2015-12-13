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

<?php	foreach($contents['searchResults'] as $event) { ?>

		<div class="eventPreview shadow">
			<h4><a href=#><?php echo $event['titre']; ?></a></h4>
			<a href="<?php echo getLink(['events','display',$event['id']]); ?>">
				<img src="<?php echo IMAGES.'picnic1.jpg'?>" />
			</a>
			<div class="infosPratiques">
				<p><span class="fa fa-tag"></span><?php echo '[[type]]' ?></p>
				<p><span class="fa fa-calendar"></span><?php echo $event['debut']; ?></p>
				<p><span class="fa fa-map-marker"></span><?php echo '[[lieu]]'; ?></p>
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

<?php 	}		?>


	</div>
</div>

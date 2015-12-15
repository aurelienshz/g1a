<div class="wrapper prettyform shadow">
	<div class="title-wrapper">
		<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
		<h2><i class="fa fa-search"></i> Chercher un événement</h2>
		<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
	</div>
	<form method="post" action="<?php echo getLink(['events','search']); ?>">
		<!--
		Je note mon délire avant d'aller dodo :
			- recherche keywords et lieu => champs de recherche
			- type, tarif, date => filtres sidebar
		-->
		<label for="keywords">Mots-clés : </label><input type="search" name="keywords" id="keywords" placeholder="ex : Concert de Madonna">
		<!-- <label for="date">Date : </label> <input type="date" name="date" id="date"/> -->
		<!-- <label for="lieu">Lieu : </label><input type="search" name="lieu" id="lieu" placeholder="ex: Stade de France" class="google-autocomplete-address"/> -->
		<!-- <label>Tarif :</label> -->
		<!-- De <input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> € à
			<input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> € -->
		<div class="buttons">
			<input type="submit" value="Chercher" />
			<a href="<?php echo getLink(['events','search','list']); ?>" class="button">Tous les évènements</a>
		</div>
	</form>
	<div class="tabs">
		<div class="tab" id="tab-events">Chercher un événement</div>

		<div class="tab" id="tab-users"><a href="#"><p>Chercher un utilisateur</p></a></div>
	</div>
</div>

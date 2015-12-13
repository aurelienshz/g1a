<div class="wrapper prettyform">
	<div class="shadow">
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
			<div class="ligne">
				<div class="champ">
					<label for="évènement">Mots-clés : </label><input type="search" name="évènement" id="évènement" placeholder="ex : Concert de Madonna">
				</div>
				<div class="champ">
					<label for="date">Date : </label> <input type="date" name="date" id="date"/>
				</div>
				<div class="champ">
					<label for="lieu">Lieu : </label><input type="search" name="lieu" id="lieu" placeholder="ex: Stade de France" class="google-autocomplete-address"/>
				</div>
			</div>
			<div class="ligne">
				<div class="champ">
					<label for="type">Type :</label>
					<select id="type" name"type">
						<option>Pique-Nique</option>
						<option>Brocante</option>
						<option>Concert</option>
						<option>Vente privée</option>
						<option>Cours de cuisine</option>
						<option>Cours de danse</option>
						<option>Cours de musique</option>
						<option>Dégustation</option>
						<option>Oenologie</option>
						<option>Exposition</option>
					</select>
				</div>
				<div class="champ">
					<label>Tarif :</label>
					De <input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> € à
					<input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> €
				</div>
			</div>
			<input type="submit" value="Chercher" />
			<a href="<?php echo getLink(['events','search','list']); ?>" class="button">Lister tous les évènements</a>
		</form>
		<div class="tabs">
			<div class="tab" id="tab-events">Chercher un événement</div>

			<div class="tab" id="tab-users"><a href="#"><p>Chercher un utilisateur</p></a></div>
		</div>
	</div>
</div>

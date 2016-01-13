<div class="wrapper prettyform shadow">
	<div class="title-wrapper">
		<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
		<h2><i class="fa fa-search"></i> Chercher un évènement</h2>
		<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
	</div>
	<form method="post" action="<?php echo getLink(['events','search']); ?>">
		<fieldset>
			<legend>Rechercher</legend>
			<label for="keywords">Mots-clés : </label><input type="search" name="keywords" id="keywords" placeholder="ex : Concert de Madonna">
		</fieldset>
		<fieldset id="criteres">
		<legend>Rechercher sur</legend>
			<div class="row">
				<div class="champ"><input type="checkbox" checked name="criteres_all" />		<label>Tous</label>				</div>
				<div class="champ"><input type="checkbox" name="criteres_nom" />				<label>Nom</label>				</div>
				<div class="champ"><input type="checkbox" name="criteres_lieu" />				<label>Lieu</label>				</div>
				<div class="champ"><input type="checkbox" name="criteres_description" />		<label>Description</label>		</div>
				<div class="champ"><input type="checkbox" name="criteres_type" />				<label>Type</label>				</div>
			</div>
		</fieldset>
		<div class="buttons">
			<input type="submit" value="Chercher" />
			<a href="<?php echo getLink(['events','search','list']); ?>" class="button">Tous les évènements</a>
		</div>
	</form>
	<div class="tabs">
		<div class="tab" id="tab-events">Chercher un évènement</div>

		<div class="tab" id="tab-users"><a href="#"><p>Chercher un utilisateur</p></a></div>
	</div>
</div>

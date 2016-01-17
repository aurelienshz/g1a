<div class="wrapper prettyform shadow">
	<div class="title-wrapper">
		<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
		<h2><i class="fa fa-search"></i> Chercher un évènement</h2>
		<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
	</div>
	<form method="post" action="<?php echo getLink(['events','search']); ?>">
			<label for="keywords">Mots-clés : </label><input type="search" name="keywords" id="keywords" <?php echo isset($contents['previousSearch'])?'value="'.$contents['previousSearch'].'"':''; ?> placeholder="ex : Concert de Madonna">
			<div id="criteres">
				<h3>Chercher dans</h3>
				<div class="champ"><label><input type="checkbox" checked name="criteres_all" />		Tous</label>				</div>
				<div class="champ"><label><input type="checkbox" name="criteres_nom" />				Nom</label>				</div>
				<div class="champ"><label><input type="checkbox" name="criteres_lieu" />				Lieu</label>				</div>
				<div class="champ"><label><input type="checkbox" name="criteres_description" />		Description</label>		</div>
				<div class="champ"><label><input type="checkbox" name="criteres_type" />				Type</label>				</div>
			</div>
		<div class="buttons">
			<input type="submit" value="Chercher" />
			<a href="<?php echo getLink(['events','search','list']); ?>" class="button">Tous les évènements</a>
		</div>
	</form>
	<div class="tabs">
		<div class="tab" id="tab-events">Chercher un évènement</div>

		<div class="tab" id="tab-users"><a href="<?php echo getLink(['membres','search']); ?>"><p>Chercher un utilisateur</p></a></div>
	</div>
</div>

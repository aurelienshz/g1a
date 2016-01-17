<div class="wrapper prettyform shadow">
	<div class="title-wrapper">
		<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
		<h2><i class="fa fa-search"></i> Chercher un utilisateur</h2>
		<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
	</div>
	<form method="post" action="<?php echo getLink(['membres','search']); ?>">
			<label for="keywords">Mots-clés : </label><input type="search" name="keywords" id="keywords" <?php echo isset($contents['previousSearch'])?'value="'.$contents['previousSearch'].'"':''; ?> placeholder="Recherche">
			<div id="criteres">
				<h3>Chercher dans</h3>
				<div class="champ"><label><input type="checkbox" checked name="criteres_all" />		Tous</label>				</div>
                <div class="champ"><label><input type="checkbox" name="criteres_username" />				Nom d'utilisateur</label>				</div>
				<div class="champ"><label><input type="checkbox" name="criteres_email" />				Adresse mail</label>				</div>
			</div>
		<div class="buttons">
			<input type="submit" style="width:50%;" value="Chercher" />
		</div>
	</form>
	<div class="tabs">
		<div class="tab" id="tab-events"><a href="<?php echo getLink(['events','search']); ?>"><p>Chercher un évènement</p></a></div>

		<div class="tab" id="tab-users">Chercher un utilisateur</div>
	</div>
</div>

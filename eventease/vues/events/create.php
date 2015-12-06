<div class="wrapper createCalendar">
	<div class="shadow calendarBottom">
		<div class="titleWrapper">
			<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
			<h2><i class="fa fa-plus"></i> Créer un événement</h2>
			<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
		</div>
		<div id="formBox" class="calendarBottom">
	   		<form method="post" action="<?php getLink(['events','create']); ?>">
				<div class="ligne">
					<div class="champ">
						<label for="titre">Nom de l'événement <i class="fa fa-asterisk"></i> :</label>
						<input type="text" placeholder="Nom de l'événement" id="titre" name="titre" />
						<?php echo isset($contents['errors']['titre'])?$contents['errors']['titre']:'' ?>
					</div>
					<div class="champ">
						<label for="type">Type d'événement <i class="fa fa-asterisk"></i> :</label>
						<select id="type" name="type">
							<option value="1">Pique-Nique</option>
							<option value="2">Brocante</option>
							<option value="3">Concert</option>
							<option value="4">Conférence</option>
							<option value="5">Vente privée</option>
							<option value="6">Cours de cuisine</option>
							<option value="7">Cours de danse</option>
							<option value="8">Cours de musique</option>
							<option value="9">Dégustation</option>
							<option value="10">Oenologie</option>
							<option value="11">Exposition</option>
							<option value="12">Autre</option>
						</select>
						<?php echo isset($contents['errors']['type'])?$contents['errors']['type']:'' ?>
					</div>
					<div class="champ">
						<label for="place">Adresse <i class="fa fa-asterisk"></i> :</label>
						<input class="google-autocomplete-address" type="text" placeholder="Lieu" id="place" name="place"/>
						<?php echo isset($contents['errors']['place'])?$contents['errors']['place']:'' ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="date">Date <i class="fa fa-asterisk"></i> :</label>
						<input type="date" name="date" id="date"/>
						<?php echo isset($contents['errors']['date'])?$contents['errors']['date']:'' ?>
					</div>
					<div class="champ">
						<label for="beginning">Heure <i class="fa fa-asterisk"></i> : </label>
						De <input type="time" name="beginning" id="beginning" class="time"/> à
						<input type="time" name="end" id="end" class="time"/>
						<?php echo (isset($contents['errors']['beginning']) || isset($contents['errors']['end']))?$contents['errors']['end']:'' ?>
					</div>
					<div class="champ">
						<label for="price">Tarif :</label> <input type="number" name="price" id="price" class="tarif"/> €
						<?php echo isset($contents['errors']['price'])?$contents['errors']['price']:''; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width:96%">
						<label for="description">Description :</label> <textarea name="description" id="description" placeholder="Une courte description"></textarea>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="hosts">Organisateur(s) <i class="fa fa-asterisk"></i> :</label>
						<input type="text" placeholder="Nom(s)" id="hosts" name="hosts"/>
						<?php echo isset($contents['errors']['hosts'])?$contents['errors']['hosts']:'' ?>
					</div>
					<div class="champ">
						<label for="visibility">Visibilité <i class="fa fa-asterisk"></i> :</label>
						<select id="visibility" name="visibility">
							<option>Public</option>
							<option>Privé</option>
						</select>
						<?php echo isset($contents['errors']['visibility'])?$contents['errors']['visibility']:'' ?>
					</div>
					<div class="champ">
						<label for="participation">Liberté de participer <i class="fa fa-asterisk"></i> :</label>
						<select id="participation" name="participation">
							<option>Libre</option>
							<option>Sur confirmation d'un organisateur</option>
						</select>
						<?php echo isset($contents['errors']['participation'])?$contents['errors']['participation']:'' ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="age_min">Type de public :</label>
						De  <input type="number" name="age_min" id="age_min"class="price"/>
						à <input type="number" name="age_max" id="age_max"class="price"/> ans
					</div>
					<div class="champ">
						<label for="langue">Langue :</label>
							<select id="langue" name="langue">
								<option>Français</option>
								<option>Anglais</option>
							</select>
					</div>
					<div class="champ">
						<label for="max-attendees">Nombre maximum de participants :</label>
						<input type="number" name="max-attendees" id="max-attendees"/>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="attachment">Ajouter une image :</label> <input type="file" id="attachment" name="attachment"/>
					</div>
					<div class="champ">
						<label for="website">Site Web :</label> <input type="url" id="website" name="website"/>
					</div>
					<div class="champ">
						<label for="sponsors">Sponsors :</label>
						<input type="text" placeholder="ex : Orangina" id="sponsors" name="sponsors"/>
					</div>
				</div>
		        <br><input type="submit" value="Créer" />
				<p class="importantRed"> <i class="fa fa-asterisk"></i> Champs obligatoires</p>
	 	    </form>
	    </div>
	</div>
</div>

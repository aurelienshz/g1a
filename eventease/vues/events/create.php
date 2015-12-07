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
						<input type="text" placeholder="Nom de l'événement" id="titre" name="titre" value="<?php echo isset($contents['values']['titre'])?$contents['values']['titre']:''; ?>" />
						<?php echo isset($contents['errors']['titre'])?$contents['errors']['titre']:'';; ?>
					</div>
					<div class="champ">
						<label for="type">Type d'événement <i class="fa fa-asterisk"></i> :</label>
						<select id="type" name="type">
							<option disabled selected>Choisissez un type</option>
							<?php foreach ($contents['types'] as $key => $value) {
								echo '<option value="'.$key.'"'.($contents['values']['type']==$key?' selected':'').'>'.$value.'</option>';
							} ?>
						</select>
						<?php echo isset($contents['errors']['type'])?$contents['errors']['type']:'';; ?>
					</div>
					<div class="champ">
						<label for="place">Adresse <i class="fa fa-asterisk"></i> :</label>
						<input class="google-autocomplete-address" type="text" placeholder="Lieu" id="place" name="place" value="<?php echo isset($contents['values']['place'])?$contents['values']['place']:''; ?>"/>
						<?php echo isset($contents['errors']['place'])?$contents['errors']['place']:'';; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="date_debut">Date de début <i class="fa fa-asterisk"></i> :</label>
						<input type="date" name="date_debut" id="date_debut" value="<?php echo isset($contents['values']['date_debut'])?$contents['values']['date_debut']:''; ?>"/>
						<?php echo isset($contents['errors']['date_debut'])?$contents['errors']['date_debut']:''; ?>
					</div>
					<div class="champ">
						<label for="beginning">Heure de début <i class="fa fa-asterisk"></i> : </label>
						<input type="time" name="beginning" id="beginning" class="time" value="<?php echo isset($contents['values']['beginning'])?$contents['values']['beginning']:''; ?>"/>
					</div>
					<div class="champ">
						<label for="price">Tarif :</label> <input type="number" name="price" id="price" class="tarif" value="<?php echo isset($contents['values']['price'])?$contents['values']['price']:''; ?>"/> €
						<?php echo isset($contents['errors']['price'])?$contents['errors']['price']:'';; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="date_fin">Date de fin <i class="fa fa-asterisk"></i> :</label>
						<input type="date" name="date_fin" id="date_fin" value="<?php echo isset($contents['values']['date_fin'])?$contents['values']['date_fin']:''; ?>"/>
						<?php echo isset($contents['errors']['date_fin'])?$contents['errors']['date_fin']:''; ?>
					</div>
					<div class="champ">
						<label for="end">Heure de fin <i class="fa fa-asterisk"></i> : </label>
						<input type="time" name="end" id="end" class="time" value="<?php echo isset($contents['values']['end'])?$contents['values']['end']:''; ?>"/>
					</div>
					<div class="champ">
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width:96%">
						<label for="description">Description :</label> <textarea name="description" id="description" placeholder="Une courte description"><?php echo isset($contents['values']['description'])?$contents['values']['description']:''; ?></textarea>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="hosts">Organisateur(s) <i class="fa fa-asterisk"></i> :</label>
						<input type="text" placeholder="Nom(s)" id="hosts" name="hosts" value="<?php echo isset($contents['values']['hosts'])?$contents['values']['hosts']:''; ?>"/>
						<?php echo isset($contents['errors']['hosts'])?$contents['errors']['hosts']:''; ?>
					</div>
					<div class="champ">
						<label for="visibility">Visibilité <i class="fa fa-asterisk"></i> :</label>
						<select id="visibility" name="visibility">
							<option value="0">Public</option>
							<option value="1">Privé</option>
						</select>
						<?php echo isset($contents['errors']['visibility'])?$contents['errors']['visibility']:''; ?>
					</div>
					<div class="champ">
						<label for="participation">Liberté de participer <i class="fa fa-asterisk"></i> :</label>
						<select id="participation" name="participation">
							<option value="0">Libre</option>
							<option value="1">Sur confirmation d'un organisateur</option>
						</select>
						<?php echo isset($contents['errors']['participation'])?$contents['errors']['participation']:''; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="age_min">Type de public :</label>
						De  <input type="number" name="age_min" id="age_min"class="price"/>
						à <input type="number" name="age_max" id="age_max"class="price"/> ans
						<?php echo isset($contents['errors']['age_max'])?$contents['errors']['age_max']:''; ?>
					</div>
					<div class="champ">
						<label for="langue">Langue :</label>
						<select id="langue" name="langue">
							<option>Français</option>
							<option>Anglais</option>
						</select>
						<?php echo isset($contents['errors']['langue'])?$contents['errors']['langue']:''; ?>
					</div>
					<div class="champ">
						<label for="max_attendees">Nombre maximal de participants :</label>
						<input type="number" name="max_attendees" id="max_attendees" value="<?php echo isset($contents['values']['max_attendees'])?$contents['values']['max_attendees']:''; ?>"/>
						<?php echo isset($contents['errors']['max_attendees'])?$contents['errors']['max_attendees']:''; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="attachment">Ajouter une image :</label>
						<input type="file" id="attachment" name="attachment"/>
					</div>
					<div class="champ">
						<label for="website">Site Web :</label>
						<input type="url" id="website" name="website" placeholder="inactif" value="<?php echo isset($contents['values']['website'])?$contents['values']['website']:''; ?>"/>
						<?php echo isset($contents['errors']['website'])?$contents['errors']['website']:'' ?>
					</div>
					<div class="champ">
						<label for="sponsors">Sponsors :</label>
						<input type="text" placeholder="Sponsors" id="sponsors" name="sponsors" value="<?php echo isset($contents['values']['sponsors'])?$contents['values']['sponsors']:''; ?>"/>
						<?php echo isset($contents['errors']['sponsors'])?$contents['errors']['sponsors']:'' ?>
					</div>
				</div>
		        <br><input type="submit" value="Créer" />
				<p class="importantRed"> <i class="fa fa-asterisk"></i> Champs obligatoires</p>
	 	    </form>
	    </div>
	</div>
</div>

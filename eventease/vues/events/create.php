<div class="wrapper prettyform">
		<div class="titleWrapper">
			<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
			<h2><i class="fa fa-plus"></i> Créer un événement</h2>
			<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
		</div>
		<form method="post" action="<?php echo getLink(['events','create']); ?>" enctype="multipart/form-data">
			<?php echo isset($contents['errors']['general'])?$contents['errors']['general']:'' ?>
			<div class="ligne">
					<div class="champ" style="width: 34%;">
						<label for="titre">Nom de l'événement <i class="fa fa-asterisk"></i> :</label>
						<input type="text" placeholder="Nom de l'événement" id="titre" name="titre" value="<?php echo isset($contents['values']['titre'])?$contents['values']['titre']:''; ?>" />
						<?php echo isset($contents['errors']['titre'])?$contents['errors']['titre']:'';; ?>
					</div>
					<div class="champ" style="width: 20%;">
						<label for="type">Type d'événement <i class="fa fa-asterisk"></i> :</label>
						<select id="type" name="type">
							<option disabled <?php echo $contents['values']['type']==-1?'selected':''; ?>>Choisissez un type</option>
							<?php foreach ($contents['types'] as $key => $value) {
								echo '<option value="'.$key.'"'.($contents['values']['type']==$key?' selected':'').'>'.$value.'</option>';
							} ?>
						</select>
						<?php echo isset($contents['errors']['type'])?$contents['errors']['type']:'';; ?>
					</div>
					<div class="champ"  style="width: 44%;" >
						<label for="place">Adresse <i class="fa fa-asterisk"></i> :</label>
						<input class="google-autocomplete-address" type="text" placeholder="Lieu" id="place" name="place" value="<?php echo isset($contents['values']['place'])?$contents['values']['place']:''; ?>"/>
						<?php echo isset($contents['errors']['place'])?$contents['errors']['place']:'';; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width: 20%;">
							<label for="date_debut">Date de Début <i class="fa fa-asterisk"></i> :</label>
							<input type="date" name="date_debut" id="date_debut" value="<?php echo isset($contents['values']['date_debut'])?$contents['values']['date_debut']:''; ?>"/>
							<?php echo isset($contents['errors']['date_debut'])?$contents['errors']['date_debut']:''; ?>
					</div>	
					<div class="champ" style="width: 20%">
						<label for="beginning">Heure de Début <i class="fa fa-asterisk"></i> :</label>
						<input style="float: left; width:66%" type="time" name="beginning" id="beginning" value="<?php echo isset($contents['values']['beginning'])?$contents['values']['beginning']:''; ?>"/>
						<?php echo isset($contents['errors']['beginning'])?$contents['errors']['beginning']:''; ?>
					</div>				
					<div class="champ" style="width: 20%;">
						<div>
							<label for="date_fin">Date de Fin <i class="fa fa-asterisk"></i> :</label>
							<input type="date" name="date_fin" id="date_fin" value="<?php echo isset($contents['values']['date_fin'])?$contents['values']['date_fin']:''; ?>"/>
							<?php echo isset($contents['errors']['date_fin'])?$contents['errors']['date_fin']:''; ?>
						</div>
					</div>
					<div class="champ" style="width:20%;">
						<label for="end">Heure de Fin :</label>
						<input style="float: left; width:66%" type="time" name="end" id="end" value="<?php echo isset($contents['values']['end'])?$contents['values']['end']:''; ?>"/>
						<?php echo isset($contents['errors']['end'])?$contents['errors']['end']:''; ?>					
					</div>
				</div>
				<div class="ligne">
					<div class="champ" >
						<label for="price">Tarif (€) :</label>
						<input style="float:left; width: 33%;" type="number" name="price" id="price" value="<?php echo isset($contents['values']['price'])?$contents['values']['price']:''; ?>"/>
						<?php echo isset($contents['errors']['price'])?$contents['errors']['price']:'';; ?>
					</div>
					<div class="champ">
						<label for="max_attendees">Nombre max. de participants :</label>
						<input style="float:left; width: 33%;" type="number" name="max_attendees" id="max_attendees" value="<?php echo isset($contents['values']['max_attendees'])?$contents['values']['max_attendees']:''; ?>"/>
						<?php echo isset($contents['errors']['max_attendees'])?$contents['errors']['max_attendees']:''; ?>
					</div>
					<div class="champ">
						<label for="age_min">Type de public :</label>
						De  <input type="number" name="age_min" id="age_min"class="price"/>
						à <input type="number" name="age_max" id="age_max"class="price"/> ans
						<?php echo isset($contents['errors']['age_max'])?$contents['errors']['age_max']:''; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width: 50%;">
						<div class="photo">
							<label for="photo"><br>Ajouter une photo :</label>(.jpg ou .png | max. : 2Mo | 1000x1000 max.)
							<input type="file" id="photo" name="photo"/>
							<?php echo isset($contents['errors']['photo'])?$contents['errors']['photo']:'' ?>
            			</div>
            		</div>
					<div class="champ" style="width: 100%;">
						<label for="description">Description :</label> <textarea name="description" id="description" placeholder="Une courte description"><?php echo isset($contents['values']['description'])?$contents['values']['description']:''; ?></textarea>
						<?php echo isset($contents['errors']['description'])?$contents['errors']['description']:''; ?>

					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="visibility">Confidentialité <i class="fa fa-asterisk"></i> :</label>
						<select id="visibility" name="visibility">
							<option value="0">Public</option>
							<option value="1">Privé</option>
							<option value="2">Secret</option>
						</select>
						<?php echo isset($contents['errors']['visibility'])?$contents['errors']['visibility']:''; ?>
					</div>
					<div class="champ">
						<label for="invitation">Qui peut inviter <i class="fa fa-asterisk"></i> :</label>
						<select id="invitation" name="invitation">
							<option value="0">Tout le monde</option>
							<option value="1">Seulement les modérateurs</option>
						</select>
						<?php echo isset($contents['errors']['invitation'])?$contents['errors']['invitation']:''; ?>
					</div>
					<div class="champ">
						<label for="langue">Langue :</label>
						<select id="langue" name="langue">
							<option value='0'>Français</option>
							<option value='1'>Anglais</option>
						</select>
						<?php echo isset($contents['errors']['langue'])?$contents['errors']['langue']:''; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="autohosted">Organisez-vous cet évènement ? </label>
						<span style="margin-left : 25%;"><input type="radio" id="autohosted_Yes" name="autohosted" value="True" <?php if(isset($contents['values']['autohosted'])){ if ($contents['values']['autohosted']=="True") echo 'checked="checked"';}else{ echo 'checked="checked"';} ?> /> Oui </span>
						<span style="margin-left : 5%;"><input type="radio" id="autohosted_No" name="autohosted" value="False" <?php echo (isset($contents['values']['autohosted']) AND $contents['values']['autohosted']=="False")?'checked="checked"':''; ?>/> Non</span>
						<?php echo isset($contents['errors']['autohosted'])?$contents['errors']['autohosted']:''; ?>
					</div>
					<div class="champ">
						<label for="sponsors">Sponsors :</label>
						<input type="text" placeholder="Sponsors" id="sponsors" name="sponsors" value="<?php echo isset($contents['values']['sponsors'])?$contents['values']['sponsors']:''; ?>"/>
						<?php echo isset($contents['errors']['sponsors'])?$contents['errors']['sponsors']:'' ?>
					</div>
					<div class="champ">
						<label for="website">Site Web :</label>
						<input type="url" id="website" name="website" placeholder="URL" value="<?php echo isset($contents['values']['website'])?$contents['values']['website']:''; ?>"/>
						<?php echo isset($contents['errors']['website'])?$contents['errors']['website']:'' ?>
					</div>
				</div>
				<div class="ligne" id="nonautohostedLine">
					<div class="champ" style="width:45%;">
						<label for="hosts">Nom Organisateurs :</label>
						<input type="text" placeholder="Organisateur" id="hosts" name="hosts" value="<?php echo isset($contents['values']['hosts'])?$contents['values']['hosts']:''; ?>"/>
						<?php echo isset($contents['errors']['hosts'])?$contents['errors']['hosts']:'' ?>
					</div>							
					<div class="champ" style="width:45%;">
						<label for="hosts">Informations Contact Organisateur :</label>
						<input type="text" placeholder="Informations de contact" id="hosts_contact" name="hosts_contact" value="<?php echo isset($contents['values']['hosts_contact'])?$contents['values']['hosts_contact']:''; ?>"/>
						<?php echo isset($contents['errors']['hosts_contact'])?$contents['errors']['hosts_contact']:'' ?>
					</div>										
				</div>
		        <div class="ligneBoutons" style="padding-bottom: 1em;">
					<a style="width: 20%; margin:0;" class="champ button" href="<?php echo getLink(['membres','evenements']); ?>"><i class="fa fa-ban"></i> Annuler</a>
					<input style="width: 58%;" type="submit" value="Créer" />
				</div>
				<p class="importantRed"> <i class="fa fa-asterisk"></i> Champs obligatoires</p>
		</form>
</div>

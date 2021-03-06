<div class="wrapper prettyform shadow">
		<div class="titleWrapper">
			<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
			<h2><i class="fa fa-pencil"></i> Modifier mon évènement </h2>
			<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
		</div>
		<div class="ligneBoutons">
			<a style="width: 25%;" class="champ button" href="<?php echo getLink(['events','extra-media',$_GET['id']]); ?>"></i> Gèrer les images supplémentaires</a>
			<a style="width: 25%;" class="champ button" href="<?php echo getLink(['events','addModo',$_GET['id']]); ?>"></i> Ajouter des modérateurs</a>
			<a style="width: 25%;" class="champ button" href="<?php echo getLink(['events','deleteModo',$_GET['id']]); ?>"></i> Supprimer des modérateurs</a>
		</div>
		<form method="post" action="<?php echo getLink(['events','modify',$_GET['id']]); ?>" enctype="multipart/form-data">
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
							<?php foreach ($contents['types'] as $key => $value) {
								echo '<option value="'.$key.'"'.($contents['values']['id_type']==$key?' selected':'').'>'.$value.'</option>';
							} ?>
						</select>
						<?php echo isset($contents['errors']['type'])?$contents['errors']['type']:'';; ?>
					</div>
					<div class="champ"  style="width: 44%;" >
						<label for="adresse">Adresse <i class="fa fa-asterisk"></i> :</label>
						<input class="google-autocomplete-address" type="text" placeholder="Lieu" id="adresse" name="adresse" value="<?php echo isset($contents['values']['adresse'])?$contents['values']['adresse']:''; ?>"/>
						<?php echo isset($contents['errors']['adresse'])?$contents['errors']['adresse']:'';; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width: 15%;">
							<label for="date_debut">Date de Début <i class="fa fa-asterisk"></i> :</label>
							<input type="date" name="date_debut" id="date_debut" value="<?php echo isset($contents['values']['date_debut'])?$contents['values']['date_debut']:''; ?>"/>
							<?php echo isset($contents['errors']['date_debut'])?$contents['errors']['date_debut']:''; ?>
					</div>	
					<div class="champ" style="width: 15%">
						<label for="beginning">Heure de Début <i class="fa fa-asterisk"></i> :</label>
						<input style="width:66%" type="time" name="beginning" id="beginning" value="<?php echo isset($contents['values']['beginning'])?$contents['values']['beginning']:''; ?>"/>
						<?php echo isset($contents['errors']['beginning'])?$contents['errors']['beginning']:''; ?>
					</div>				
					<div class="champ" style="width: 15%;">
						<div>
							<label for="date_fin">Date de Fin <i class="fa fa-asterisk"></i> :</label>
							<input type="date" name="date_fin" id="date_fin" value="<?php echo isset($contents['values']['date_fin'])?$contents['values']['date_fin']:''; ?>"/>
							<?php echo isset($contents['errors']['date_fin'])?$contents['errors']['date_fin']:''; ?>
						</div>
					</div>
					<div class="champ" style="width:10%;">
						<label for="end">Heure de Fin :</label>
						<input type="time" name="end" id="end" value="<?php echo isset($contents['values']['end'])?$contents['values']['end']:''; ?>"/>
						<?php echo isset($contents['errors']['end'])?$contents['errors']['end']:''; ?>					
					</div>
				</div>
				<div class="ligne">
					<div class="champ" >
						<label for="price">Tarif (€) :</label>
						<input  style="float:left; width: 33%;" type="number" name="price" id="price" value="<?php echo isset($contents['values']['tarif'])?$contents['values']['tarif']:''; ?>"/>
						<?php echo isset($contents['errors']['price'])?$contents['errors']['tarif']:'';; ?>
					</div>
					<div class="champ">
						<label for="max_attendees">Nombre max. de participants :</label>
						<input style="float:left; width: 33%;" type="number" name="max_attendees" id="max_attendees" value="<?php echo isset($contents['values']['max_participants'])?$contents['values']['max_participants']:''; ?>"/>
						<?php echo isset($contents['errors']['max_participants'])?$contents['errors']['max_participants']:''; ?>
					</div>
					<div class="champ">
						<label for="age_min">Type de public :</label>
						De  <input type="number" name="age_min" id="age_min"class="price" value="<?php echo isset($contents['values']['age_min'])?$contents['values']['age_min']:''; ?>"/>
						à <input type="number" name="age_max" id="age_max"class="price" value="<?php echo isset($contents['values']['age_max'])?$contents['values']['age_max']:''; ?>"/> ans
						<?php echo isset($contents['errors']['age_max'])?$contents['errors']['age_max']:''; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width: 50%;">
						<div class="photo">
							<label for="photo"><br>Modifier la photo principale :</label>
							<img alt="Photo Event" src="<?php echo (isset($contents["values"]["lien_photo"]) AND $contents["values"]["lien_photo"] != -1)?htmlspecialchars(PHOTO_EVENT.$contents["values"]["lien_photo"]):IMAGES.'picnic1.jpg' ?>" title="Photo Event" height="150" width="300"/>
							<br />(.jpg ou .png | max. : 2Mo | 1000x1000 max.)<br />
							<input type="file" id="photo" name="photo" accept=".png,.jpg,.jpeg"/>
							<?php echo (isset($contents["values"]["lien_photo"]) AND $contents["values"]["lien_photo"] != -1 )?"<input type='checkbox' name='photo' value='-1' >Supprimer la photo":NULL ?>
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
							<option value="0" <?php echo $contents['values']['visibilite']==0?'selected':'';?> >Public</option>
							<option value="1" <?php echo $contents['values']['visibilite']==1?'selected':'';?> >Privé</option>
							<option value="2" <?php echo $contents['values']['visibilite']==2?'selected':'';?> >Secret</option>
						</select>
						<?php echo isset($contents['errors']['visibilite'])?$contents['errors']['visibility']:''; ?>
					</div>
					<div class="champ">
						<label for="invitation">Qui peut inviter <i class="fa fa-asterisk"></i> :</label>
						<select id="invitation" name="invitation">
							<option value="0" <?php echo $contents['values']['invitation']==0?'selected':'';?>>Tout le monde</option>
							<option value="1" <?php echo $contents['values']['invitation']==1?'selected':'';?>>Seulement les organisateurs</option>
						</select>
						<?php echo isset($contents['errors']['invitation'])?$contents['errors']['invitation']:''; ?>
					</div>
					<div class="champ">
						<label for="langue">Langue :</label>
						<select id="langue" name="langue" >
							<option value='0' <?php echo $contents['values']['langue']==0?'selected':'';?> >Français</option>
							<option value='1' <?php echo $contents['values']['langue']==1?'selected':'';?>>Anglais</option>
						</select>
						<?php echo isset($contents['errors']['langue'])?$contents['errors']['langue']:''; ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="autohosted">Organisez-vous cet évènement ? </label>
						<span style="margin-left : 25%;"><input type="radio" id="autohosted_Yes" name="autohosted" value="True" 
						<?php if(isset($contents['values']['autohosted'])){ 
								if ($contents['values']['autohosted']=="True") echo 'checked="checked"';
								}else{ echo 'checked="checked"';} ?> 
							/> Oui </span>
						<span style="margin-left : 5%;"><input type="radio" id="autohosted_No" name="autohosted" value="False" <?php echo (isset($contents['values']['autohosted']) AND $contents['values']['autohosted']=="False")?'checked="checked"':''; ?>/> Non</span>
						<?php echo isset($contents['errors']['autohosted'])?$contents['errors']['autohosted']:''; ?>
					</div>
					<div class="champ">
						<label for="sponsors">Sponsors :</label>
						<input type="text" placeholder="Sponsors" id="sponsors" name="sponsors" value="<?php echo isset($contents['values']['sponsor'])?$contents['values']['sponsor']:''; ?>"/>
						<?php echo isset($contents['errors']['sponsors'])?$contents['errors']['sponsors']:'' ?>
					</div>
					<div class="champ">
						<label for="website">Site Web :</label>
						<input type="url" id="website" name="website" placeholder="URL" value="<?php echo isset($contents['values']['site'])?$contents['values']['site']:''; ?>"/>
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
					<input style="width: 50%;" type="submit" value="Modifier" />
					<a style="background-color: #F94339; width: 20%; align-self: flex-end; margin:0;" class="champ button" href="<?php echo getLink(['events','delete', $_GET['id']]); ?>">Supprimer l'évènement</a>
				</div>
				<p class="importantRed"> <i class="fa fa-asterisk"></i> Champs obligatoires</p>
		</form>
</div>

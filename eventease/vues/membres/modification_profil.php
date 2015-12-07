<div class="wrapper createCalendar">
	<div class="shadow">
		<div class="titleWrapper" style="background-color: #4d93ff; border-bottom-color: #287DFF">
			<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
			<h2><i class="fa fa-pencil"></i> Modifier mon profil </h2>
			<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_blue.png'; ?>">
		</div>
		<div id="formBox">
			<div class="ligne ligneBoutons">
				<a class="champ button" href="#">
				Changer mon mot de passe
				</a>
				<a class="champ button" href="#">
				Changer mon adresse mail	
				</a>
			</div>
			<form method="post" action="<?php getLink(['membres','modify']); ?>"> <!-- A CORRIGER action -->
				<div class="ligne">
					<div class="champ" style="width:10%;">
					<label for="civilite">Civilité : </label>
					<select name="civilite" id="civilite">
					<?php
						$array = array (0 => "M.",1 => "Mme");
						foreach($array as $value=>$name)
						{
						    if($value == $contents['civilite'])
						    {
						         echo "<option selected='selected' value='".$value."'>".$name."</option>";
						    }
						    else
						    {
						         echo "<option value='".$value."'>".$name."</option>";
						    }
						}
					?>
					</select>
					</div>
					<div class="champ">
						<label for="nom">Nom : </label>
						<input type="text" name="nom" id="nom" value="<?php echo $contents["nom"];?>">
						<?php echo isset($contents['errors']['nom'])?$contents['errors']['nom']:'' ?>
					</div>
					<div class="champ">
						<label for="prenom">Prénom : </label>
						<input type="text" name="prenom" id="prenom" value="<?php echo $contents["prenom"];?>"/>
						<?php echo isset($contents['errors']['prenom'])?$contents['errors']['prenom']:'' ?>
					</div>
					<div class="champ">
						<label for="ddn">Date de naissance :</label>
						<input type="date" name="ddn" id="date" value="<?php echo $contents["ddn"];?>"/>
						<?php echo isset($contents['errors']['ddn'])?$contents['errors']['ddn']:'' ?>
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width:20%;">
						<label for="tel">Téléphone : </label>
						<input type="text" name="tel" id="tel" value="<?php echo $contents["tel"];?>"/>
					</div>
					<div class="champ">
						<label for="adresse">Adresse : </label>
						<input type="text" name="adresse" id="adresse" value="<?php echo $contents["adresse"]; ?>"/>
					</div>
					<div class="champ">
						<label for="langue">Langue  : </label>
						<select name="langue" id="langue">
							<?php
								$array = array (0 => "Français",1 => "Anglais");
								foreach($array as $value=>$name)
								{
								    if($value == $contents['civilite'])
								    {
								         echo "<option selected='selected' value='".$value."'>".$name."</option>";
								    }
								    else
								    {
								         echo "<option value='".$value."'>".$name."</option>";
								    }
								}
							?>
						</select>
					</div>
				</div>
				<div class="ligne" style="justify-content: flex-start;">
					<div class="champ">
						<div class="photo_profil">
							<label>Photo :</label>
                			<img alt="Photo de Profil" src="<?php echo (PHOTO_PROFIL.$contents["lien_photo"]);?>" title="Photo de Profil" height="150" width="150"/> 
							<label for="photo"><br>Modifier ma photo de profil :</label>
							<input type="file" id="photo" name="photo"/>
            			</div>	
					</div>
					<div class="champ" style="width: calc(185% /3)">
						<label>Description :</label>
						<textarea name="description" id="description"><?php echo $contents["description"];?></textarea>
					</div>
				</div>
				<input type="submit" value="Modifier" />
				<div class="champ" style="width:33%">
					<label for="types_favori_membre">Type(s) d'événement(s) favori(s) : </label>
					<div id="checkbox">
						<label1 for="pique_nique">Pique-Nique : </label1>
						<input type="checkbox" name="pique_nique" id="pique_nique"/><br>
					</div>
					<div id="checkbox">
						<label1 for="concert">Concert : </label1>
						<input type="checkbox" name="concert" id="concert"/><br>
					</div>
					<div id="checkbox">
						<label1 for="exposition">Exposition : </label1>
						<input type="checkbox" name="exposition" id="exposition"/><br>
					</div>
					<div id="checkbox">
						<label1 for="brocante">Brocante : </label1>
						<input type="checkbox" name="brocante" id="brocante"/><br>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

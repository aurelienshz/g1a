<div class="wrapper createCalendar">
	<div class="shadow calendarBottom">
		<div class="titleWrapper">
			<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
			<h2><i class="fa fa-plus"></i> Créer un événement</h2>
			<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
		</div>
		<div id="formBox" class="calendarBottom">
	   		<form method="post" action="<?php echo getLink(['events','create']); ?>">
				<div class="ligne">
					<div class="champ">
						<label for="title">Nom de l'événement <i class="fa fa-asterisk"></i> :</label>
						<input type="text" placeholder="Nom de l'événement" id="title" name="title" />
					</div>
					<div class="champ">
						<label for="type">Type d'événement <i class="fa fa-asterisk"></i> :</label>
						<select id="type" name"type">
							<option>---</option>
							<option>Pique-Nique</option>
							<option>Brocante</option>
							<option>Concert</option>
							<option>Conférence</option>
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
						<label for="place">Lieu <i class="fa fa-asterisk"></i> :</label>
						<input type="text" placeholder="Lieu" id="place" name="Lieu"/>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="date">Date <i class="fa fa-asterisk"></i> :</label>
						<input type="date" name="date" id="date"/>
					</div>
					<div class="champ">
						<label>Heure <i class="fa fa-asterisk"></i> : </label>
						De <input type="time" name="begining" id="begining" class="time"/> h à 
						<input type="time" name="end" id="end" class="time"/> h
					</div>
					<div class="champ">
						<label>Tarif:</label> <input type="number" name="price" id="price"/> €
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width:91%">
						<label>Description :</label> <textarea id="description" placeholder="Une courte description"></textarea>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="hosts">Organisateur(s) <i class="fa fa-asterisk"></i> :</label>
						<input type="text" placeholder="Nom(s)" id="hosts" name="hosts"/>
					</div>
					<div class="champ">
						<label for="visibility">Visibilité <i class="fa fa-asterisk"></i> :</label>
						<select id="visibility" name="visibility">
							<option>Public</option>
							<option>Privé</option>
						</select>
					</div>
					<div class="champ">
						<label for="participation">Liberté de participer <i class="fa fa-asterisk"></i> :</label>
						<select id="participation" name="participation">
							<option>Libre</option>
							<option>Sur confirmation d'un organisateur</option>
						</select>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="public_age">Type de public :</label> 
						De  <input type="number" name="age_min" id="age_min"class="price"/>
						à <input type="number" name="age_max" id="age_max"class="price"/> ans
					</div>
					<div class="champ">
						<label for="language">Langue :</label>
							<select id="Language" name="language">
								<option>Français</option>
								<option>Anglais</option>
							</select>
					</div>
					<div class="champ">
						<label for="Nombre maximum de participants">Nombre maximum de participants :</label>
						<input type="number" name="Nombre de participants"  id="attending"/>
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
						<select id="sponsors" name="sponsors">
								<option>Orangina</option>
								<option>Mairie de Paris</option>
								<option>7'ease</option>
								<option>ISEP</option>
								<option>Eddy Malou</option>
							</select>
					</div>
				</div>
		        <br><input type="submit" value="Créer" />
				<p class="importantRed"> <i class="fa fa-asterisk"></i> Champs obligatoires</p>
	 	    </form>
	    </div>
	</div>
</div>
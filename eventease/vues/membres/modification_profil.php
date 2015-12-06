<div class="wrapper createCalendar">
	<div class="shadow">
		<div class="titleWrapper" style="background-color: #287DFF">
			<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
			<h2><i class="fa fa-pencil"></i> Modifier mon profil </h2>
			<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
		</div>
		<div id="formBox">
			<form method="post" action="???">
				<div class="ligne">
					<div class="champ">
						<label for="nom">Nom : </label><input type="text" name="nom" id="nom" placeholder="Dupont">
					</div>
					<div class="champ">
						<label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" placeholder="Kevin"/>
					</div>
					<div class="champ">
						<label for="ddn">Date de naissance :</label> <input type="date" name="ddn" id="ddn"/>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="civilite">Civilité : </label>
						<select id="civilite" name"civilite">
							<option value="1">M.</option>
							<option value="2">Mme.</option>
						</select>
					</div>
					<div class="champ">
						<label for="mail">E-mail : </label><input type="mail" name="mail" id="mail"/>
					</div>
					<div class="champ">
						<label for="telephone">Téléphone : </label><input type="text" name="tel" id="tel"/>
					</div>				
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="langue">Langue : </label>
						<select id="langue" name"langue">
							<option value="1">Français</option>
							<option value="2">Anglais</option>
						</select>
					</div>
				</div>
				<div class="ligne">	
					<div class="champ">
						<label for="numero">Numéro : </label>
						<input type="numero" name="numero" id="numero"/>
					</div>
					<div class="champ">
						<label for="complement_numero">Complément du numéro : </label>
						<input type="complement_numero" name="complement_numero" id="complement_numero"/>
					</div>
					<div class="champ">
						<label for="rue">Rue : </label>
						<input type="rue" name="rue" id="rue"/>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="code_postal">Code postal : </label>
						<input type="code_postal" name="code_postal" id="code_postal"/>
					</div>
					<div class="champ">
						<label for="ville">Ville : </label>
						<input type="text" name="ville" id="ville"/>
					</div>
					<div class="champ">
						<label for="pays">Pays : </label>
						<input type="text" name="pays" id="pays"/>
					</div>
				</div>
				<div class="ligne">
					<div class="champ" style="width:25%">
						<label>Description :</label> 
						<textarea id="description" placeholder="Une courte description"></textarea>
					</div>
					<div class="champ" style="float:right">
						<div class="photo_profil">
							<label>Photo :</label>
                			<img alt="Photo de profil" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>" title="Photo de profil" height="150" width="150"/> 
							<label for="attachment"><br>Modifier ma photo de profil :</label>
							<input type="file" id="attachment" name="attachment"/>
            			</div>	
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

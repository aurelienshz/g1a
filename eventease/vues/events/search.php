<div class="wrapper createCalendar">
	<div class="shadow">
		<div class="titleWrapper">
			<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
			<h2><i class="fa fa-search"></i> Chercher un événement</h2>
			<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
		</div>
		<div id="formBox">
			<form method="post" action="<?php echo getLink(['events','search']); ?>">
				<div class="ligne">
					<div class="champ">
						<label for="évènement">Nom : </label><input type="search" name="évènement" id="évènement" placeholder="ex : Concert de Madonna">
					</div>
					<div class="champ">
						<label for="date">Date :</label> <input type="date" name="date" id="date"/>
					</div>
					<div class="champ">
						<label for="lieu">Lieu : </label><input type="search" name="lieu" id="lieu" placeholder="ex: Stade de France" class="google-autocomplete-address"/>
					</div>
				</div>
				<div class="ligne">
					<div class="champ">
						<label for="type">Type :</label>
						<select id="type" name"type">
							<option>Pique-Nique</option>
							<option>Brocante</option>
							<option>Concert</option>
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
						<label>Heure : </label>
						De <input type="time" name="début" id="début" class="time"/> h à
						<input type="time" name="fin" id="fin" class="time"/> h
					</div>
					<div class="champ">
						<label>Tarif :</label>
						De <input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> € à
						<input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> €
					</div>
				</div>
				<input type="submit" value="Chercher" />
			</form>
		</div>
		<div class="switchTab">
			<div class="tab titleWrapper" id="tabEvent">Chercher un événement</div>
			<div class="tab titleWrapper" id="tabUser">Chercher un utilisateur</div>
		</div>
	</div>
</div>
<div id="searchToolbar" class="wrapper">
	<span>XX résultats trouvés</span>
	<div class="tri">
		Trier par : 
		<select>
			<option>Nom</option>
			<option>Date</option>
			<option>Tarif</option>
			<option>Durée</option>
			<option>Lieu</option>
		</select>
	</div>
</div>
<div class="wrapper" id="searchResults">
	<div id="resultWrapper">
		<div class="resultBox shadow">
			<h4><a href=#>Pic-nique -  Devant le palais du Luxembourg</a></h4> 
			<div class="table">
				<div class="imageEvent">
					<a href=#><img class="eventContainer" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>"></a>
				</div>
				<div class="infoEvent">
					<div class="eventContainer">
						<p class="boldInfo"><span>24/08/2016 à 12h30 - Jardin du Luxembourg, Paris</span> <span class="floatRight"> Gratuit - Ouvert à tous</span></p>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu eros quis turpis pellentesque semper. Nulla et faucibus ipsum. Cras accumsan magna vehicula tempus luctus.</p>
						<p class="floatRight"> En Savoir plus </p>
					</div>
				</div>		
			</div>
		</div>
	</div>
</div>

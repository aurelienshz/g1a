<div class="titleWrapper wrapper">
	<img class="calendarPin" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
	<h2>Chercher un événement</h2>
	<img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin.png'; ?>">
</div>

<div class="wrapper" id="searchBox">
	<form method="post" action="<?php echo getLink(['events','search']); ?>">
			<div class="row">
				<div class="col-3">
					<label for="évènement">Nom : </label><input type="search" name="évènement" id="évènement" placeholder="ex : Concert de Madonna">
				</div>
				<div class="col-3">
					<label for="date">Date :</label> <input type="date" name="date" id="date"/>
				</div>
				<div class="col-3">
					<label for="lieu">Lieu : </label><input type="search" name="lieu" id="lieu" placeholder="ex: Stade de France" class="google-autocomplete-address"/>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
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
				<div class="col-3">
					<label>Heure : </label>
					De <input type="time" name="début" id="début" class="time"/> h à
					<input type="time" name="fin" id="fin" class="time"/> h
				</div>
				<div class="col-3">
					<label>Tarif :</label>
					De <input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> € à
					<input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> €
				</div>
			</div>
			<input type="submit" value="Envoyer" />
	</form>
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
		<div class="resultBox">
			<h4><a href=#>Pic-nique -  Devant le palais du Luxembourg</a></h4> 
			<div class="table">
				<div class="imageEvent">
					<a href=#><img class="eventContainer" src="<?php echo IMAGES.'tiger-face.jpeg'; ?>"></a>
				</div>
				<div class="infoEvent">
					<div class="eventContainer">
						<p><span>24/08/2016 à 12h30 - Jardin du Luxembourg, Paris</span> <span class="floatRight"> Gratuit - Ouvert à tous</span></p>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu eros quis turpis pellentesque semper. Nulla et faucibus ipsum. Cras accumsan magna vehicula tempus luctus. Nam pharetra dictum efficitur. Nulla varius dolor porttitor elit tincidunt dapibus. Donec nisi nisi, condimentum id nulla eu, iaculis ullamcorper libero. Nam venenatis volutpat erat, id egestas arcu condimentum ut. Praesent semper dolor sit amet porttitor iaculis. Mauris ultrices convallis porta...</p>
					</div>
				</div>		
			</div>
		</div>
	</div>
</div>

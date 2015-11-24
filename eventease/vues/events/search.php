<div class="wrapper">
    <h1>Chercher un événement</h1>
	<form method="post" action="recherche_evenement2.php" class="tryptique">
		<div class='row'>	
			<div class="col-3">
				<label>Nom : </label>
				<input type="search" name="évènement" id="évènement" placeholder="Ex : Concert de Madonna">
			</div>
			<div class="col-3">
				<label for="date">Date </label>
				<input class="col-3" type="date" name="date" id="date"/>
			</div>
			<div class="col-3">
			<label >Lieu : </label>
			<input class="col-3" type "text" name="lieu" id="lieu"/>
			</div>
		</div>
		
			<label>Tarif :</label>
			De <input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> € à 
			<input type="number" name="tarif_minimum" id="tarif_minimum" class="price"/> €
			<input type="submit" value="Envoyer" />
	</form>
</div>

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
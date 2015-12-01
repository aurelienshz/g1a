<div class="wrapper">
    <h1>Créer un événement</h1>
<div class="wrapper" id="createBox">
    <form method="post" action="???">
		<div class="row">
			<div class="col-3">
				<label for="title">Nom de l'événement * :</label>       <input type="text" placeholder="Nom de l'événement" id="title" name="title" />
			</div>
			<div class="col-3">
				<label for="type">Type d'événement * :</label>
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
			<div class="col-3">
				<label for="place">Lieu * :</label>       <input type="text" placeholder="Lieu" id="place" name="Lieu"/>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<label for="date">Date * :</label>        <input type="date" name="date" id="date"/>
			</div>
			<div class="col-3">
				<label>Heure * : </label>
				De <input type="time" name="begining" id="begining"/> h à <input type="time" name="end" id="end"/> h
			</div>
			<div class="col-3">
				<label>Tarif:</label> <input type="number" name="price" id="price"/> €
		</div>
		<div class="row">
			<label>Despcription :</label> <textarea id="description" placeholder="Description"></textarea>
		</div>
		<div class="row">
			<div class="col-3">
				<label for="hosts">Organisateur(s) * :</label>  <input type="text" placeholder="Nom(s)" id="hosts" name="hosts"/>
			</div>
			<div class="col-3">
				<label for="visibility">Visibilité * :</label>
				<select id="visibility" name="visibility">
					<option>Public</option>
					<option>Privé</option>
				</select>
			</div>
			<div class="col-3">
				<label for="participation">Liberté de participer * :</label>
				<select id="participation" name="participation">
					<option>Libre</option>
					<option>Sur confirmation d'un organisateur</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<label for="public_age">Type de public :</label> 
				De  <input type="number" name="age_min" id="age_min"/>
				à <input type="number" name="age_max" id="age_max"/> ans
			</div>
			<div class="col-3">
				<label for="language">Langue</label>
					<select id="Language" name="language">
						<option>Français</option>
						<option>Anglais</option>
						<option>Espagnol</option>
						<option>Allemand</option>
						<option>Chinois</option>
					</select>
			</div>
			<div class="col-3">
				<label for="Nombre maximum de participants">Nombre maximum de participants</label> <input type="number" name="Nombre de participants"  id="attending"/>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<label for="attachment">Ajouter une image</label> <input type="file" id="attachment" name="attachment"/>
			</div>
			<div class="col-3">
				<label for="website">Site Web</label> <input type="url" id="website" name="website"/>
			</div>
			<div class="col-3">
				<label for="sponsors">Sponsors</label> <input type="text" id="sponsor1" name="sponsor1"/>
			</div>
		</div>
        <br><input type="submit" value="Valider" />
		<h5> * Champs obligatoires</h5>
    </form>
</div>


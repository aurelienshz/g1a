<div class="wrapper">
    <h1>Créer un événement</h1>

    <form method="post" action="???">
        <label for="title">Nom de l'événement *</label>       <input type="text" placeholder="Nom de l'événement" id="title" name="title" />
		<br><label for="type">Type d'événement *</label>
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
        <br><label for="date">Date *</label>        <input type="date" name="date" id="date"/>
		<br><label for="place">Lieu *</label>       <input type="text" placeholder="Lieu" id="place" name="Lieu"/>
		<br><label for="hosts">Organisateur(s) *</label>  <input type="text" placeholder="Nom(s)" id="hosts" name="hosts"/>
        <br><label for="visibility">Visibilité *</label>
			<select id="visibility" name="visibility">
            <option>Public</option>
            <option>Privé</option>
        </select>
		<br> <label for="participation">Liberté de participer *</label>
			<select id="participation" name="participation">
            <option>Libre</option>
            <option>Sur confirmation d'un organisateur</option>
        </select>
		<br><label for="price">Tarif</label> <input type="number" name="price" id="price"/>€
		<br><label for="assistance">Type de public</label> de <input type="number" name="assistance" id="assistance"/> à <input type="number" name="assistance" id="assistance"/> ans
		<br><label for="language">Langue</label>       <input type="text" placeholder="Lieu" id="place" name="Lieu"/>
		<br><label for="description">Description</label>  <textarea id="description" placeholder="Description"></textarea>
		<br><label for="Nombre maximum de participants">Nombre maximum de participants</label> <input type="number" name="Nombre de participants"  id=""/>
		<br><label for="attachment">Ajouter une image</label> <input type="file" id="attachment" name="attachment"/>
		<br><br><label for="website">Site Web</label> <input type="url" id="website" name="website"/>
		<br><label for="sponsors">Sponsors</label> <input type="text" id="sponsor1" name="sponsor1"/>
        <br><input type="submit" value="Valider" />
		<h5> * Champs obligatoires</h5>
    </form>
</div>


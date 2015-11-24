		<form method="post" action="recherche_evenement2.php">
			<label>Evènement : </label>
			<input type="search" name="évènement" id="évènement" placeholder="Ex : Concert de Madonna">
			
			<p>
				<p>Type d'évènement</p>
				<input type="checkbox" name="concert" id="concert"/><label for ="concert">Concert</label><br />
				<input type="checkbox" name="pique_nique" id="pique_nique"/><label for ="pique_nique">Pique-nique</label><br />
				<input type="checkbox" name="exposition" id="exposition"/><label for ="exposition">Exposition</label><br />
				<input type="checkbox" name="brocante" id="brocante"/><label for ="brocante">brocante</label><br />
				<input type="checkbox" name="conférence" id="conference"/><label for ="conference">Conférence</label><br />
				<input type="checkbox" name="autre" id="autre"/><label for ="autre">Autre</label><br />
			</p>
			<p>
				<label for ="date">Date : </label>
				<input type="text" name="jour" id="pseudo" size=1px/> /
				<input type="text" name="mois" id="mois" size=1px/> /
				<input type="text" name="année" id="année" size=2xp/>
			</p>
			<p>
				<label>à : </label>
				<input type="text" name="heure" id="heure" size=1px/> h
				<input type="text" name="minute" id="minute" size=1px/>
			</p>
			<p>
				<label>Lieu : </label>
				<input type "text" name="lieu" id="lieu"/>
			</p>
			<p>
				<label>Tarif : de </label>
				<input type="text" name="tarif_minimum" id="tarif_minimum" size=1px/> € à
				<input type="text" name="tarif_minimum" id="tarif_minimum" size=1px/>
			</p>
			<p><input type="submit" value="Envoyer" />
		</form>
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
					<div class="champ" style="width:59%">
						<label>Description :</label> <textarea id="description" placeholder="Une courte description"></textarea>
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
			</form>
		</div>
	</div>
</div>

<div class="wrapper prettyform">
  <div class="shadow">
    <div class="titleWrapper1">
      <img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
      <h2><i class="fa fa-question"></i>  Création d'un topic</h2>
      <img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
    </div>
    <div class="form">
      <form method="post" action="#">
        <label for="titre">Titre :</label>
        <input type="text" placeholder="Titre" id="titre" style="width:20%; float:left; margin-bottom:0" >
        </br></br>
        <div class="champ" style="width: 40%; display:inherit">
          <label for="message" style="display:inline-block">Message :</label> 
          <textarea name="message" id="message" placeholder="Votre message"></textarea>
        </div>
        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie" style="width:20%; display:inherit; margin:0 0">
          <option value="0">--</option>
          <option value="1">Aide</option>
          <option value="2">Discussions</option>
         </select>
         <div class="creer">
          <h3><a class="button" href="#" type="submit">
            Créer un topic</a></h3>
        </div>
        </div>
        
      </form>
     </div> 
  </br>
  </div>
</div>
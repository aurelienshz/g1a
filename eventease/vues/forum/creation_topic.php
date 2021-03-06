<div class="wrapper prettyform">
  <div class="shadow">
    <div class="titleWrapper1">
      <img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
      <h2><i class="fa fa-question"></i>  Création d'un topic</h2>
      <img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
    </div>
    <div class="retour">
      <a class="button" href="<?php echo getLink(['forum'])?>">
          Retourner à l'accueil du forum
      </a>
    </div>
    <div class="form">
      <form action="<?php echo getLink(['forum','creation_topic']); ?>" method="post">
        <label for="titre" style="display:inline-block">Titre :</label>
        <input type="text" name="titre" placeholder="Titre" id="titre" style="width:60%; float:left; margin-bottom:0" >
        <?php echo isset($contents['errors']['titre'])?$contents['errors']['titre']:'' ?>
        </br></br>
        <div class="champ" style="width: 60%; display:inherit">
          <label for="message" style="display:inline-block">Message :</label> 
          <textarea name="message" id="message" placeholder="Votre message"></textarea>
          <?php echo isset($contents['errors']['message'])?$contents['errors']['message']:'' ?>
        </div>
        <label for="categorie">Catégorie :</label>
        <select name="id_section" id="categorie" style="width:20%; display:inherit; margin:0 0">
          <option value="0">--</option>
          <option value="1">Aide</option>
          <option value="2">Discussions</option>
         </select>
         <?php echo isset($contents['errors']['categorie'])?$contents['errors']['categorie']:'' ?>
         <h3><input type="submit" value="Créer un topic" style="width:20%; background-color:#36B136"/></h3>
        </div>
      </form>
     </div> 
  </br>
  </div>
</div>
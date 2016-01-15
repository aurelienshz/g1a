<div class="wrapper prettyform">
  <div class="shadow">
    <div class="titleWrapper1">
      <img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
      <h2><i class="fa fa-envelope-o"></i>  Nous contacter</h2>
      <img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
    </div>
    <div class="form">
      <form action="<?php echo getLink(['aide','formulaire_contact']); ?>" method="post">
        <label for="nom" style="display:inline-block">Nom :</label>
        <input type="text" name="nom" value="<?php echo $contents['prenom'] . " " . $contents['nom']?>" id="nom" style="width:60%; float:left; margin-bottom:0" >
        <?php echo isset($contents['errors']['titre'])?$contents['errors']['nom']:'' ?>
        </br></br>

        <label for="email" style="display:inline-block">Email :</label>
        <input type="text" name="email" value="<?php echo $contents['mail']?>" id="email" style="width:60%; float:left; margin-bottom:0" >
        <?php echo isset($contents['errors']['email'])?$contents['errors']['email']:'' ?>
        </br></br>

        <div class="champ" style="width: 60%; display:inherit">
          <label for="message" style="display:inline-block">Message :</label> 
          <textarea name="message" id="message" placeholder="Votre message"></textarea>
          <?php echo isset($contents['errors']['message'])?$contents['errors']['message']:'' ?>
        </div>
         <h3><input type="submit" value="Envoyer" style="width:20%; background-color:#36B136"/></h3>
        </div>
      </form>
     </div> 
    </div>
  </div>
</div>
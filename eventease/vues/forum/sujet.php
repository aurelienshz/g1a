<div class="wrapper prettyform">
  <div class="shadow">
    <div class="titleWrapper1">
      <img class="calendarPin" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
      <h2><i class="fa fa-comments"></i> Forum - Catégories </h2>
      <img class="calendarPin calendarPin2" src="<?php echo IMAGES.'calendar_pin_green.png'; ?>">
    </div>
    <div class="header2">
      <?php if (connected()){?>
      <div class="repondre">
          <a class="button" href="#champ1">
              Répondre à ce sujet
          </a>
      </div>
      <?php } 
      else { ?>
        <div class="repondre">
          <a class="button" href="<?php echo getLink(['membres','connexion'])?>")>
              Répondre à ce sujet
          </a>
      </div>
      <?php } ?>
      <div class="retour">
          <a class="button" href="<?php echo getLink(['forum'])?>">
              Retourner à l'accueil du forum
          </a>
      </div>
    </div>
    <div class="cadre">
      <div class="tableau">
        <div class="header">
          <h1><?php echo $contents['titre'];?></h1>
        </div>
        <div class="content_sujet">
          <p><small>Posté le <?php echo $contents['jour'] . "/" . $contents['mois'] . "/" . $contents['annee'] . " à " . $contents['heure'] . "h" . $contents['minute'];?>
          </br></br></small>
                <?php echo $contents['message'];?></br>
          </p>
          <div class="membre">
            <?php if ($contents['lien']){?>
              <img class="photo_profil" src="user_media/photos_profil/<?php echo $contents['lien']; ?>"></br>
              <strong><?php echo $contents['pseudo'];?></strong></br>
              <p><?php echo $contents['COUNT(*)'];?> message(s)</p>
              <?php } 
            else{?>
              <img class="photo_profil" src="user_media/photos_profil/photo_profil_defaut.jpg"></br>
              <strong><?php echo $contents['pseudo'];?></strong></br>
              <p><?php echo $contents['COUNT(*)'];?> message(s)</p>
              <?php } ?>
          </div>
        </div>
      </div>
      <div class="reponse">
        <?php foreach ($contents['comments'] as $key => $comments) {?>
          <div class="tableau">
            <div class="header">
              <h2><?php echo $comments['pseudo'];?></h2>
            </div>
            <div class="content_sujet">
              <p><small>Posté le <?php echo $comments['jour'] . "/" . $comments['mois'] . "/" . $comments['annee'] . " à " . $comments['heure'] . "h" . $comments['minute'];?></br></br></small>
                  <?php echo $comments['contenu'];?></p>
                <div class="membre">
                  <?php if ($comments['lien']){?>
                    <img class="photo_profil" src="user_media/photos_profil/<?php echo $comments['lien']; ?>"></br>
                  <?php }
                  else {?>
                    <img class="photo_profil" src="user_media/photos_profil/photo_profil_defaut.jpg"></br>
                  <?php }?>
                <strong><?php echo $comments['pseudo'];?></strong></br>
            </div>
            </div>
          </div>
        <?php } ?>
        <div class="tableau">
          <?php if (connected()){?>
          <div class="header">
            <h2><?php echo $contents['pseudo1']?></h2>
          </div>
          <div class="content_sujet1" >
            <form  method="post" action="<?php echo getLink(['forum','sujet',$contents['id']])?>" >
              <div class="champ1" id="champ1" >
                <textarea name="contenu" id="contenu" placeholder="Votre message" ></textarea>
                <h3><input type="submit" value="Envoyer" style="background-color:#36B136"/></h3>
              </div>
            </form>
            <div class="membre" style="margin-top:2px">
              <img class="photo_profil" src="user_media/photos_profil/<?php echo $contents['lien1']; ?>"></br>
              <strong><?php echo $contents['pseudo1']?></strong></br>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

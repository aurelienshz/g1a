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
    <form  action="<?php echo getLink(['forum','suppression',$contents['id'],'2'])?>" method="post" >
    <div class="cadre">
      <div class="tableau">
        <div class="header" style="height:60px">
          <?php if ($contents['id_what']==0){?>
            <h1><?php echo $contents['titre'];?></h1>
          <?php }
          else {?>
            <input type="text" name="titre" id="titre" placeholder="Votre titre" style="width:40%; height:50%; margin-top:15px" ></input>
          <?php } ?>
        </div>
        <div class="content_sujet">
          <div class="supprimer">
          <?php 
            if (connected()){
              if ($contents['id_auteur']==$_SESSION['id']){ ?>
                <form method="post" action="<?php echo getLink(['forum','suppression',$contents['id'],'2'])?>">
                  <a href="<?php echo getLink(['forum','sujet',$contents['id'],'2'])?>"><i class="fa fa-pencil"></i></a>
                </form>
                <form method="post" action="<?php echo getLink(['forum','suppression',$contents['id'],'1'])?>">
                  <a href="<?php echo getLink(['forum','suppression',$contents['id'],'1'])?>"><i class="fa fa-trash-o"></i></a>
                </form>
              <?php }
            } ?>
          </div>
          <?php if ($contents['id_what']==0){
            ?><p><small>Posté le <?php echo $contents['jour'] . "/" . $contents['mois'] . "/" . $contents['annee'] . " à " . $contents['heure'] . "h" . $contents['minute']?></br></br></small>
            <?php echo $contents['message'];?></br>
          </p>
          <?php }
          else {?>
            <div class="champ1" id="champ1" style="width:75%">
              <textarea name="message" id="message" placeholder="Votre message" ></textarea>
              <p id="lien"><a href="<?php echo getLink(['forum','sujet', $contents['id'],0]); ?>" style="float:right">Annuler</a></p>
              <h3><input type="submit" value="Modifier" style="background-color:#36B136;float:right;color:white"/></h3>
            </div>
          <?php }?>
          
          <div class="membre" style="margin-top:0">
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
      </form>
      <div class="reponse">
        <?php foreach ($contents['comments'] as $key => $comments) {?>
          <div class="tableau">
            <div class="content_sujet">
              <div class="supprimer">
              <?php 
                if (connected()){
                  if ($comments['id_auteur']==$_SESSION['id']){?>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-trash-o"></i></a>
                  <?php }
                } ?>
              </div>
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
          <div class="content_sujet1" >
            <form  method="post" action="<?php echo getLink(['forum','sujet',$contents['id']])?>" >
              <div class="champ1" id="champ1" >
                <textarea name="contenu" id="contenu" placeholder="Votre message" ></textarea>
                <h3><input type="submit" value="Envoyer" style="background-color:#36B136"/></h3>
              </div>
            </form>
            <div class="membre" style="width:9%;margin-top:0px,float:none">
              <img class="photo_profil" src="user_media/photos_profil/<?php echo isset($contents['lien1'])?$contents['lien1']:'photo_profil_defaut.jpg'; ?>"></br>
              <strong><?php echo $contents['pseudo1']?></strong></br>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
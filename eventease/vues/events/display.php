<?php echo '<script>';
echo 'var id_event = ' . json_encode($_GET['id']) . ';';
echo '</script>';
?>

<div class="wrapper">
      <?php echo isset($contents['statut_de_participation'])?$contents['statut_de_participation']:''; ?>
    <div class ="intro_evenement">
        <div class = "photo_evenement">
            <img src="<?php echo $contents['photo_principale'];?>"/>
        </div>
        <div class = "title_event">
            <h1><?php echo $contents['titreEvenement']; ?></h1>
        </div>
        <div class ="infos">
            <div id="useful_infos">
                <ul>
                    <li> <i class="maclasse fa fa-calendar-o"></i>   <?php echo 'Du ' . $contents['day_begin'] . '-' . $contents['month_begin'] . '-' . $contents['year_begin'] . ' au ' . $contents['day_end'] . '-' . $contents['month_end'] . '-' . $contents['year_end'] ; ?></li>
                    <li> <i class="maclasse fa fa-clock-o"></i>     De <?php echo $contents['heure_debut']; ?> à <?php echo $contents['heure_fin']; ?> </li>
                    <li> <i class="maclasse fa fa-map"></i>   <?php echo $contents['adresse'][0]; ?></li>
			    </ul>
            </div>
		  <div class="buttons">
			<ul>
                <?php if(connected()) { ?>
                    <li><a class="button" id='participe' onclick="participate(id_event);"><?php echo $contents['participe'];?></a></li>
                <?php }
                else { ?>
                    <li><a class="button" id='participe' href="<?php echo getLink(['membres','connexion']); ?>"><?php echo $contents['participe'];?></a></li>
                <?php } ?>

                <?php echo isset($contents['bouton_special'])?$contents['bouton_special']:'';?>
                <li><a class="button" href="<?php echo getLink(['events','invite',$_GET['id']]); ?>" ><i class="fa fa-plus"></i> Inviter un ami </a></li>
			</ul>
		  </div>
            <div class="social">
                <table>
                <!-- Non Customisé Envoie des messages statiques -->
                    <tr>
                            <td><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Feventease.ohhopi.com&t=" title="Share on Facebook" target="_blank"><i class="facebook fa fa-facebook-official"></i></a></td>
							<td><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fwww.eventease.ohhopi.com&text=:%20http%3A%2F%2Feventease.ohhopi.com" target="_blank" title="Tweet"><i class="twitter fa fa-twitter-square"></i></a></td>
					</tr>
                    <tr>
                            <td><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Feventease.ohhopi.com&description=" target="_blank" title="Pin it"><i class="pinterest fa fa-pinterest-square"></i></a></td>
                            <td><a href="mailto:?subject=&body=:%20http%3A%2F%2Feventease.ohhopi.com" target="_blank" title="Email"><i class="mail fa fa-envelope-square"></i></a></td>
					</tr>
                </table>
            </div>
        </div>
    </div>

    <div class ="description">
        <h2>Description</h2>
        <p>
		        <?php echo $contents['description']; ?>
        </p>
        <section id="carte">
      <iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC02_hTBcl3SqHYTvraoftcwhPxkRSeCWA&q=<?php echo str_replace(' ', '+', $contents['adresse'][0]); ?>" allowfullscreen></iframe>
    </section>
				<div class="details">
		<ul>
            <li class="fixed_details">Type</li>
            <li><?php echo $contents['type']; ?> </li>
            <li class="fixed_details">Prix</li>
            <li> <?php if (is_null($contents['tarif'])) {echo 'Non renseigné';} else {echo $contents['tarif'] . ' €';} ?> </li>
            <li class="fixed_details">Visibilité</li>
            <li><?php echo $contents['visibilite']; ?></li>
            <li class="fixed_details">Nombre maximum de participants</li>
            <li><?php echo $contents['max_participants'];?></li>
            <li class="fixed_details">Type de public</li>
            <li><?php if (is_null($contents['age_min']) && is_null($contents['age_max'])) {echo 'Tout public'; }
                      elseif ((is_null($contents['age_min'])) && $contents['age_max']==1) {echo 'Jusqu\'à ' . $contents['age_max'] . ' an'; }
                      elseif ((is_null($contents['age_min'])) && !(is_null($contents['age_max']))) {echo 'Jusqu\'à ' . $contents['age_max'] . ' ans'; }
                      elseif (($contents['age_min']==1) && (is_null($contents['age_max']))) {echo 'À partir de ' . $contents['age_min'] . ' an' ; }
                      elseif (!(is_null($contents['age_min'])) && (is_null($contents['age_max']))) {echo 'À partir de ' . $contents['age_min'] . ' ans' ; }
                      else{echo 'De ' . $contents['age_min'] . ' à ' . $contents['age_max'] . ' ans'; } ?></li>
            <li class="fixed_details">Langue</li>
            <li><?php echo $contents['langue']; ?></li>
            <li class="fixed_details">Organisateur</li>
            <li><?php echo $contents['info_organisateur']; ?><?php isset($contents['info_organisateur_contact'])?$contents['info_organisateur_contact']:''; ?></li>
            <li class="fixed_details">Site web</li>
            <?php echo $contents['site']; ?>
          </ul>

				</div>
    </div>

    <section id="photos" <?php if (!array_key_exists(1, $contents['images']) && !array_key_exists(2, $contents['images'])) {echo 'style=display:none';} ?>>
			<div class="simple-slideshow">
        <?php foreach($contents['images'] as $image){
            ?><div class="image"><img src="<?php echo PHOTO_EVENT.$image['lien']; ?>"/></div>
        <?php
          }
          ?>
      </div>
    </section>
    <div class = "organisation">
		<div class = "hosts">
    		<h2>Modérateurs</h2>
      			<ul>
              <li><img src="<?php echo isset($contents['creator']['picture'])?$contents['creator']['picture']:''; ?>"/><a href="<?php echo getLink(['membres','profil',isset($contents['creator'][0][1])?$contents['creator'][0][1]:'']); ?>" target="_blank"><?php echo ' '. isset($contents['creator'][0][0])?$contents['creator'][0][0]:'' . ' (Créateur de l\'événement)';?></a></li>
                      <?php
                          $compteur=0;
                          foreach($contents['creators'] as $creators)
                          {
                              if ($compteur>4) {echo "cliquez ici pour afficer plus d'organisateurs.";}
                      ?>
                              <li><img src="<?php echo $contents['creators'][$compteur]['picture'];?>"/><a href="<?php echo getLink(['membres','profil',$creators[1]]); ?>" target="_blank"><?php echo ' '. $creators[0];?></a></li>
                      <?php
                              $compteur++;
                          }
                      ?>
		</div>
		<div class = "friends_going">
		<h2> Personnes qui y vont </h2>
		<table style="width=100%">
            <?php
                $compteur=-1;
                foreach($contents['participants'] as $participant){
                  $compteur++;
                    if($compteur%4==0)
                    {
            ?>
                        <tr height="15%">
            <?php
                    }
                    else {}
            ?>
              <?php if ($compteur>7) {echo '';}
                    else{ ?>
                    <td><img src="<?php echo $participant['picture']; ?>"/><a href="<?php echo getLink(['membres','profil',$participant[1]]); ?>" target="_blank"><?php echo '<br/>'. $participant[0];?></a></td>
            <?php
                    }
            }
            ?>
		</table>
		</div>
    </div>
    <div class = "commentaire">
		<h2> Commentaires </h2>
		<div class="add_comment">
            <form id='insert_comment' action="<?php $_SERVER['REQUEST_URI'];?>" method="post" />
                <label>Ajouter un commentaire</label>
                <textarea name="comment" id="comment" placeholder="Ajouter un commentaire"></textarea>
          			<input name ='submit' type="submit" value="Ajouter" id="button_submit" />
            </form>
		</div>
		<div class="previous_comments">
			<div class="comment">
                <?php
                    $i=0;
                    foreach($contents['comment'] as $commentaire)
                    {
                      var_dump($commentaire);
                    ?><p><img src="<?php echo $commentaire['picture']; ?>"/><a href="<?php echo getLink(['membres','profil',$commentaire[3]]); ?>" target="_blank"><?php echo ' ' . $commentaire[0]; ?></a> <?php echo $commentaire[2] . $contents['comment'][$i]['moderation_commentaire']; $i++;?>

                    <p><?php echo $commentaire[1];?></p>

                <?php
                    }
                ?>
			</div>
		</div>
    </div>

</div>

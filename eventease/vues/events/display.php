
<div class="wrapper">
    <div class ="intro_evenement">
        <div class = "photo_evenement">
            <img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                            else {$img = $contents['images'][0][0];}
                            echo PHOTO_EVENT.$img; ?>" alt="Coucou"/>
        </div>
        <div class = "title_event">
            <h1><?php echo $contents['titreEvenement']; ?></h1>
        </div>
        <div class ="infos">
            <div id="useful_infos">
                <ul>
                    <li> <i class="maclasse fa fa-calendar-o"></i>   <?php echo $contents['day'] . '-' . $contents['month'] . '-' . $contents['year']; ?></li>
                    <li> <i class="maclasse fa fa-clock-o"></i>     De <?php echo $contents['heure_debut']; ?> à <?php echo $contents['heure_fin']; ?> </li>
                    <li> <i class="maclasse fa fa-map"></i>   <?php echo $contents['adresse'][0]; ?></li>
			    </ul>
            </div>
		  <div class="buttons">
			<ul>
                <li> <a class="button" href="#" > Participe </a></li>
	            <li><a class="button" href="#" >Participe peut-être</a></li>
                <li><a class="button" href="#" > Ne participe pas </a></li>
			</ul>
		  </div>
            <div class="social">
                <table>
                    <tr>

                            <td><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.eventease.ohhopi.com&t=" title="Share on Facebook" target="_blank">
								<img src=<?php echo IMAGES.'Facebook.png'; ?>></a></td>
							<td><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fwww.eventease.ohhopi.com&text=:%20http%3A%2F%2Fwww.eventease.ohhopi.com" target="_blank" title="Tweet">
								<img src=<?php echo IMAGES.'Twitter.png'; ?>></a></td>
					</tr>
                    <tr>
                            <td><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.eventease.ohhopi.com&description=" target="_blank" title="Pin it">
								<img src=<?php echo IMAGES.'Pinterest.png'; ?>></a></td>
                            <td><a href="mailto:?subject=&body=:%20http%3A%2F%2Fwww.eventease.ohhopi.com" target="_blank" title="Email">
								<img src=<?php echo IMAGES.'Email.png'; ?>></a></td>
					</tr>
                </table>
                </ul>
            </div>
        </div>
    </div>

    <div class ="description">
        <h2>Description</h2>
        <p>
		        <?php echo $contents['description']; ?>
        </p>
				<div class="details">
		<ul>
            <li class="fixed_details">Type :</li>
            <li><?php echo $contents['type']; ?> </li>
            <li class="fixed_details">Prix :</li>
            <li> <?php echo $contents['tarif']; ?> €</li>
            <li class="fixed_details">Visibilité :</li>
            <li><?php echo $contents['visibilite']; ?></li>
            <li class="fixed_details">Type de public</li>
            <li><?php if (is_null($contents['age_min']) && is_null($contents['age_max'])) {echo 'Tout public'; }
                      elseif ((is_null($contents['age_min'])) && $contents['age_max']==1) {echo 'Jusqu\'à ' . $contents['age_max'] . ' an'; }
                      elseif ((is_null($contents['age_min'])) && !(is_null($contents['age_max']))) {echo 'Jusqu\'à ' . $contents['age_max'] . ' ans'; }
                      elseif (($contents['age_min']==1) && (is_null($contents['age_max']))) {echo 'À partir de ' . $contents['age_min'] . ' an' ; }
                      elseif (!(is_null($contents['age_min'])) && (is_null($contents['age_max']))) {echo 'À partir de ' . $contents['age_min'] . ' ans' ; }
                      else{echo 'De ' . $contents['age_min'] . ' à ' . $contents['age_max'] . ' ans'; } ?></li>
            <li class="fixed_details">Langue :</li>
            <li><?php echo $contents['langue']; ?></li>
            <li class="fixed_details">Sponsor(s)</li>
            <li><?php echo $contents['sponsor']; ?></li>
            <li class="fixed_details">Site web :</li>
            <li><a href="<?php echo $contents['site']; ?>"><?php echo $contents['site']; ?></a></li>
          </ul>
				</div>
    </div>
    <section id="photos">
			<div>
                <div class="previous"><td>&lt;</td></div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][0][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][0][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][0][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][0][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="next">&gt;</div>
          </div>
		  <div>
                <div class="previous">&lt;</div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][1][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][1][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][1][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="image"><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                                else {$img = $contents['images'][1][0];}
                                echo PHOTO_EVENT.$img; ?>" alt="Coucou"/></div>
                <div class="next">&gt;</div>
			</div>
    </section>
    <div class = "organisation">
		<div class = "hosts">
		<h2>Organisateurs</h2>
			<ul>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#"><?php if (!$contents['creators']) {echo 'Pas d\'organisateur';} else {echo $contents['creators'][0][0];} ?></a> </li>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#"><?php if (!$contents['creators']) {echo 'Pas d\'organisateur';} else {echo $contents['creators'][1][0];} ?></a> </li>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#"><?php if (!$contents['creators']) {echo 'Pas d\'organisateur';} else {echo $contents['creators'][2][0];} ?></a> </li>
		</div>
		<div class = "friends_going">
		<h2> Vos amis qui y vont </h2>
		<table style="width=100%">
			<tr height="15%">
				<td><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                        else {$img = $contents['images'][1][0];}
                        echo IMAGES."$img"; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                        else {$img = $contents['images'][1][0];}
                        echo IMAGES."$img"; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                        else {$img = $contents['images'][1][0];}
                        echo IMAGES."$img"; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php if ((!$contents['images'])) {$img = 'picnic1.jpg' ;}
                        else {$img = $contents['images'][1][0];}
                        echo IMAGES."$img"; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
			</tr>
			<tr>
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
			</tr>
		</table>
		</div>
    </div>
    <div class = "commentaire">
		<h2> Commentaires </h2>
		<div class="add_comment">
            <form>
				<img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/><br><br>
                <label>Ajouter un commentaire</label>
                <textarea id="comment" placeholder="Ajouter un commentaire"></textarea>
    			<div class="add_media">
    				<label for="attachment">Ajouter un fichier</label>
                    <input type="file" id="attachment" name="attachment"/>
    			</div>
    			<input type="submit" value="Ajouter" id="button_submit" />
            </form>
		</div>
		<div class="previous_comments">
			<div class="comment">
				<p><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="photo de profil"/> <a href="#">Pseudo</a> <span>- Date du commentaire</span>
          <br>
          <br>
          <?php echo $contents['comment']; ?>
        </p>
			</div>
			<div class="comment">
				<p><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="photo de profil"/> <a href="#">Pseudo</a> <span>- Date du commentaire</span>
		      <br>
          <br>
          Chercher le message dans la base de données.
				</p>
			</div>
		</div>
    </div>

</div>

<?php   foreach($contents as $comment) {print_r($comment) . '<br/>';} ?>
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
                    <li> <i class="maclasse fa fa-calendar-o"></i>   <?php echo 'Du ' . $contents['day_begin'] . '-' . $contents['month_begin'] . '-' . $contents['year_begin'] . ' au ' . $contents['day_end'] . '-' . $contents['month_end'] . '-' . $contents['year_end'] ; ?></li>
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
            <li class="fixed_details">Type</li>
            <li><?php echo $contents['type']; ?> </li>
            <li class="fixed_details">Prix</li>
            <li> <?php if (is_null($contents['tarif'])) {echo 'Non renseigné';} else {echo $contents['tarif'] . ' €';} ?> </li>
            <li class="fixed_details">Visibilité</li>
            <li><?php echo $contents['visibilite']; ?></li>
            <li class="fixed_details">Type de public</li>
            <li><?php if (is_null($contents['age_min']) && is_null($contents['age_max'])) {echo 'Tout public'; }
                      elseif ((is_null($contents['age_min'])) && $contents['age_max']==1) {echo 'Jusqu\'à ' . $contents['age_max'] . ' an'; }
                      elseif ((is_null($contents['age_min'])) && !(is_null($contents['age_max']))) {echo 'Jusqu\'à ' . $contents['age_max'] . ' ans'; }
                      elseif (($contents['age_min']==1) && (is_null($contents['age_max']))) {echo 'À partir de ' . $contents['age_min'] . ' an' ; }
                      elseif (!(is_null($contents['age_min'])) && (is_null($contents['age_max']))) {echo 'À partir de ' . $contents['age_min'] . ' ans' ; }
                      else{echo 'De ' . $contents['age_min'] . ' à ' . $contents['age_max'] . ' ans'; } ?></li>
            <li class="fixed_details">Langue</li>
            <li><?php echo $contents['langue']; ?></li>
            <li class="fixed_details">Sponsor(s)</li>
            <li><?php echo $contents['sponsor']; ?></li>
            <li class="fixed_details">Site web</li>
            <li><a href="<?php echo $contents['site']; ?>"><?php echo $contents['site']; ?></a></li>
          </ul>
				</div>
    </div>
    <section id="photos" <?php if (!array_key_exists(1, $contents['images']) && !array_key_exists(2, $contents['images'])) {echo 'style=display:none';} ?>>
			<div>
                <div class="slideshow-container">
                    <div class="previous"><td>&lt;</td></div>
                    <div class="image"><img src="<?php if (!array_key_exists(1,$contents['images'])) {echo '' ;} else {echo PHOTO_EVENT.$contents['images'][1][0];}?>"/></div>
                    <div class="next">&gt;</div>
                </div>
          </div>
		  <div>
            <div class="slideshow-container">
                <div class="previous">&lt;</div>
                <div class="image"><img src="<?php if (!array_key_exists(2,$contents['images'])) {echo '' ;} else {echo PHOTO_EVENT.$contents['images'][2][0];}?>"/></div>
                <div class="next">&gt;</div>
            </div>
		</div>
    </section>
    <div class = "organisation">
		<div class = "hosts">
		<h2>Organisateurs</h2>
			<ul>
				<li> <img src="<?php if (array_key_exists(0, $contents['creators'])) {echo  PHOTO_PROFIL.$contents['creators'][0][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['creators'][0][1]]); ?>"><?php if (!array_key_exists(0, $contents['creators'])) {echo "</a>" . 'Pas d\'organisateur';} else {echo $contents['creators'][0][0];} ?></a> </li>
				<li> <img src="<?php if (array_key_exists(1, $contents['creators'])) {echo  PHOTO_PROFIL.$contents['creators'][1][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['creators'][1][1]]); ?>"><?php if (!array_key_exists(1, $contents['creators'])) {echo "</a>" . '';} else {echo $contents['creators'][1][0];} ?></a> </li>
				<li> <img src="<?php if (array_key_exists(2, $contents['creators'])) {echo  PHOTO_PROFIL.$contents['creators'][2][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['creators'][2][1]]); ?>"><?php if (!array_key_exists(2, $contents['creators'])) {echo "</a>" . '';} else {echo $contents['creators'][2][0];} ?></a> </li>
		</div>
		<div class = "friends_going">
		<h2> Personnes qui y vont </h2>
		<table style="width=100%">
			<tr height="15%">
				<td><img src="<?php if (array_key_exists(0, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][0][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][0][1]]); ?>"/><br><?php if (!$contents['participants']) {echo "</a>" . 'Pas de participant';} else {echo $contents['participants'][0][0];} ?></a></td>
				<td><img src="<?php if (array_key_exists(1, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][1][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][1][1]]); ?>"/><br><?php if (array_key_exists(1, $contents['participants'])) {echo $contents['participants'][1][0];} else {echo "</a>" . '';} ?></a></td>
				<td><img src="<?php if (array_key_exists(2, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][2][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][2][1]]); ?>"/><br><?php if (array_key_exists(2, $contents['participants'])) {echo $contents['participants'][2][0];} else {echo "</a>" . '';} ?></a></td>
				<td><img src="<?php if (array_key_exists(3, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][3][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][3][1]]); ?>"/><br><?php if (array_key_exists(3, $contents['participants'])) {echo $contents['participants'][3][0];} else {echo "</a>" . '';}?></a></td>
			</tr>
			<tr>
        <td><img src="<?php if (array_key_exists(4, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][4][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][4][1]]); ?>"/><br><?php if (array_key_exists(4, $contents['participants']))  {echo $contents['participants'][4][0];} else {echo "</a>" . '';} ?></a></td>
				<td><img src="<?php if (array_key_exists(5, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][5][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][5][1]]); ?>"/><br><?php if (array_key_exists(5, $contents['participants']))  {echo $contents['participants'][5][0];} else {echo "</a>" . '';} ?></a></td>
				<td><img src="<?php if (array_key_exists(6, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][6][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][6][1]]); ?>"/><br><?php if (array_key_exists(6, $contents['participants']))  {echo $contents['participants'][6][0];} else {echo "</a>" . '';} ?></a></td>
				<td><img src="<?php if (array_key_exists(7, $contents['participants'])) {echo  PHOTO_PROFIL.$contents['participants'][7][2];} else {echo ' ';} ?>" /> <a href="<?php echo getLink(['membres','profil',$contents['participants'][7][1]]); ?>"/><br><?php if (array_key_exists(7, $contents['participants']))  {echo $contents['participants'][7][0];} else {echo "</a>" . '';} ?></a></td>
			</tr>
		</table>
		</div>
    </div>
    <div class = "commentaire">
		<h2> Commentaires </h2>
		<div class="add_comment">
            <form>
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
				<p><img src="<?php if (array_key_exists(0, $contents['comment'])) {echo  PHOTO_PROFIL.$contents['comment'][0][3];} else {echo ' ';} ?>"/> <a href="<?php echo getLink(['membres','profil',$contents['comment'][0][4]]); ?>"><?php if (array_key_exists(0, $contents['comment'])) {echo $contents['comment'][0][0];} else {echo '';} ?></a> <span><?php if (array_key_exists(0, $contents['comment'])) {echo '- ' . $contents['comment'][0][2];} else {echo '';} ?></span>
          <br>
          <br>
          <?php if (array_key_exists(0, $contents['comment'])) {echo $contents['comment'][0][1];} else {echo '';} ?>
        </p>
			</div>
      <div class="comment">
        <p><img src="<?php if (array_key_exists(1, $contents['comment'])) {echo  PHOTO_PROFIL.$contents['comment'][1][3];} else {echo ' ';} ?>"/> <a href="<?php echo getLink(['membres','profil',$contents['comment'][1][4]]); ?>"><?php if (array_key_exists(1, $contents['comment'])) {echo $contents['comment'][1][0];} else {echo '';} ?></a> <span><?php if (array_key_exists(1, $contents['comment'])) {echo '- ' . $contents['comment'][1][2];} else {echo '';} ?></span>
          <br>
          <br>
          <?php if (array_key_exists(1, $contents['comment'])) {echo $contents['comment'][1][1];} else {echo '';} ?>
        </p>
			</div>
		</div>
    </div>

</div>

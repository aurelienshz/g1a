<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1693490350897371',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">
    <div class ="intro_evenement">
        <div class = "photo_evenement">
            <img src="<?php echo IMAGES.'picnic1.jpg'; ?>" alt="Coucou"/>
        </div>
        <div class = "title_event">
            <h1><?php echo $contents['titreEvenement']; ?></h1>
        </div>
        <div class ="infos">
            <div id="useful_infos">
                <ul>
                    <li> <i class="maclasse fa fa-calendar-o"></i>   Date</li>
                    <li> <i class="maclasse fa fa-clock-o"></i>     Heure </li>
                    <li> <i class="maclasse fa fa-map"></i>54 rue Lecourbe, 75015, Paris</li>
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
                            <td><a href="https://www.facebook.com/dialog/share?app_id=1693490350897371&display=popup&href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer"><i class="facebook fa fa-facebook-square"></i></a>
                            <td><a href="#"><i class="twitter fa fa-twitter-square"></i></a>
                    <tr>
                            <td><a href="#"><i class="pinterest fa fa-pinterest"></i></a>
                            <td><a href="#"><i class="mail fa fa-envelope-o"></i></a>
                </table>
                </ul>
            </div>
        </div>
    </div>

    <div class ="description">
        <h2>Description</h2>
		<p>“One thing was certain, that the WHITE kitten had had nothing to do with it:—it was the black kitten's fault entirely. For the white kitten had been having its face washed by the old cat for the last quarter of an hour (and bearing it pretty well, considering); so you see that it COULDN'T have had any hand in the mischief.

The way Dinah washed her children's faces was this: first she held the poor thing down by its ear with one paw, and then with the other paw she rubbed its face all over, the wrong way, beginning at the nose: and just now, as I said, she was hard at work on the white kitten, which was lying quite still and trying to purr—no doubt feeling that it was all meant for its good.

But the black kitten had been finished with earlier in the afternoon, and so, while Alice was sitting curled up in a corner of the great arm-chair, half talking to herself and half asleep, the kitten had been having a grand game of romps with the ball of worsted Alice had been trying to wind up, and had been rolling[…]”
    <br></p>
				<div class="details">
		<ul>
            <li class="fixed_details">Type :</li>
            <li>Brocante </li>
            <li class="fixed_details">Prix :</li>
            <li> 4 €$*¥</li>
            <li class="fixed_details">Visibilité :</li>
            <li>Public</li>
            <li class="fixed_details">Type de public</li>
            <li>de 7 à 77 ans</li>
            <li class="fixed_details">Langue :</li>
            <li>Français</li>
            <li class="fixed_details">Sponsors</li>
            <li>Seven'tease</li>
            <li class="fixed_details">Site web :</li>
            <li><a href="http://www.asos.fr">asos.fr</a></li>
          </ul>
				</div>
    </div>
    <div class = "photo">
        <table>
            <tr>
                <td id="left_arrow">&lt;</td>
                <td><img src="<?php echo IMAGES.'img.jpg'; ?>"/></td>
                <td><img src="<?php echo IMAGES.'img.jpg'; ?>"/></td>
                <td><img src="<?php echo IMAGES.'img.jpg'; ?>"/></td>
                <td><img src="<?php echo IMAGES.'img.jpg'; ?>"/></td>
                <td id="right_arrow">&gt;</td>
            </tr>
        </table>
    </div>
    <div class = "organisation">
		<div class = "hosts">
		<h2>Organisateurs</h2>
			<ul>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#">Pseudo</a> </li>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#">Pseudo</a> </li>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#">Pseudo</a> </li>
			</ul>
		</div>
		<div class = "friends_going">
		<h2> Vos amis qui y vont </h2>
		<table style="width=100%">
			<tr height="15%">
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
				<td><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="Ami"/> <a href="#"><br>Pseudo</a></td>
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
          Chercher le message dans la base de données.
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

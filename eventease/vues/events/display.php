<div class="wrapper">
    <div class ="intro_evenement">
        <div class = "photo_evenement">
            <img src="<?php echo IMAGES.'picnic1.jpg'; ?>" alt="Coucou"/>
        </div>
        <div class = "title_event">
            <h1>Nom de l'événement </h1>
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
                <li> <a id="Participe" href="#" > Participe </a></li>
			     <li><a href="#" >Participe peut-être</a></li>
                 <li><a class="active" href="#" > Ne participe pas </a></li>
			</ul>
		  </div>
            <div class="social">
                <table>
                    <tr>
                            <td><a href="#"><i class="facebook fa fa-facebook-square"></i></a>
                            <td><a href="#"><i class="twitter fa fa-twitter-square"></i></a>
                    <tr>
                            <td><a href="#"><i class="linkedin fa fa-linkedin-square"></i></a>
                            <td><a href="#"><i class="mail fa fa-envelope-o"></i></a>
                </table>
                </ul>
            </div>
        </div>
    </div>
    <div class ="description">
        <h2>Description</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet libero vitae
		tincidunt egestas. Duis ultricies lobortis risus sed pretium. Nulla iaculis leo sed fringilla
		efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
		<h3>Organisateurs</h3>
			<ul>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#">Pseudo</a> </li>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#">Pseudo</a> </li>
				<li> <img src="<?php echo IMAGES.'img.jpg'; ?>" alt="organisateur"/> <a href="#">Pseudo</a> </li>
			</ul>
		</div>
		<div class = "friends_going">
		<h3> Vos amis qui y vont </h3>
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
		<h3> Commentaires </h3>
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
				<p><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="photo de profil"/> <a href="#">Pseudo</a> <span>- Date du commentaire</span>
				<br>Commentaire...................................................................................................
				</p>
			</div>
			<div class="comment">
				<p><img src="<?php echo IMAGES.'img.jpg'; ?>" alt="photo de profil"/> <a href="#">Pseudo</a> <span>- Date du commentaire</span>
				<br>Commentaire...
				</p>
			</div>
		</div>
    </div>

</div>

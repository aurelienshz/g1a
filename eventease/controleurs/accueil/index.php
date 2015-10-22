<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?> | EventEase</title>
    <link rel="stylesheet" href="<?php echo CSS.'style.css' ?>" type="text/css" media="all" />

</head>
<body>
    <header class="">
        <h1>
            <a href="#">
                <img src="<?php echo IMAGES . 'logo.jpg'; ?>" alt="EventEase" />
            </a>
        </h1>
        <nav>
          <ul id="raccourcis">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Créer</a></li>
            <li><a href="#">Chercher</a></li>
          </ul>
          <ul id="membre">
            <li><a href="#">Connexion</a></li>
            <li><a href="#">Inscription</a></li>
          </ul>
        </nav>
    </header>
    
    <section id="bigform">
    <p id="catchphrase">Best catchphrase ever</p>
    <p id="subcatchphrase">Do we really need a subcatchphrase?</p>
        <form>
            <input id="foo" type="text" placeholder="Texte"/>
            <select>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <select>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <input type="submit" value="Rechercher"/>
        </form>
        <a href="#"><div id="boutoncreer">Créer un évènement</div></a>
    </section>
    
    <section id="suggestions">
      <div class="row">
        <div class="col">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col">
            <img src="<?php echo IMAGES . 'img.jpg' ?>" alt="Texte alternatif" />
        </div>
        <div class="col">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <img src="<?php echo IMAGES . 'img.jpg' ?>" alt="Texte alternatif" />
        </div>
        <div class="col">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col">
            <img src="<?php echo IMAGES . 'img.jpg' ?>" alt="Texte alternatif" />   
        </div>
      </div>
    </section>
    
    <section id="features">
        <div class="col"><img src="<?php echo IMAGES . 'img.jpg' ?>" alt="Texte alternatif" /></div>
        <div class="col"><img src="<?php echo IMAGES . 'img.jpg' ?>" alt="Texte alternatif" /></div>
        <div class="col"><img src="<?php echo IMAGES . 'img.jpg' ?>" alt="Texte alternatif" /></div>
    </section>
    
    <footer>
      <div class="footer-row">
        <div class="col-3">
            <a href="#">Mes évènements</a><br />
            <a href="#">Messages</a><br />
            <a href="#">Forum</a><br />
            <a href="#">Profil</a><br />
            <a href="#">Paramètres</a><br />
        </div>
        <div class="col-3">
            <h3>Aide</h3>
            <a href="#">Questions fréquentes</a><br />
            <a href="#">Nous contacter</a><br />
        </div>
        <div class="col-3">
            <h3>Société</h3>
            <a href="#">A propos</a><br />
            <a href="#">Charte / Règles ?</a><br />
            <a href="#">CGU</a><br />
        </div>
        </div>
      </div>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Titre</title>
    <link rel="stylesheet" href="<?php echo CSS.'style.css' ?>" type="text/css" media="all" />

</head>
<body>
    <header class="">
        <h1>
            <a href="#"><img src="<?php echo IMAGES . 'logo.jpg'; ?>" alt="EventEase" /></a>
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
    
    <div id="bigform">
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
    </div>
    
    <div id="suggestions">
        <div class="col-red">1<br/><br/><br/>11</div>
        <div class="col-center">2</div>
        <div class="col-blue">3</div>
    </div>
    
    <div id="features">
        <div class="col-blue">1</div>
        <div class="col-red">2</div>
        <div class="col-green">3</div>
    </div>
    
    <footer>Footer</footer>
</body>
</html>
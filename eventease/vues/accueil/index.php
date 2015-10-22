<?php
/**** VUE : ACCUEIL ****/
?>
   
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
<?php
/**** VUE : ACCUEIL ****/
?>

<section id="bigform">
<p id="catchphrase">Do you even tease ?</p>
<p id="subcatchphrase">Bonjour !</p>
    <form method="post" action="">
        <input type="text" placeholder="Texte"/><!--
     --><select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select><!--
     --><select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select><!--
     --><input type="submit" value="Rechercher"/>
    </form>
    <div id="createButtonContainer">
        <a href="<?php echo getLink(['events','create']); ?>">
            <div id="createButton">Créer un évènement</div>
        </a>
    </div>
</section>

<div class="wrapper">
    <section class="triptyque" id="suggestions">
        <h4>Rien que pour vous</h4>
    	    <div class="row">
                <div class="col-3"><h5>Une envie de ?</h5></div>
                <div class="col-3"><h5>Près de vous</h5></div>
                <div class="col-3"><h5 class="subtitles" >Tout de suite</h5></div>
            </div>
    	  <div class="row">
    		<div class="col-3">
    			<span class="slideshowSelector">&lt;</span>
    			<div class="slideshowContent">
    				<div class="firstArgument">Type</div>
    				<div class="otherArgument">Titre | Date & Heure | Lieu</div>
    				<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus eros in ante egestas feugiat. Sed suscipit orci id nunc blandit, eget bibendum metus viverra. Nam et mattis risus. </div>
    			</div>
    			<span class="slideshowSelector">&gt;</span>
    		</div>
    		<div class="col-3">
    			<span class="slideshowSelector">&lt;</span>
    			<div class="slideshowContent">
    				<div class="firstArgument">Type</div>
    				<div class="otherArgument">Titre | Date & Heure | Lieu</div>
    				<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus eros in ante egestas feugiat. Sed suscipit orci id nunc blandit, eget bibendum metus viverra. Nam et mattis risus. </div>
    			</div>
    			<span class="slideshowSelector">&gt;</span>
    		</div>
    		<div class="col-3">
    			<span class="slideshowSelector">&lt;</span>
    			<div class="slideshowContent">
    				<div class="firstArgument">Type</div>
    				<div class="otherArgument">Titre | Date & Heure | Lieu</div>
    				<div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus eros in ante egestas feugiat. Sed suscipit orci id nunc blandit, eget bibendum metus viverra. Nam et mattis risus. </div>
    			</div>
    			<span class="slideshowSelector">&gt;</span>
    		</div>
    	  </div>
    </section>
</div> <!-- /wrapper -->

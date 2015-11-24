    <footer>
        <div id ="footerWrapper">
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
        </div>
    </footer>
<?php
    foreach($scripts as $script) {
    echo '<script src="'.SCRIPTS.$script.'"></script>';
    }
?>
</body>
</html>

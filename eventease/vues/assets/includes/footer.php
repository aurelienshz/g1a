    <footer>
        <div id ="footerWrapper">
            <div class="footer-row">
                <div class="col-3">
                    <a href="<?php echo getLink(['membres','evenements']); ?>">Mes évènements</a><br />
                    <a href="<?php echo getLink(['membres','messages']); ?>">Messages</a><br />
                    <a href="<?php echo getLink(['forum']); ?>">Forum</a><br />
                    <a href="<?php echo getLink(['membres','profil']); ?>">Profil</a><br />
                    <a href="<?php echo getLink(['membres','modification_profil']); ?>">Paramètres</a><br />
                </div>
                <div class="col-3">
                    <h3>Aide</h3>
                    <a href="#">Questions fréquentes</a><br />
                    <a href="#">Nous contacter</a><br />
                    <a href="#">Plan du site</a><br />
                </div>
                <div class="col-3">
                    <h3>EventEase</h3>
                    <a href="#">A propos</a><br />
                    <a href="<?php echo getLink(['accueil', 'legal']); ?>">Mentions légales</a><br />
                    <a href="#">CGU</a><br /><br />
                    <a href='#' style='color:#303030;'>Administration</a>
                </div>
                </div>
            </div>
        </div>
    </footer>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC02_hTBcl3SqHYTvraoftcwhPxkRSeCWA&libraries=places"></script>

<?php
    foreach($scripts as $script) {
    echo '<script src="'.SCRIPTS.$script.'"></script>'."\n";
    }
?>

</body>
</html>

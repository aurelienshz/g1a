<?php
/* BARRE DE DEBUG : */

function displayDebug() {
    echo '<div id="debug">';
    echo 'user connecté : ';
    echo $_SESSION['connected'] ? "Oui <br />" : "Non <br />";
    $maquettes = ['displayEvent','displayProfile'];
?>
    <div id="palette">
        <div id="color1">#303030</div>
        <div id="color2">#FAFAFA</div>
        <div id="color3">#F94339</div>
        <div id="color4">#36B136</div>
        <div id="color5">#287DFF</div>
    </div>
    <h3>Accès rapide vers les maquettes :</h3>
    <div id="maquettes">
        <?php
        foreach($maquettes as $maquette) {
            echo '<li><a href="'.getlink($maquette).'">'.$maquette.'</a></li>';
        }
        ?>
    </div>
</div>
<?php
}

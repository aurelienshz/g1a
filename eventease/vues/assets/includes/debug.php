<?php
/* BARRE DE DEBUG : */

function displayDebug() {
    echo '<div id="debug">';
    echo 'user connecté : ';
    echo $_SESSION['connected'] ? "Oui <br />" : "Non <br />";
?>
<div id="palette">
<div id="color1">#303030</div>
<div id="color2">#FAFAFA</div>
<div id="color3">#F94339</div>
<div id="color4">#68FF68</div>
<div id="color5">#287DFF</div>
</div>
</div>
<?php
}

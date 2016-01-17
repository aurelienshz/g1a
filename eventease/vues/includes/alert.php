<div id="alerts">
<?php
foreach($_SESSION['alerts'] as $alerte) {
    echo "<div class=\"alert ".$alerte[0]."\">\n   ".$alerte[1]."\n</div>";
}
$_SESSION['alerts'] = [];
?>
</div>

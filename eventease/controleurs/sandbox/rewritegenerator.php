<?php
/*

Options +FollowSymlinks
RewriteEngine On

RewriteRule ^([a-z]+)(/([-_a-z]+))?$ index.php?module=$1&action=$3 [L]

*/

// require CONTROLEURS.'shared/routes.php';

echo "# NE PAS MODIFIER MANUELLEMENT !<br />
# CE FICHIER EST GENERE DYNAMIQUEMENT A L'ADRESSE : sandbox/rewritegenerator
<br /><br /><br />
Options +FollowSymlinks<br />
RewriteEngine On";
echo "<br /><br />RewriteRule ^([a-z]+)(/([-_a-zA-Z0-9]+))?$ index.php?module=$1&action=$3 [L]";

foreach($modules as $module) {
    if(file_exists(CONTROLEURS.$module.'/actions.php')) {
        require CONTROLEURS.$module.'/actions.php';
        foreach($actions as $action) {
            if($params = fetchParams([$module,$action])) {
                echo "<br /><strong>#Action : $module -> $action</strong>";

                $url = "$module/$action";
                $rewrite = "module=$module&action=$action";
                $n = 2;

                foreach($params as $param) {
                    $url .= "(/([-_a-zA-Z0-9]+))?";
                    $rewrite .= '&'.$param.'=$'.$n;
                    $n+=2;
                }
                echo "<br />RewriteRule ^$url$ index.php?$rewrite [L]";
            }
        }
    }
}

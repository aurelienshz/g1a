<div class="wrapper" id="listeMessages">
    <table>
        <?php
        if(!$contents['messages']) {
            echo "<h1> Boîte de messagerie vide</h1>";
        }
        else {
            echo '
        <h2>Mes messages privés</h2>
        <tr>
            <th class="from">Emetteur</th>
            <th class="subject">Message</th>
            <th class="date">Envoyé le</th>
        </tr>';
        foreach($contents['messages'] as $i => $message) {
            echo '<tr'.($i%2==0?' class="bg"':'').'>'."\n";
            echo '    <td><a href="'.getLink(["membres","profil",''.$message['id_auteur'].'']).'">'.getUserName($message['id_auteur'])[0]["pseudo"].'</a></td>'."\n";
            echo '    <td>'.$message['contenu'].'</td>'."\n";
            echo '    <td>'.$message['date_publication'].'</td>'."\n";
            echo '</tr>'."\n";
        }
        }
        ?>
    </table>
</div>
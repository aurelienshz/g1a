<div class="wrapper" id="listeMessages">
    <h2>Mes messages privés</h2>
    <table>
        <tr>
            <th class="from">Emetteur</th>
            <th class="subject">Message</th>
            <th class="date">Envoyé le</th>
        </tr>
        <?php
        foreach($contents['messages'] as $i => $message) {
            echo '<tr'.($i%2==0?' class="bg"':'').'>'."\n";
            echo '    <td><a href="#">'.getUserName($message['id_auteur'])[0]["pseudo"].'</a></td>'."\n";
            echo '    <td><a href="#">'.$message['contenu'].'</a></td>'."\n";
            echo '    <td>'.$message['date_publication'].'</td>'."\n";
            echo '</tr>'."\n";
        }
        ?>
    </table>
</div>
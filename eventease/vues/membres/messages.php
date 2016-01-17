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
            <th class="from">Émetteur</th>
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
    <h2>Envoyer un message privé</h2>
    <div id='zone-envoi'>
        <form method="post" action="<?php echo getLink(['membres','messages']).'#zone-envoi'; ?>">
            <div id='zone-texte'>
                <div id='champ1'>
                    <div id='prenom'><b>Destinataire : </b><input type='text' id='pseudo_destinataire' placeholder='Pseudo' name="destinataire" value='<?php if(isset($contents['pseudo_destinataire'])){echo $contents['pseudo_destinataire'];}?>'></div>
                </div>
                <div id='champ2'>
                    <textarea id='text-area' placeholder='Votre message privé' name="message_prive"></textarea>
                </div>
            </div>
            <div id="submit-row">
                    <input type="submit" value="Envoyer" class='button' >
            </div>
        </form>
    </div>
</div>
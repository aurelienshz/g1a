<div class="wrapper" id="listeMessages">
    <h2>Mes messages privés</h2>
    <table>
        <tr>
            <th class="from">Emetteur</th>
            <th class="subject">Sujet</th>
            <th class="date">Date</th>
        </tr>
        <?php
        foreach($contents['messages'] as $i => $message) {
            echo '<tr'.($i%2==0?' class="bg"':'').'>'."\n";
            echo '    <td><a href="#">'.$message['expediteur'].'</a></td>'."\n";
            echo '    <td><a href="#">'.$message['sujet'].'</a></td>'."\n";
            echo '    <td>'.$message['date'].'</td>'."\n";
            echo '</tr>'."\n";
        }
        ?>
    </table>
</div>

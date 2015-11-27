<div class="wrapper">
<h4>Évènements à venir</h4>
    <section class="row">
        <div id="calendar">
            <table>
                <caption>
                    <span id="previous-month">&lt;</span>
                    Novembre 2015
                    <span id="next-month">&gt;</span>
                </caption>
                <tr>
                    <th>L</th>
                    <th>M</th>
                    <th>M</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>
                </tr>
                <tr class="days">
                    <td><a href="#">1</a></td>
                    <td><a href="#">2</a></td>
                    <td><a href="#" class="filled-day">2</a></td>
                    <td><a href="#">4</a></td>
                    <td><a href="#">5</a></td>
                    <td><a href="#">6</a></td>
                    <td><a href="#">7</a></td>
                </tr>
                <tr class="days">
                    <td><a href="#">8</a></td>
                    <td><a href="#" class="filled-day">9</a></td>
                    <td><a href="#">10</a></td>
                    <td><a href="#">11</a></td>
                    <td><a href="#">12</a></td>
                    <td><a href="#">13</a></td>
                    <td><a href="#">14</a></td>
                </tr>
                <tr class="days">
                    <td><a href="#">15</a></td>
                    <td><a href="#" class="filled-day">16</a></td>
                    <td><a href="#">17</a></td>
                    <td><a href="#">18</a></td>
                    <td><a href="#">19</a></td>
                    <td><a href="#" class="filled-day">20</a></td>
                    <td><a href="#">21</a></td>
                </tr>
                <tr class="days">
                    <td><a href="#">22</a></td>
                    <td><a href="#">23</a></td>
                    <td><a href="#" class="filled-day">24</a></td>
                    <td><a href="#">25</a></td>
                    <td><a href="#">26</a></td>
                    <td><a href="#">27</a></td>
                    <td><a href="#">28</a></td>
                </tr>
                <tr class="days">
                    <td><a href="#">29</a></td>
                    <td><a href="#">30</a></td>
                    <td><a href="#" class="filled-day">31</a></td>
                    <td><a href="#"></a></td>
                    <td><a href="#"></a></td>
                    <td><a href="#"></a></td>
                    <td><a href="#"></a></td>
                </tr>
            </table>
        </div>
        <div class="dayDetails">
            <div class="eventSelect">
                <a href="#"><span class="eventSelector">1</span></a>
                <a href="#"><span class="eventSelector active">2</span></a>
                <a href="#"><span class="eventSelector">3</span></a>
            </div>
            <div class="eventDetails">
                <h5>Pique-nique dans ton cul <span class="participation">Vous participez peut-être</span></h5>
                <div id="infosPratiques">
                    <p></p>
                    <span class="fa fa-calendar"></span><p><?php echo $contents['dateSuggestion']; ?></p>
                    <span class="fa fa-tag"></span><p><?php echo $contents['typeSuggestion']; ?></p>
                    <span class="fa fa-map-marker"></span><p><?php echo $contents['lieuSuggestion']; ?></p>
                </div>
                <p id="eventDescription">
                    <?php echo $contents['descriptionSuggestion']; ?>
                </p>
            </div>
        </div>
    </section>
</div>

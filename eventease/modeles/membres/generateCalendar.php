<?php
function generateCalendar() {
    require MODELES.'membres/buildCalendar.php';
    require MODELES.'events/getMemberEvents.php';

    $calendars = [];
    $events = getMemberEvents($_SESSION['id']);
    $yearsToBuild = [];
    $yearStart = $events[0]['year'];
    // echo $yearStart;
    $yearEnd = end($events)['year'];
    // echo $yearEnd;
    $y = $yearStart;
    do {
        for($m=1; $m<=12;$m++) {
            // construction de la liste des events dans le mois qui va être généré :
            $eventsThisMonth = [];
            foreach($events as $event) {
                if($event['month']==$m && $event['year']==$y) {
                    $eventsThisMonth[] = $event;
                }
            }
            // echo '<pre>';
            // echo '<h3>'.$m.'/'.$y.'</h3>';
            // var_dump($eventsThisMonth);
            // echo '</pre>';
            $calendars[] = buildCalendar($m,$y,$eventsThisMonth);
        }
        $y++;
    } while($y<=$yearEnd);
    return $calendars;
}

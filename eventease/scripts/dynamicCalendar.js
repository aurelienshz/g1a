(function() {
    var dayEvents = document.getElementsByClassName('dayEvents'),
        eventSelect = document.getElementsByClassName('eventSelect');

    for(i=0, c=dayEvents.length; i<c; i++) {
        dayEvents[i].style.display = 'none';
    }
}
)();

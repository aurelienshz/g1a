function participate(id_event) {
    var etat;
    var participe=document.getElementById("participe");
    // console.log(participe.innerHTML);
    if (participe.innerHTML =="Participer") {
        var xmlhttp = new XMLHttpRequest();
        etat = 1;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                participe.innerHTML = "Ne plus participer";
            }
          }
    }
    else if (participe.innerHTML =="Ne plus participer") {
      etat = 0;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              participe.innerHTML = "Participer";
          }
        }

    };

    xmlhttp.open("GET", "events/setParticipe/" + etat + "/" + id_event, true);
    xmlhttp.send();
}

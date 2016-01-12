function participate(id_event, id_member) {
    var etat;
    var participe=document.getElementById("participe");
    if (participe.innerHTML =="Participe"){
        var xmlhttp = new XMLHttpRequest();
        etat = 1;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                participe.innerHTML = "Ne participe plus";
            }
          }
    } else if (participe.innerHTML =="Ne participe plus"){
      etat =0;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              participe.innerHTML = "Participe";
          }
        }

    };
    xmlhttp.open("GET", "modeles/events/setParticipe.php?p=" + etat + "&q=" + id_event + "&r=" + id_member, true);
    xmlhttp.send();
}

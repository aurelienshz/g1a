(function(){
    var checkboxes = document.querySelectorAll('.prettyform form input[type="checkbox"]');

    // on ajoute les event listeners qui vont gérer le décochement des bonnes boîtes :
    // - si on coche "all" on décoche tout le reste
    // - si on coche autre chose, on décoche all
    for(var i = 0, c = checkboxes.length; i<c; i++) {
        checkboxes[i].addEventListener('change',function(e) {
            if(e.target.name == "criteres_all") {
                if(e.target.checked) {
                    // Ces instructions seront éxecutées quand on coche la case "tous" :
                    for(var i = 0, c = checkboxes.length; i<c; i++) {
                        if(checkboxes[i].name != "criteres_all") {
                            checkboxes[i].checked = "";
                        }
                    }
                }
                else {
                    // exécuté quand on décoche la case "tous"
                    for(var i = 0, c = checkboxes.length; i<c; i++) {
                        if(checkboxes[i].name != "criteres_all") {
                            checkboxes[i].checked = "checked";
                        }
                    }
                }
            }
            else {
                if(e.target.checked) {
                    // quand on coche la case d'un critère spécifique :
                    for(var i = 0, c = checkboxes.length; i<c; i++) {
                        if(checkboxes[i].name == "criteres_all") {
                            checkboxes[i].checked = "";
                        }
                    }
                }
            }
        },false)
    }

})();

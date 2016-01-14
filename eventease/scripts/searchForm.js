(function(){
    var checkboxes = document.querySelectorAll('.prettyform form input[type="checkbox"]');

    // on ajoute les event listeners qui vont gérer le décochement des bonnes boîtes :
    // - si on coche "all" on décoche tout le reste
    // - si on coche autre chose, on décoche all
    for(var i = 0, c = checkboxes.length; i<c; i++) {
        checkboxes[i].addEventListener('change',function(e) {
            // si on a touché à la case "tous" :
            if(e.target.name == "criteres_all") {
                // quand on coche la case "tous" :
                if(e.target.checked) {
                    for(var i = 0, c = checkboxes.length; i<c; i++) {
                        if(checkboxes[i].name != "criteres_all") {
                            checkboxes[i].checked = "";
                        }
                    }
                }
                // exécuté quand on décoche la case "tous"
                else {
                    for(var i = 0, c = checkboxes.length; i<c; i++) {
                        if(checkboxes[i].name != "criteres_all") {
                            checkboxes[i].checked = "checked";
                        }
                    }
                }
            }
            else {
                // quand on coche la case d'un critère spécifique :
                if(e.target.checked) {
                    for(var i = 0, c = checkboxes.length; i<c; i++) {
                        if(checkboxes[i].name == "criteres_all") {
                            checkboxes[i].checked = "";
                        }
                    }
                }
                // quand on décoche un critère spécifique :
                else {
                    var kek = true;
                    for(var i = 0, c = checkboxes.length; i<c;i++) {
                        if(checkboxes[i].name != "criteres_all" && checkboxes[i].checked) {
                            kek = false;
                        }
                    }
                    if(kek) {
                        for(var i = 0, c = checkboxes.length; i<c;i++) {
                            if(checkboxes[i].name == 'criteres_all') {
                                checkboxes[i].checked = "checked";
                            }
                        }
                    }
                }
            }
        },false)
    }

})();

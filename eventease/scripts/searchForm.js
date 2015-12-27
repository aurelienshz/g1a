(function(){
    var checkboxes = document.querySelectorAll('.prettyform form input[type="checkbox"]');

    for(var i in checkboxes) {
        checkboxes[i].checked = "";
    }


    for(var i = 0, c = checkboxes.length; i<c; i++) {
        console.log(i, checkboxes[i]);
        checkboxes[i].addEventListener('change',function(e){
            // alert('oui');
            if(e.target.checked) {
                alert("oui");
            }
        },false)
    }

    var checkBoxAll = function() {
        for(var i = 0, c = checkboxes.length; i<c; i++) {
            if(checkboxes[i].name == "criteres_all") {
                checkboxes[i].checked = "checked";
            }
            else {
                checkboxes[i].checked = "";
            }
        }
    }

    checkBoxAll();

})();

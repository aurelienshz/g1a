var inputs = document.getElementsByClassName('champCentral'),
    select = document.querySelector('#bigform select');

var displayField = function(field) {
    for (var i = 0; i < inputs.length; i++) {
        if(i==field) {
            inputs[i].style.display='initial';
        }
        else {
            inputs[i].style.display='none';
        }
    }
}

select.addEventListener(
    'change',
    function() {
        displayField(select.selectedIndex);
    },
    false
);

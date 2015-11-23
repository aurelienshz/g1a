var textInput = document.querySelector('#bigform input[type="text"]'),
    select = document.querySelector('#bigform select'),
    placeholder = 'Mots-clés';

select.addEventListener(
    'change',
    function() {
        switch (select.selectedIndex) {
            case 0:
                placeholder = 'Mots-clés'
                break;
            case 1:
                placeholder = 'Adresse'
                break;
            case 2:
                placeholder = 'Date'
                break;
            default:
                placeholder = 'Mots-clés'
        }
        textInput.placeholder = placeholder;
    },
    false
);

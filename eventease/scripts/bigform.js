var textInput = document.querySelector('#bigform input[type="text"]'),
    select = document.querySelector('#bigform select'),
    defaultplaceholder = 'Mots-clés';

select.addEventListener(
    'change',
    function() {
        switch (select.selectedIndex) {
            case 0:
                placeholder = defaultplaceholder;
                break;
            case 1:
                placeholder = 'Adresse';
                break;
            case 2:
                placeholder = 'Date';
                break;
            default:
                placeholder = placeholder;
        }
        textInput.placeholder = placeholder;
    },
    false
);

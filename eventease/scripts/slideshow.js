/*******************************/
/***        SLIDESHOW        ***/
/*******************************/
/*
ToDo :
- Animation plus élégante (fondu enchaîné ou défilement latéral)
- Ajout des accès directs

Pour fabriquer un slideshow, instancier Slideshow en lui passant en paramètres :
- l'élement qui doit être un slideshow ;
- les éléments qui contrôlent le défilement du slideshow, possédant les classes previous et next.
- gérer le problème de .row

*/

function Slideshow(container, defilements) {
    this.container = container;
    this.defilements = defilements;
    this.currentSlide = 0;
    this.slides = [];
    this.playing = true;
    this.nav = '';


    /**********************************************/
    /*** Méthodes d'initialisation du slideshow ***/
    /**********************************************/
    // Récupérer les slides :
    this.getSlides = function() {
        for(var i in this.container.childNodes) {
            if(this.container.childNodes[i].tagName == 'DIV') {
                this.slides.push(this.container.childNodes[i]);
            }
        }
    }
    // Initialiser le slideshow :
    this.init = function() {
        // on cache tout le monde
        for(var i in this.slides) {
            this.slides[i].style.display = 'none';
        }
        // on réaffiche le premier slide
        this.slides[this.currentSlide].style.display = 'block';
        this.activeNav(this.currentSlide);
    }
    // Ajouter les interactions (boutons [et accès direct])
    this.addInteractions = function() {
        var currentSlideshow = this;
        for(var i=0, c=this.defilements.length; i<c; i++) {
            this.defilements[i].addEventListener('click', function(e) {
                currentSlideshow.pause();
                if(e.target.className=='next') {
                    currentSlideshow.next();
                }
                else {
                    currentSlideshow.previous();
                }
                e.preventDefault;
            }, false);
        }
    }
    // Ajouter les "nav" --> accès directs aux suggestions (points cliquables)
    // Wanted : un meilleur nom pour cette fonctionnalité (autre que "nav").
    this.addNav = function() {
        var div = document.createElement('DIV');
        div.className = 'slideshow-nav';
        for(var i in this.slides) {
            icon = document.createElement('SPAN');
            icon.className = 'fa fa-circle-o';
            div.appendChild(icon);
        }
        container.appendChild(div, container.childNodes[0]);
    }

    /*****************************************/
    /*** MÉTHODES DE CONTROLE DU SLIDESHOW ***/
    /*****************************************/
    // Slide précédent :
    this.previous = function() {
        this.showSlide(this.currentSlide-1);
    }
    //Slide suivant :
    this.next = function(slideshow) {
        this.showSlide(this.currentSlide+1);
    }
    //Mettre en pause :
    this.pause = function() {
        this.playing = false;
    }
    //Lire le slideshow :
    this.play = function() {
        _this = this;
        setTimeout(function() {
            if(_this.playing) {
                _this.next()
                _this.play();
            }
        }, 3000);
    }
    // Afficher un slide particulier :
    this.showSlide = function(slide) {
        // Si on sort des limites, on réassigne le numéro de slide correctement :
        if(slide < 0 || slide >= this.slides.length) {
            while(slide < 0) {
                slide = this.slides.length + slide;
            }
            while(slide >= this.slides.length) {
                slide = slide % this.slides.length;
            }
        }


        // On *essaye* (avec douleur) d'animer la disparition du slide en cours :
        var slideFadingOut = this.slides[this.currentSlide];
        slideFadingOut.style.opacity = 1;
        // Durée de l'animation : 300ms
        // Temps d'une frame : 15ms
        // Pas d'opacité : 0.05
        _this = this

        function fadeOut(){
            setTimeout(function(){
                var opa = slideFadingOut.style.opacity;
                if(opa > 0) {
                    slideFadingOut.style.opacity -= 0.05;
                    fadeOut();
                }
            },15);
        }
        fadeOut();
        var slideFadingIn = this.slides[slide];
        slideFadingIn.style.opacity = 0;

        setTimeout(function(){
            _this.slides[_this.currentSlide].style.display = 'none';
            _this.slides[slide].style.display = 'block';
            // On met à jour la valeur de currentSlide
            _this.currentSlide = slide;
            // On met à jour les points de positionnement
            _this.activeNav(slide);

            function fadeIn(){
                setTimeout(function(){
                    var opa = parseFloat(slideFadingIn.style.opacity);
                    if(opa < 1) {
                        slideFadingIn.style.opacity = opa + 0.05;   // J'ignore pourquoi on ne peut pas incrémenter directement style.opacity, mais ça ne fonctionne pas.
                        fadeIn();
                    }
                },15);
            }
            fadeIn();
        },300);     // Temps d'attente pour l'animation de fade out

    }
    this.activeNav = function(nav) {
        for(var i in this.container.childNodes) {
            if(this.container.childNodes[i].className == 'slideshow-nav') {
                for(var j in this.container.childNodes[i].childNodes) {
                    if(j==nav) {this.container.childNodes[i].childNodes[j].className = 'fa fa-circle'; }
                    else {this.container.childNodes[i].childNodes[j].className = 'fa fa-circle-o'; }
                }
            }
        }
    }

    // Et c'est parti pour créer le slideshow tout bien comme il faut :
    this.getSlides();
    this.addNav();
    this.init();
    this.addInteractions();
    this.play();
}

// Ce code est spécifique à l'accueil. Il n'a pas lieu d'être dans le même fichier que le constructeur de l'objet...
(function() {
var slideshowSuggestions = document.getElementById('suggestions'),
    slideshowSuggestionsDefilement =  document.querySelectorAll('.previous, .next'),
    slideshow = new Slideshow(slideshowSuggestions, slideshowSuggestionsDefilement);
})();

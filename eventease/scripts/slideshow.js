// Constructeur de l'objet slideshow
// Pour initialiser on aura juste à l'instancier en lui passant en paramètre l'élement qui doit être un slideshow.
function Slideshow(element, defilements) {
    this.container = element;
    this.defilements = defilements;
    this.currentSlide = 0;
    this.slides = [];
    this.play = true;

    this.getSlides = function() {
        for(var i=0, c=this.container.childNodes.length; i<c; i++) {
            if(this.container.childNodes[i].tagName == 'DIV') {
                this.slides.push(this.container.childNodes[i]);
            }
        }
    }

    this.previous = function() {
        this.showSlide(this.currentSlide-1);
    }
    this.next = function() {
        this.showSlide(this.currentSlide+1);
    }
    this.pause = function() {
    }
    this.play = function() {
    }

    this.showSlide = function(slide) {
        if(slide < 0 || slide >= this.slides.length) {
            while(slide < 0) {
                slide = this.slides.length + slide;
            }
            while(slide >= this.slides.length) {
                slide = slide % this.slides.length;
            }
        }
        console.log(slide);
        this.slides[this.currentSlide].style.display = 'none';
        this.slides[slide].style.display = 'block';
        this.currentSlide = slide;
    }

    this.init = function() {
        // initialisation du slideshow : on cache tout le monde
        for(var i in this.slides) {
            this.slides[i].style.display = 'none';
        }
        // on réaffiche le premier slide :
        this.slides[this.currentSlide].style.display = 'block';
    }

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

    this.getSlides();
    this.init();
    this.addInteractions();
}

(function() {
var slideshowSuggestions = document.getElementById('suggestions'),
    slideshowSuggestionsDefilement =  document.querySelectorAll('.previous, .next'),
    slideshow = new Slideshow(slideshowSuggestions, slideshowSuggestionsDefilement);
    console.log(slideshowSuggestionsDefilement);
})();

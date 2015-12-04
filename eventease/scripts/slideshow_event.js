(function() {

	
	var slideshowPhotos = document.getElementById('photos'),
		slideshowPhotosDefilement =  document.querySelectorAll('.previous, .next'),
    slideshow = new Slideshow(slideshowPhotos, slideshowPhotosDefilement);
})();
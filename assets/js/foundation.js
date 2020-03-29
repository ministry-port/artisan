/**
 * artisan functions
 *
 * Handles slider functions.
 */
( function( $ ) {
	$( document ).ready( function() {
		$( '.flexslider' ).flexslider({
			slideshow:      false,
			animation:      'fade',
			controlNav:     false,
			prevText:       '&#8249;',
			nextText:       '&#8250;',
			slideshowSpeed: '14000',
			animateHeight:  false,
			fadeFirstSlide: false,
		});

		$('#masthead').fadeIn(1000);
	} );
} )( jQuery );

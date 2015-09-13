jQuery(document).ready(function($) {

	"use strict";

	/*--------------------------------------------------------------
	Menu Icon and Overlay Nav
	--------------------------------------------------------------*/

	//open/close primary navigation
	$('.primary-nav-trigger').on('click', function(){
		$('.menu-icon').toggleClass('is-clicked'); 
		$('.main-navigation').toggleClass('toggled');
		$('body').toggleClass('overflow-hidden');
	});

	/*--------------------------------------------------------------
	Image Lightbox
	--------------------------------------------------------------*/

	$(".entry-content a").attr('data-imagelightbox', '');

	// Overlay
	var overlayOn = function() {
		$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
	},
	overlayOff = function() {
		$( '#imagelightbox-overlay' ).remove(); 
	}

	// Init with Overlay
	$( 'a[data-imagelightbox]' ).imageLightbox({
		onStart: 	 function() { overlayOn(); },
		onEnd:	 	 function() { overlayOff(); }		
	});

});
jQuery(document).ready(function($) {

	"use strict";

	/*--------------------------------------------------------------
	Skip link focus
	--------------------------------------------------------------*/

	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}

	/*--------------------------------------------------------------
	Menu Icon and Overlay Nav
	--------------------------------------------------------------*/

	//open/close primary navigation
	$('.primary-nav-trigger').on('click', function(){
		$('.menu-icon').toggleClass('is-clicked'); 
		$('.site-header').toggleClass('menu-is-open');
		
		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('.site-navigation-wrapper').hasClass('is-visible') ) {
			$('.site-navigation-wrapper').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('.site-navigation-wrapper').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').addClass('overflow-hidden');
			});	
		}
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
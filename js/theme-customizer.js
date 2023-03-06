/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Update the site title in real time...

	wp.customize( 'cristiano_header_top_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '.top-level' ).css('background-color', newval );
		} );
	} );

	wp.customize( 'cristiano_header_bot_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '.bottom-level, .primary-menu .sub-menu, #cart .widget_shopping_cart' ).css('background-color', newval );
		} );
	} );	

	wp.customize( 'cristiano_nav_active_color', function( value ) {
		value.bind( function( newval ) {
			$( '#cart .count' ).css('background-color', newval );
		} );
	} );
	
	wp.customize( 'cristiano_nav_active_color', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-menu .current-menu-ancestor > a, .primary-menu .current-menu-item > a, #cart .amount' ).css('color', newval );
		} );
	} );	
	
	wp.customize( 'cristiano_nav_active_color', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-menu .sub-menu, #cart .widget_shopping_cart' ).css('border-color', newval );
		} );
	} );	
	
	wp.customize( 'cristiano_footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '#footer' ).css('background-color', newval );
		} );
	} );		
	
	wp.customize( 'cristiano_footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '#footer h2' ).css('color', newval );
		} );
	} );	
	
	
	wp.customize( 'cristiano_primary_color', function( value ) {
		value.bind( function( newval ) {
			$( '.price, .short-info, #cart .widget_shopping_cart, .btn-form, input:submit' ).css('background-color', newval );
		} );
	} );
							
	wp.customize( 'cristiano_secondary_color', function( value ) {
		value.bind( function( newval ) {
			$( '.dm-price, .btn-plate, .btn-cart, .added_to_cart, .section-title p, .woocommerce .star-rating, p a' ).css('color', newval );
		} );
	} );	
	
	wp.customize( 'cristiano_secondary_color', function( value ) {
		value.bind( function( newval ) {
			$( '.btn-color, .dishes-menu .highlight-text, #cart .checkout, .swiper-pagination-bullet-active, .single_add_to_cart_button, #contact-details span.fa' ).css('background-color', newval );
		} );
	} );
		
} )( jQuery );
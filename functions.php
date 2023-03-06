<?php

if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}
load_theme_textdomain( 'cristiano', get_template_directory() . '/languages' );
	
/** Includes */
require_once( get_template_directory() . '/includes/class-tgm-plugin-activation.php' );			// TGM Plugin Activation
require_once( get_template_directory() . '/includes/enqueue.php' );							  	// Include Styles and Scripts
require_once( get_template_directory() . '/includes/cristiano-functions.php' );				  	// Theme Functions
require_once( get_template_directory() . '/includes/customizer.php' ); 						  	// Include Cusomizer
require_once( get_template_directory() . '/includes/widgets/contact-us.php' ); 					// Include Contact Details Widget
require_once( get_template_directory() . '/includes/widgets/social.php' ); 	   					// Include Social Links Widget

/** Actons */
add_action( 'after_switch_theme', 'cristiano_activete' );			// Cristiano Theme Activate
add_action( 'init', 'cristiano_theme_support' );					// Cristiano Theme Support
add_action( 'tgmpa_register', 'cristiano_require_plugins' );		// Cristiano Rerequire Plugins
add_action( 'wp_enqueue_scripts','cristiano_enqueue' );				// Theme Enqueue CSS/JS
add_action( 'customize_preview_init', 'cristiano_customizer_live_preview' ); // Enqueue Customizer JS
add_action( 'widgets_init', 'cristiano_widgets' );					// Theme Widgets Init
add_action( 'after_setup_theme', 'cristiano_menu' );				// Theme Menu Init

/** Filters  */
add_filter( 'wp_calculate_image_srcset', '__return_false' ); 		// Disable WordPress Img Src Calculation
add_filter( 'use_default_gallery_style', '__return_false' ); 		// Disable WordPress Gallery Styles
add_filter( 'the_content_more_link', 'cristiano_remove_more_link' );// Remove More Link From Post
add_filter( 'comment_form_default_fields', 'cristiano_comment_form_fields' ); //Unset URL Field Form Comment Form
add_filter( 'excerpt_length', 'cristiano_excerpt_length' );			// Excerpt Length for Blog Filter
add_filter( 'excerpt_more', 'cristiano_excerpt_more' );				// Excerpt More For Blog Filter
add_filter( 'wp_mail_from_name', 'cristiano_from_mail_name' );		// Mail From Name Filter

/** WooCommerce */
if( cristiano_is_wc_activated() ) { 
	require_once( 'includes/woocommerce.php' ); 
	add_action( 'woocommerce_init', 'cristiano_wc_image_dimensions' );		
	add_action( 'init', 'cristiano_placeholder' ); 										// Update Placeholder Image				
	add_filter( 'woocommerce_enqueue_styles', 'cristiano_unset_wc_styles' ); 			// Unset WooCommerce styles
	add_filter( 'woocommerce_checkout_fields' , 'cristiano_override_checkout_fields' ); // Unset Some Checout Fields
	add_filter( 'woocommerce_product_short_description_editor_settings', 'cristiano_wc_short_description_settings');		
	add_filter( 'woocommerce_add_to_cart_fragments', 'cristiano_cart_link_fragment' );	// Ajax Update Number of Items In Cart 
	add_action( 'add_meta_boxes' , 'cristiano_wc_remove_metaboxes', 40 );				// Remove product Gallery Metabox
	apply_filters( 'woocommerce_review_gravatar_size', '60' );							// Review Gravatar size	
	remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20);		// Remove BreadCrumbs			
}
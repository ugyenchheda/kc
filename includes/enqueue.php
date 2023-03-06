<?php
function cristiano_enqueue() {
    wp_enqueue_style( 'cristiano-google-fonts', 'https://fonts.googleapis.com/css?family=Cinzel|Lora:400,400i,700');	
    wp_enqueue_style( 'cristiano-fontawesome',  get_template_directory_uri() . '/css/font-awesome.css' );	    
	wp_enqueue_style( 'magnific-popup', 		get_template_directory_uri() . '/css/magnific-popup.css' );  
	wp_enqueue_style( 'swiper',					get_template_directory_uri() . '/css/swiper.min.css' );
	wp_enqueue_style( 'cristiano-grid',   		get_template_directory_uri() . '/css/grid.css' );			  
	wp_enqueue_style( 'cristiano-style', 		get_stylesheet_uri() );
	wp_enqueue_style( 'cristiano_wc_style', 	get_template_directory_uri() . '/css/woocommerce.css' );	
	wp_enqueue_style( 'cristiano-rwd',   		get_template_directory_uri() . '/css/rwd.css' );

    wp_enqueue_script( 'jquery-ui-datepicker' );	
    wp_enqueue_script( 'magnific-popup',		get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery') );
	wp_enqueue_script( 'swiper',				get_template_directory_uri() . '/js/swiper.min.js' );
    wp_enqueue_script( 'cristiano-google-map',	get_template_directory_uri() . '/js/google-map.js' );        		
    wp_enqueue_script( 'cristiano-script',		get_template_directory_uri() . '/js/script.js', array('jquery') );
    
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function cristiano_customizer_live_preview() {
	wp_enqueue_script( 'cristiano-themecustomizer', get_template_directory_uri().'/js/theme-customizer.js','','', true );
}
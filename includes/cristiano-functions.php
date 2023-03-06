<?php
	
/* THEME ACTIVATION
---------------------------------------------------------------- */	
function cristiano_activete() {
	if (version_compare( get_bloginfo('version'), '4.2', '<') ) {
		wp_die( esc_html__('You must have a minimum version of 4.2 to use this theme', 'cristiano') );
	}
	
	update_option( 'thumbnail_size_w', 370 );
	update_option( 'thumbnail_size_h',  247 );
	
	update_option( 'medium_size_w', 585 );
	update_option( 'medium_size_h', 7777 );
	
	update_option( 'large_size_w', 830 );
	update_option( 'large_size_h', 7777 );
	
}
/* TGM PLUGIN
---------------------------------------------------------------- */
function cristiano_require_plugins() {
	$plugins = array(	
		array(
			'name' 			=> esc_html__('Restaurant Core', 'cristiano'),
			'slug' 			=> 'ukrdevs-restaurant-core',
			'source' 		=> get_template_directory() . '/lib/plugins/ukrdevs-restaurant-core.zip',
			'version'		=> '1.5',			
			'required' 		=> true,
		),			
		array(
			'name' 			=> 'WooCommerce',
			'slug' 			=> 'woocommerce',
			'required' 		=> true,
		),		
	);
	$config = array(
	    'id'           => 'cristiano-tgmpa',
	    'default_path' => '',
	    'menu'         => 'tgmpa-install-plugins',
	    'has_notices'  => true,
	    'dismissable'  => true,
	    'dismiss_msg'  => '',
	    'is_automatic' => true,	    
	    'message'      => '',
	);
	tgmpa( $plugins, $config );
}

/* CRISTIANO THEME SUPPORT
---------------------------------------------------------------- */
function cristiano_theme_support() {	
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'		  => 200,
		'flex-height' => true,
		'flex-width'  => true,	
	));
	add_theme_support( 'custom-header', array(
		'width'		  => 1920,
		'height'      => 1080,
	));
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'menus' );			//Navigation
	add_theme_support( 'post-thumbnails' );	//Post Thumbnails
	add_theme_support( 'woocommerce' );		//WooCommerce	
	add_theme_support( 'html5', array( 'gallery', 'caption' ) );	
	add_image_size( 'cristiano_small_image', 110, 110, true );		
}

/* DETECT IF WOOCOMMERCE ACTIVATED
---------------------------------------------------------------- */
function cristiano_is_wc_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}
/* REGISTER NAV MENU
---------------------------------------------------------------- */
function cristiano_menu() {	
	register_nav_menus(array(
		'primary' => esc_html__( 'Primary Menu', 'cristiano' ),
		'top_menu' =>  esc_html__( 'Top Bar Menu', 'cristiano' ),
	));
}

/* REGISTER RIGHT SIDEBAR
---------------------------------------------------------------- */
function cristiano_widgets() {	
	register_sidebar( array(
			'name'          => esc_html__('Right Sidebar', 'cristiano'),
			'description'	=> esc_html__('Appears on the right on blog post page.', 'cristiano'),
			'id'            => 'right_sidebar',
			'class'			=> '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title">',
			'after_title'   => '</h3>',
	) );
	register_sidebar( array(
			'name'          => esc_html__('Footer Widget Area', 'cristiano'),
			'description'	=> esc_html__('Appears in the footer section of the site.', 'cristiano'),
			'id'            => 'footer_region',
			'class'			=> '',
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
	) );	
	register_widget( 'Cristiano_Contact_Widget' );
    register_widget( 'Cristiano_Social_Widget' );	
}

/* HEADER
---------------------------------------------------------------- */
function cristiano_header(){
	if ( function_exists('restocore') ) {
		$header = cs_get_option( 'ukrdevs_header' );
		if( $header ) {
			return esc_attr( $header );
		}
	}
}

/* WOOCOMMERCE PAGE HEADER
---------------------------------------------------------------- */
function cristiano_header_image_wc() {
	if( function_exists('restocore' ) && restocore_get_wc_product_header_img()) {
		echo restocore_get_wc_product_header_img();
	}
	elseif( has_post_thumbnail(get_option( 'woocommerce_shop_page_id' )) ){
		echo get_the_post_thumbnail_url( get_option( 'woocommerce_shop_page_id' ) );		
	} else {
		header_image();
	}
}
/* LAYOUT WIDE / BOXED
---------------------------------------------------------------- */
function cristiano_site_layout(){
	if ( function_exists('restocore') ) {
		$site_layout = cs_get_option( 'ukrdevs_site_layout' );
		$page_layout = restocore_get_meta_data('ukrdevs_page_layout');
		if( !$page_layout || $page_layout == 'default' ) {
			echo esc_attr( $site_layout );
		} else {
			echo esc_attr( $page_layout );
		}
	}
}

/* PAGE HEADER IMAGE
---------------------------------------------------------------- */
function cristiano_header_image() {
	if(has_post_thumbnail( get_queried_object_id() )) {
		echo get_the_post_thumbnail_url( get_queried_object_id() );
	} else {
		header_image();
	}
}

/* PAGE TITLE
---------------------------------------------------------------- */
function cristiano_page_title(){
	if( is_page() || is_home() ) {
		single_post_title();
	}
	elseif( cristiano_is_wc_activated() && (is_shop() || is_product_category()) ) {
		woocommerce_page_title();
	}
}

/* MAIL FORM: FROM NAME
---------------------------------------------------------------- */
function cristiano_from_mail_name() {
	return get_bloginfo( 'name' );
}

/* SIDEBAR DETECTION
---------------------------------------------------------------- */
function caristiano_has_sidebar() {
	if( is_dynamic_sidebar() ) {
		echo 'has-sidebar';
	}
	else {
		echo 'no-sidebar';
	}
}

/* UNSET URL FROM COMMENT FORM
---------------------------------------------------------------- */
function cristiano_comment_form_fields( $fields ) {
    unset($fields['url']);
	return $fields;
}

/* EXCERPT/CONTENT AUTO DETECT
---------------------------------------------------------------- */
function cristiano_excerpt_content(){
	global $post;
	if (strpos($post->post_content, '<!--more-->')) {
		the_content();
	}
	else {
		the_excerpt();
	}
}

/* REMOVE MORE LINK
---------------------------------------------------------------- */
function cristiano_remove_more_link() {
	return;
}

/* EXCERPT LENGTH
---------------------------------------------------------------- */
function cristiano_excerpt_length( $length ) {
	return 30;
}

/* EXCERPT
---------------------------------------------------------------- */

function cristiano_excerpt_more(){
	return '...';
}
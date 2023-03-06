<?php

/* ADMIN/FRONT - Image size update on theme activation --- FILTER
---------------------------------------------------------------- */	
function cristiano_wc_image_dimensions() { 
  	$catalog = array(
		'width' 	=> '370',	// px
		'height'	=> '247',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '585',	// px
		'height'	=> '390',	// px
		'crop'		=> 1 		// true
	);
	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '80',	// px
		'crop'		=> 1 		// true
	);
	// Image sizes
	update_option( 'shop_catalog_image_size',	$catalog ); 	// Product Catalog thumbs
	update_option( 'shop_single_image_size',  	$single ); 		// Single Product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image Gallery thumbs
}

/* ADMIN - PRODUCT PAGE ---  Product Short Description --- FILTER
---------------------------------------------------------------- */
function cristiano_wc_short_description_settings( $settings ) {
    $settings = array(
		'media_buttons' => false,
		'tinymce' => false,
		'quicktags' => false,
		'teeny' => false,
	);
    return $settings;
}

/* FRONT - PRODUCT ARCHIVE --- Product Categories Image  --- FUNCTION
---------------------------------------------------------------- */	
function cristiano_woocommerce_subcategory_thumbnail( $category ) {
	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
	$image_attributes = wp_get_attachment_image_src( $thumbnail_id, $size = '', $icon = false );
	echo "<img alt='' src='$image_attributes[0]' width='$image_attributes[1]' height='$image_attributes[2]'> ";
}

/* FRONT - STYLES --- WooCommerce CSS --- Filter
---------------------------------------------------------------- */
function cristiano_unset_wc_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );		// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );			// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

/* FRONT - PRODUCT ARCHIVE --- Product Short Description  --- FILTER
---------------------------------------------------------------- */	
function cristiano_ing_in_product_archives() {
    the_excerpt();
}
 
/* FRONT - CHECKOUT PAGE --- Billing & Shipping Fields --- FILTER
---------------------------------------------------------------- */
function cristiano_override_checkout_fields( $fields ) {
    unset( $fields['billing']['billing_last_name'] );
    unset( $fields['billing']['billing_company'] );
    unset( $fields['billing']['billing_country'] );
    unset( $fields['billing']['billing_state'] );
    unset( $fields['billing']['billing_postcode'] );
    unset( $fields['billing']['billing_city'] );
    unset( $fields['shipping']['billing_last_name'] );    
    return $fields;
}

/* FRONT - HEADER ---  Ajax Cart Update --- FILTER
---------------------------------------------------------------- */
function cristiano_cart_link_fragment( $fragments ) {
	ob_start();
	cristiano_cart_link();
	$fragments['a.cart-contents'] = ob_get_clean();
	return $fragments;
}

/* FRONT - HEADER ---  Cart --- FUNCTION
---------------------------------------------------------------- */
function cristiano_cart_link() {
	get_template_part( 'template-parts/woocommerce', 'header_cart' );
}

/* FRONT -> CATALOG/PRODUCT ---  IMAGE PLACEHOLDER --- FILTER
---------------------------------------------------------------- */
function cristiano_placeholder() {
  	add_filter('woocommerce_placeholder_img_src', 'cristiano_wc_placeholder_img_src');
	function cristiano_wc_placeholder_img_src( $src ) {
		return get_template_directory_uri() . '/images/placeholder.jpg';
	}
}

/* ADMIN -> PRODUCT ---  Remove Gallery Metabox --- FUNCTION
---------------------------------------------------------------- */
function cristiano_wc_remove_metaboxes() {
	remove_meta_box( 'woocommerce-product-images', 'product' ,'side' ); // Remove Product Gallery Metabox
}
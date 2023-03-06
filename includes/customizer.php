<?php

function cristiano_customize_register( $wp_customize ) {

	// Remove the core header textcolor control, as it shares the main text color.	
	$wp_customize->remove_control( 'header_textcolor' );

	
	$wp_customize->add_setting( 'cristiano_header_top_bg_color' , array(
	    'default'     => '#23282d',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_setting( 'cristiano_header_bot_bg_color' , array(
	    'default'     => '#1b2024',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_setting( 'cristiano_nav_active_color' , array(
	    'default'     => '#d1a054',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );				
	$wp_customize->add_setting( 'cristiano_primary_color' , array(
	    'default'     => '#1b2024',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_setting( 'cristiano_secondary_color' , array(
	    'default'     => '#d1a054',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_setting( 'cristiano_footer_bg_color' , array(
	    'default'     => '#1b2024',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_setting( 'cristiano_footer_text_color' , array(
	    'default'     => '#d1a054',
	    'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );		

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cristiano_header_top_bg_color', array(
		'label'      => esc_html__( 'Header - Top Level [Background Color]', 'cristiano' ),
		'section'    => 'colors',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cristiano_header_bot_bg_color', array(
		'label'      => esc_html__( 'Header [Background Color]', 'cristiano' ),
		'section'    => 'colors',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cristiano_nav_active_color', array(
		'label'      => esc_html__( 'Header [Primary Text Color]', 'cristiano' ),
		'section'    => 'colors',
	) ) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cristiano_primary_color', array(
		'label'      => esc_html__( 'Primary Color [Global]', 'cristiano' ),
		'section'    => 'colors', 
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cristiano_secondary_color', array(
		'label'      => esc_html__( 'Secondary Color [Global]', 'cristiano' ),
		'section'    => 'colors',
	) ) );  
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cristiano_footer_bg_color', array(
		'label'      => esc_html__( 'Footer [Background Color]', 'cristiano' ),
		'section'    => 'colors',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cristiano_footer_text_color', array(
		'label'      => esc_html__( 'Footer [Primary Text Color]', 'cristiano' ),
		'section'    => 'colors',
	) ) );			
}	
add_action('customize_register','cristiano_customize_register');



function cristiano_customize_css() {
	
	$cristiano_header_top_bg_color = get_theme_mod( 'cristiano_header_top_bg_color');
	if($cristiano_header_top_bg_color == true && $cristiano_header_top_bg_color != '#23282d'): ?>
		<style>
			.top-level {
				background-color: <?php echo $cristiano_header_top_bg_color; ?>;
			}
		</style>
	<?php endif; ?>
		
	<?php 
		$cristiano_header_bot_bg_color = get_theme_mod( 'cristiano_header_bot_bg_color');
		if($cristiano_header_bot_bg_color == true && $cristiano_header_bot_bg_color != '#1b2024'): ?>
		<style>
			.bottom-level,
			.primary-menu .sub-menu,
			#cart .widget_shopping_cart,
			.bottom-level, .home .sticky .bottom-level {
				background-color: <?php echo $cristiano_header_bot_bg_color; ?>;
			}
		</style>
	<?php endif; ?>

	<?php 
		$cristiano_nav_active_color = get_theme_mod( 'cristiano_nav_active_color');
		if($cristiano_nav_active_color == true && $cristiano_nav_active_color != '#d1a054'): ?>
		<style>
			#cart .count,
			.widget_shopping_cart .checkout {
				background-color: <?php echo $cristiano_nav_active_color; ?>;
			}
			.primary-menu .current-menu-ancestor > a,
			.primary-menu .current-menu-item > a,
			.primary-menu a:hover,			
			#cart .amount,
			.widget_shopping_cart a:hover{
				color: <?php echo $cristiano_nav_active_color; ?>;
			}
			.primary-menu .sub-menu,
			#cart .widget_shopping_cart {
				border-color: <?php echo $cristiano_nav_active_color; ?>;
			}
		</style>
	<?php endif; ?>
	
	<?php 
		$cristiano_footer_bg_color = get_theme_mod( 'cristiano_footer_bg_color');
		if($cristiano_footer_bg_color == true && $cristiano_footer_bg_color != '#1b2024'): ?>
		<style>
			#footer {
				background-color: <?php echo $cristiano_footer_bg_color; ?>;
			}
		</style>
	<?php endif; ?>
	
	<?php 
		$cristiano_footer_text_color = get_theme_mod( 'cristiano_footer_text_color');
		if($cristiano_footer_text_color == true && $cristiano_footer_text_color != '#1b2024'): ?>
		<style>
			#footer h2,
			#footer a:hover {
				color: <?php echo $cristiano_footer_text_color; ?>;
			}
		</style>
	<?php endif; ?>	
	
	<?php
	$cristiano_primary_color = get_theme_mod( 'cristiano_primary_color' );
   	if( $cristiano_primary_color == true && $cristiano_primary_color != '#1b2024'): ?>
     <style type="text/css">
         
	    /* Primary Background Color */
		.price,
		.btn-form,
		.short-info,
		button, input[type="submit"],
		.tagcloud a,
		.btn-color:hover,
		.woocommerce-message a,
		input[type="submit"]:hover,
		#single-post .tags a {
			background-color: <?php echo $cristiano_primary_color; ?>;
		}
		
		.dm-price:hover,
		.btn-plate:hover,
		.comment-body .reply {
			color: <?php echo $cristiano_primary_color; ?>;
		} 

	</style>
	<?php endif; ?>	
			
	<?php 
		$cristiano_secondary_color = get_theme_mod( 'cristiano_secondary_color' );
		if( $cristiano_secondary_color == true && $cristiano_secondary_color != '#d1a054'): ?>
   	<style>
		/* Secondary Color for Text */  
		a:hover, .content a,
		.dm-price,
		.btn-plate, 
		.btn-cart, 
		.added_to_cart,
		.section-title p,
		.woocommerce .star-rating,
		h2 a:hover,
		p a,
		.cart td.product-subtotal,
		.product_list_widget .amount,
		.widget_shopping_cart .total .amount,
		.woocommerce p.stars a {
			color: <?php echo $cristiano_secondary_color; ?>;						
		}
		
		/* Secondary Color for Background */ 
		.dishes-menu .highlight-text,
		#cart .checkout,
		.btn-color,
		.swiper-pagination-bullet-active,
		.single_add_to_cart_button,
		#contact-details span.fa,
		button,
		input[type="submit"],
		.woocommerce-message a:hover,
		#single-post .tags a:hover,
		.nav-links .current {
			background-color: <?php echo $cristiano_secondary_color; ?>;
		}
		/* Secondary Color for Border Bottom Color */ 
		.commentlist .bypostauthor {
			border-bottom-color: <?php echo $cristiano_secondary_color; ?>;
		}
		
		/* Secondary Color for Border */    
		:focus,
		blockquote,
		.nav-links .current	{
			border-color: <?php echo $cristiano_secondary_color; ?>
		}			
    </style>
    <?php endif;
}
add_action( 'wp_head', 'cristiano_customize_css');



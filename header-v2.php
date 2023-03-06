<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header-wrap header-v1">
		<div id="top-bar" class="top-level">
			<div class="center">
				<?php get_template_part('template-parts/widget', 'social'); ?>
				<?php 
					wp_nav_menu( array(
						'theme_location'	=> 'top_menu',
						'menu_class'		=> 'additional-links',
						'container'         => 'ul',
						'fallback_cb'		=>	'__return_empty_string',			
					));	
				?>	
				<?php if(function_exists('cs_get_option')): ?>
				<ul class="header-info">
					<li><i class="fa fa-map-marker"></i><?php restocore_address(); ?></li>					
					<li><i class="fa fa-phone"></i><?php restocore_mobile_number(); ?></li>
				</ul>
				<?php endif; ?>
			</div>
		</div>
		<div class="bottom-level">
			<div class="center clearfix">
				<div class="logo">
					<?php the_custom_logo(); ?>
					<?php if( get_header_textcolor() !== 'blank'): ?>
						<div class="text-logo">
							<a href="/">
								<p><?php bloginfo( 'description', 'display' );  ?></p>					
								<h2 class="title"><?php bloginfo( 'name' ); ?></h2>
							</a>
						</div>
					<?php endif; ?>
				</div>
				
				<span class="icon-menu fa fa-bars"></span>
				<nav id="nav">
				<?php if(cristiano_is_wc_activated()): ?>
					<div id="cart">
						<?php cristiano_cart_link(); ?>
						<?php the_widget( 'WC_Widget_Cart' ); ?>				
					</div>
				<?php endif; ?>				
					<?php 
						wp_nav_menu( array(
							'theme_location'	=> 'primary',
							'menu_class'			=> 'primary-menu',
							'container'         => 'ul',				
						));
					?>
				</nav>
			</div>
		</div>
		<div class="helper"></div>		
	</header>
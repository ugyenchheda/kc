<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(cristiano_header()); ?>

		<?php get_template_part( 'template-parts/page', 'header-wc'); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>



			<?php if(get_option( 'woocommerce_shop_page_display' ) == ''): ?>


			<?php 
				$args = array (
					'taxonomy' => 'product_cat',
					'hide_empty' => 0,
					'show_option_all' => esc_html__( 'All Categories', 'cristiano' ),
					'title_li' => 0,
					'depth' => 1,
					'hierarchical' => 0,

					);
			?>
			
			<ul id="categories-nav">	
				<?php wp_list_categories( $args ); ?>
			</ul>	
			
			<?php endif; ?>

			

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>
			
					<?php woocommerce_product_subcategories( array(
						'before' => '<ul id="categories-list" class="cols-4">',
						'after' => '</ul>',
					) ); 
					?>

				<?php woocommerce_product_loop_start(); ?>
				

					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php wc_get_template_part( 'content', 'product' ); ?>
						
					<?php endwhile; // end of the loop. ?>
					
				<?php woocommerce_product_loop_end(); ?>
			
			<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 
				'before' => woocommerce_product_loop_start( false ), 
				'after' => woocommerce_product_loop_end( false ) 
			) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>		
	<?php //do_action( 'woocommerce_sidebar' ); ?>	


<?php get_footer( 'shop' ); ?>

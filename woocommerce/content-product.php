<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li>
	<div <?php post_class(); ?>>
		<a class="image" href="<?php the_permalink(); ?>">
			<?php 
				do_action( 'woocommerce_before_shop_loop_item_title' );
				do_action( 'woocommerce_after_shop_loop_item_title'); 
			?>
		</a>
		<div class="description">
			<h2 class="title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
			<?php the_excerpt(); ?>		
			<?php //woocommerce_template_loop_price(); ?>		
			<?php woocommerce_template_loop_add_to_cart(); ?>
		</div>
	</div>
</li>

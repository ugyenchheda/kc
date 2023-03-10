<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
	exit;
}
?>
<li class="item">
	<div <?php wc_product_cat_class( '', $category ); ?>>
		<a href="<?php echo get_term_link( $category, 'product_cat' ); ?>">
			<h2><?php echo esc_attr( $category->name ); ?></h2>	
			<?php cristiano_woocommerce_subcategory_thumbnail( $category ); ?>
			<span class="gradient"></span>
		</a>
	</div>
</li>

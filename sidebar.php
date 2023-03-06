<?php
/**
 * The template for the sidebar containing the main widget area
 *
 */
?>

<?php if ( is_active_sidebar( 'right_sidebar' )  ) : ?>
	<aside id="right-sidebar" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'right_sidebar' ); ?>
	</aside>
<?php endif; ?>
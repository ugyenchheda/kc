<?php
// Template Name: Our Menu
//for custom template

get_header(cristiano_header()); 
get_template_part( 'template-parts/page', 'header' );

$cat_array = restocore_get_meta_data( 'dishes_cat' );
$dishes_cols = restocore_get_meta_data( 'dishes_cols' );
$args = array(
	'hide_empty' => true,
	'include'	=> $cat_array,
);
$tax_terms = get_terms( 'dishes_categories', $args ); 
?>
	<div id="layout" class="<?php cristiano_site_layout(); ?>">
		<div id="container" >
			<div id="content" class="center">
				<div <?php post_class()?>>
					<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
					<div id="dishes-menu" class="reset">
						<?php foreach ($tax_terms as $tax_term): ?>
							<?php if( count($cat_array) != 1 ): ?>
								<div class="section-title">
									<h3 class="pr-font">
										<?php echo $tax_term->name; ?>
									</h3>
								</div>
							<?php endif; ?>
							<?php 
								$args = array(
									'post_type' => 'dishes_menu',
									'dishes_categories' => $tax_term->slug,
									'nopaging' => true,
								);
								$the_query = new WP_Query( $args );
							?>
							<?php if ( $the_query->have_posts() ) : ?>
								<ul class="dishes-menu margin-large <?php echo esc_attr( $dishes_cols ); ?>">
									<?php while ( $the_query->have_posts() ): $the_query->the_post() ?>
										<?php get_template_part( 'template-parts/loop', 'our-menu' ); ?>
									<?php endwhile; ?>
								</ul>
							<?php else: ?>
								<p class="woocommerce-info">
									<?php echo esc_html_e('No products were found matching your selection.', 'cristiano'); ?>
								</p>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

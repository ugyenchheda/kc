<?php get_header(cristiano_header()); ?>

	<?php if ( function_exists('restocore') ): ?>
		<?php restocore_slider(); ?>
	<?php endif; ?>
	
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts()) : the_post(); ?>
				<div id="layout" class="front <?php cristiano_site_layout(); ?>">
					<div id="container">
						<div id="content">		
							<?php if( is_home() ): ?>
								<div class="center">
									<?php get_template_part( 'template-parts/loop', 'blog' ); ?>
								</div>
							<?php else: ?>
								<?php the_content(); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>			
		<?php endwhile; ?>	
	<?php endif; ?>	
<?php get_footer(); ?>	
<?php get_header(cristiano_header()); ?>
	<?php get_template_part( 'template-parts/page', 'header' ); ?>
	<?php if ( have_posts() ) : ?>
		<div id="layout" class="<?php cristiano_site_layout(); ?>">
			<div id="container">
				<div id="content" class="center">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'template-parts/loop', 'blog' ); ?>
					<?php endwhile; ?>
					<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>	
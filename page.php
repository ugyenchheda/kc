<?php get_header(cristiano_header()); ?>
	<?php get_template_part( 'template-parts/page', 'header' ); ?>
	<?php if ( have_posts() ) : ?>
	<div id="layout" class="<?php cristiano_site_layout(); ?>">
		<div id="container" >
			<div id="content" class="">
				<div <?php post_class()?>>
					<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>			
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php get_footer(); ?>
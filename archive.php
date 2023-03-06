<?php get_header(cristiano_header()); ?>
	<div id="page-title">
		<div class="center">
			<h1> <?php the_archive_title(); ?></h1>
		</div>
	</div>	
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
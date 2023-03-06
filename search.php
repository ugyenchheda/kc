<?php get_header(); ?>
	<div id="page-title">
		<div class="center">
			<h1><?php esc_html_e('Search Results for:', 'cristiano'); ?> <?php the_search_query(); ?></h1>
		</div>
	</div>	
	<div class="center">

		<?php if ( have_posts() ) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'template-parts/loop', 'blog' ); ?>				
				<?php endwhile; ?>
				<?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>			
		<?php else: ?>
			<div class="no-results">
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cristiano' ); ?></p>
				<?php get_search_form(); ?>	
			<?php endif; ?>
			</div>
	</div>

	
<?php get_footer(); ?>
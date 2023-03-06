<?php $even_odd_class = $wp_query->current_post % 2 == 0 ? 'even' : 'to-right'; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class("article cols-2 no-margin $even_odd_class"); ?>>
	<?php if(has_post_thumbnail()): ?>
	<div class="image">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'medium' ); ?>
		</a>
	</div>	
	<?php endif; ?>
	<div class="details">
		<time class="date pr-font" datetime="<?php the_date('Y-m-d'); ?>">
			<?php the_time('F j, Y'); ?>
		</time>			
		<h2>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		<div class="content">
			<?php cristiano_excerpt_content(); ?>
		</div>
		<a class="btn-plate" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'cristiano') ?></a>
	</div>
</article>
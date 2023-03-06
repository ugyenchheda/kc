<li <?php post_class() ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="thumbnail">
			<?php the_post_thumbnail( 'cristiano_small_image' ); ?>
		</div>
	<?php endif; ?>
	<div class="description">
		<span class="pr-font dm-price"><?php restocore_dishes_price(); ?></span>				
		<h2><span class="title"><?php the_title(); ?></span><?php restocore_highlight_text(); ?></h2>
		<div class="dots"><?php the_content(); ?></div>
		<?php edit_post_link(); ?>
	</div>
</li>
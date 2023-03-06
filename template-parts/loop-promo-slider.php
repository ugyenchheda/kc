<div class="swiper-slide item" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
	<div class="center">
		<div class="details">
			<h2 class="title"><?php the_title(); ?></h2>
			<div class="content">
				<?php the_content(); ?>
				<?php edit_post_link(); ?>
			</div>
		</div>
	</div>
</div>
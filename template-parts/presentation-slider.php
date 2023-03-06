<section id="slider">		
	<?php $gallery = cs_get_option( 'slider_images' ); ?>
	<?php if( ! empty( $gallery ) ) : ?>
		<?php $ids = explode( ',', $gallery ); ?>
		<?php foreach ( $ids as $id ) : ?>
			<?php $attachment = wp_get_attachment_image_src( $id, 'full' ); ?>
			<div class="item" style="background-image: url(<?php echo esc_url($attachment[0]); ?>)"></div>
		<?php endforeach; ?>
	<?php endif; ?>
	<div class="description">
		<div class="cell">
			<div class="center">
				<?php if( !is_null( cs_get_option( 'site_title' )) ): ?>
					<h1 class="title"><?php echo trim( cs_get_option( 'site_title' ) ); ?></h1>
				<?php endif ?>
				<?php if( !is_null( cs_get_option( 'site_subtitle' ))) : ?>
					<p class="title"><?php  echo trim( cs_get_option( 'site_subtitle' ) ); ?></p>
				<?php endif;?>
			</div>
		</div>
	</div>
	<span class="dim"></span>
	<span class="scroll">
		<span class="wheel"></span>
	</span>
</section>
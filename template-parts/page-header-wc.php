<?php if( is_checkout() || is_cart() || is_account_page() ): ?>
	<div id="page-title">
		<div class="center">
			<h1><?php cristiano_page_title(); ?></h1>
		</div>
	</div>
<?php else : ?>
	<div id="page-header" style="background-image: url(<?php cristiano_header_image_wc(); ?>)">
		<div class="center">
			<h1><?php cristiano_page_title(); ?></h1>
		</div>
		<span class="dim"></span>
	</div>
<?php endif; ?>
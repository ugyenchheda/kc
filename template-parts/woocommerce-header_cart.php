<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<i class="fa fa-shopping-bag"></i>
	<span class="count">
		<?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?>
	</span>
</a>
<?php
class Woocommerce_Dropdown_Cart extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'woocommerce-dropdown-cart', // Base ID
			'Woocommerce Dropdown Cart', // Name
			array( 'description' => __( 'Woocommerce Dropdown Cart', 'qode' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		echo $before_widget;
		global $woocommerce; ?>
		<div class="shopping_cart_outer">
			<div class="shopping_cart_inner">
				<div class="shopping_cart_header">
					<a class="header_cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="icon_cart_alt"></i><span class="header_cart_span"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a>
					<div class="shopping_cart_dropdown">
						<div class="shopping_cart_dropdown_inner1">
							<?php
							$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
							$list_class = array( 'cart_list', 'product_list_widget' );
							?>
							<ul>

								<?php if ( !$cart_is_empty ) : ?>

									<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

										$_product = $cart_item['data'];

										// Only display if allowed
										if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
											continue;
										}

										// Get price
										$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

										$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
										?>


										<li>
											<div class="item_image_holder">
												<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
													<?php echo $_product->get_image(); ?>
												</a>
											</div>
											<div class="item_info_holder">
												<div class="item_left">
													<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
														<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
													</a>
													<span class="quantity"><?php _e('Quantity: ','qode'); echo $cart_item['quantity']; ?>
												</div>
												<div class="item_right">
													<?php echo $product_price; ?>
													<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'qode') ), $cart_item_key ); ?>

												</div>
											</div>
										</li>

									<?php endforeach; ?>
									<div class="cart_bottom">
										<div class="subtotal_holder">
											<span class="total"><?php _e( 'Total', 'woocommerce' ); ?>:</span>
											<span class="total_amount"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
										</div>
										<div class="btns_holder">
											<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="qbutton small view-cart"><?php _e( 'Shopping Bag', 'woocommerce' ); ?></a>
											<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="qbutton small checkout"><?php _e( 'Checkout', 'woocommerce' ); ?><span class="arrow_right" aria-hidden="true"></span></a>
										</div>
									</div>
								<?php else : ?>

									<li class="empty_cart"><?php _e( 'No products in the cart.', 'woocommerce' ); ?></li>

								<?php endif; ?>

							</ul>
						</div>
						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
						

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		echo $after_widget;
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();

		return $instance;
	}

}
add_action( 'widgets_init', create_function( '', 'register_widget( "Woocommerce_Dropdown_Cart" );' ) );
?>
<?php
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<div class="shopping_cart_header">
		<a class="header_cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="icon_cart_alt"></i><span class="header_cart_span"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a>
		<div class="shopping_cart_dropdown">
			<div class="shopping_cart_dropdown_inner1">
				<?php
				$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
				//$list_class = array( 'cart_list', 'product_list_widget' );
				?>
				<ul>

					<?php if ( !$cart_is_empty ) : ?>

						<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

							$_product = $cart_item['data'];

							// Only display if allowed
							if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
								continue;
							}

							// Get price
							$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

							$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
							?>

							<li>
								<div class="item_image_holder">
									<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
										<?php echo $_product->get_image(); ?>
									</a>
								</div>
								<div class="item_info_holder">
									<div class="item_left">
										<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">
											<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
										</a>
											<span class="quantity"><?php _e('Quantity: ','qode'); echo $cart_item['quantity']; ?>

									</div>
									<div class="item_right">
										<?php echo $product_price; ?>
										<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'qode') ), $cart_item_key ); ?>

									</div>
								</div>
							</li>

						<?php endforeach; ?>
							<div class="cart_bottom">
								<div class="subtotal_holder">
									<span class="total"><?php _e( 'Total', 'woocommerce' ); ?>:</span>
									<span class="total_amount"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
								</div>
								<div class="btns_holder">
									<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="qbutton small view-cart"><?php _e( 'Shopping Bag', 'woocommerce' ); ?></a>
									<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="qbutton small checkout"><?php _e( 'Checkout', 'woocommerce' ); ?><span class="arrow_right" aria-hidden="true"></span></a>
								</div>
							</div>
					<?php else : ?>

						<li class="empty_cart"><?php _e( 'No products in the cart.', 'woocommerce' ); ?></li>

					<?php endif; ?>

				</ul>
			</div>
			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
			

			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
		</div>
	</div>

	<?php
	$fragments['div.shopping_cart_header'] = ob_get_clean();
	return $fragments;
}
?>
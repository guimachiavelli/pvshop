<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post" class="cabinet cabinet--cart cabinet-top">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<ul class="cart-table" cellspacing="0">
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<li class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> cabinet-body cart-product">
					<div class="cart-product-content">
						<div class="cart-product-remove">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
							?>
						</div>

						<div class="cart-product-thumbnail">
							<?php
								$thumbnail = get_the_post_thumbnail($product_id, 'large');

								if ( ! $_product->is_visible() )
									echo $thumbnail;
								else
									printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
							?>
						</div>

						<?php if ($_product->get_attribute('note') !== '') : ?>
						<div class="cart-product-note">
							<p><?php echo $_product->get_attribute('note');?></p>
						</div>
						<?php endif; ?>

						<div class="cart-product-quantity">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										'min_value'   => '0'
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
							?>
						</div>

						<div class="cart-product-subtotal">
							<span class="btn">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
							</span>
						</div>
					</div>
				</li>
					<?php
				}
			}
			do_action( 'woocommerce_cart_contents' );
	?>
</ul>
<?php do_action( 'woocommerce_after_cart_table' ); ?>


<div class="cart-footer cabinet-bottom" colspan="6">
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
	<div class="cart-total cabinet-box">
		<input type="submit" class="btn update-btn" name="update_cart" value="Update Basket">
		<p>Subtotal: <?php wc_cart_totals_subtotal_html(); ?></p>
	</div>

	<div class="cart-calculator">
		<?php woocommerce_shipping_calculator(); ?>
	</div>

	<div class="cart-actions">
		<input type="submit" class="checkout-button alt wc-forward btn" name="proceed" value="<?php _e( 'Checkout', 'woocommerce' ); ?>" />
	</div>

	<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

	<?php wp_nonce_field( 'woocommerce-cart' ); ?>
</div>

<?php do_action( 'woocommerce_after_cart_contents' ); ?>


</form>

<?php do_action( 'woocommerce_after_cart' ); ?>

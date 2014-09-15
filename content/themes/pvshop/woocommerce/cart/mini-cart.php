<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

    <div class="cart-widget">
        <a href="<?php echo get_permalink(woocommerce_get_page_id('cart')); ?>">
           <?php $plural = sizeof(WC()->cart->get_cart()) < 2 ? 'item' : 'items'; ?>

            <p><?php echo sizeof(WC()->cart->get_cart()); ?> <?echo $plural; ?> in the basket</p>

            <p class="total"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
        </a>
    </div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>

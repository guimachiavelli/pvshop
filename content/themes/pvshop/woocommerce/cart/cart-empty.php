<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

?>

<div class="cabinet cabinet-top cabinet--checkout cart-empty">

    <div class="cabinet-body">
        <p class="cart-empty-text"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>
    </div>

    <div class="cabinet-bottom"></div>
    <?php do_action( 'woocommerce_cart_is_empty' ); ?>
</div>

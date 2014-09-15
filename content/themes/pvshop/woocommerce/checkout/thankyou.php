<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<div class="cabinet cabinet--checkout cabinet--thankyou cabinet-top">
    <div class="cabinet-body">
<?php
if ( $order ) : ?>

    <?php if ( in_array( $order->status, array( 'failed' ) ) ) : ?>

        <p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

    <?php else : ?>

        <p class="pannel">Your order has been received. You'll now receive an email from us.</p>
        <div class="table-wrapper">
            <table class="order_details">
                <thead>
                    <tr>
                        <th class="order">Order</th>
                        <th class="date">Date</th>
                        <th class="total">Total</th>
                        <th class="method">Payment Method</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong><?php echo $order->get_order_number(); ?></strong>
                        </td>
                        <td class="date">
                            <strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
                        </td>
                        <td class="total">
                            <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                        </td>
                        <td class="method">
                            <strong><?php echo $order->payment_method_title; ?></strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <div class="bank-account">
        <?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
    </div>

<?php else : ?>

    <p><?php _e( 'Thank you. Your order has been received.', 'woocommerce' ); ?></p>

<?php endif; ?>
    </div>
    <div class="cabinet-bottom"></div>
</div>

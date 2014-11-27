<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<!--<h2><?php _e( 'Cart Totals', 'woocommerce' ); ?></h2>-->
	<?php /*
	
	<table class="shop-delivery-table">
		<tr>
			<th colspan="2">DELIVERY OPTIONS</th>
		</tr>
		<tr>
			<td>Next day</td>
			<td class="second"><input type="radio" name="delivery_option"></td>
		</tr>
		<tr>
			<td>3-5 days</td>
			<td class="second"><input type="radio" name="delivery_option"></td>
		</tr>
	</table>
	
	<script>
		jQuery(function(){
			jQuery('.shop-delivery-table input[type="radio"]').styler();
		});
	</script>

	<table cellspacing="0" class="cart-totals-table">
		<tr>
			<th>TOTAL GOODS (inc. VAT)</th>
			<td class="second">£270</td>
		</tr>
		<tr>
			<th>DELIVERY (inc. VAT)</th>
			<td class="second">£20</td>
		</tr>
		<tr>
			<th>VAT total</th>
			<td class="second">£40</td>
		</tr>
		<tr class="total">
			<th>Grand Total (inc. VAT)</th>
			<td class="second">£330</td>
		</tr>
		<tr>
			<th>Grand Total (Ex. VAT)</th>
			<td class="second">£270</td>
		</tr>
	</table>
	*/ ?>
		
	<table cellspacing="0" class="cart-totals-table">

		<tr class="cart-subtotal">
			<th><?php _e( 'Cart Subtotal', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
				<th><?php _e( 'Coupon:', 'woocommerce' ); ?> <?php echo esc_html( $code ); ?></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->tax_display_cart == 'excl' ) : ?>
			<?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
			<tr class="order-discount coupon-<?php echo esc_attr( $code ); ?>">
				<th><?php _e( 'Coupon:', 'woocommerce' ); ?> <?php echo esc_html( $code ); ?></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php _e( 'Order Total', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>
	
	<input type="button" class="button grey alt wc-forward" onClick='jQuery(".checkout-button").click();' name="proceed" value="<?php _e( 'Checkout', 'woocommerce' ); ?>" />

	<?php if ( WC()->cart->get_cart_tax() ) : ?>
		<p><small><?php

			$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
				? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
				: '';

			printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

		?></small></p>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
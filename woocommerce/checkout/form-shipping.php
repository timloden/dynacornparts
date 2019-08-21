<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>


<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

<div class="row woocommerce-shipping-fields">

	<div class="col-12 mb-20">
        <input class="shipping-address-checkbox" id="address" type="checkbox" data-target="createp_account" />
        <label class="righ_0" for="address" data-toggle="collapse" data-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label>

		<div id="collapsetwo" class="collapse one" data-parent="#accordion">


				<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

				<div class="row woocommerce-shipping-fields__field-wrapper">
					<?php foreach ($checkout->get_checkout_fields('shipping') as $key => $field) : ?>

						<?php
							$field['return'] = true;	//	Returning it to a string to I can run a str_replace and change the hard-coded <p> tags for <divs>

							// if (isset($field['country_field'], $fields[$field['country_field'] ])) {
							// 	$field['country'] = $checkout->get_value($field['country_field']);
							// }

							if ($key === 'shipping_address_1' || $key === 'shipping_address_2' || $key === 'shipping_email') {

								$theField = woocommerce_form_field($key, $field, $checkout->get_value($key));
								$theField = str_replace('<p', '<div class="col-12 mb-20"', $theField);	//	Add your classes here too, if you want
								$theField = str_replace('</p', '</div', $theField);
								echo $theField;

							} else {

								$theField = woocommerce_form_field($key, $field, $checkout->get_value($key));
								$theField = str_replace('<p', '<div class="col-lg-6 mb-20"', $theField);	//	Add your classes here too, if you want
								$theField = str_replace('</p', '</div', $theField);
								echo $theField;
							}

						?>

					<?php endforeach; ?>
				</div>

				<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>
		 <div class="col-12">
            <div class="row order-notes">
            	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

            	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

					<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>
						<label for="order_note"><?php esc_html_e( 'Additional information', 'woocommerce' ); ?></label>
					<?php endif; ?>

	                <div class="woocommerce-additional-fields__field-wrapper">
						<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
							<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
						<?php endforeach; ?>
					</div>

                <?php endif; ?>

                <?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
            </div>
        </div>
	</div>
</div>

<?php endif; ?>

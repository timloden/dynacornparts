<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<!--Checkout page section-->
	<div class="Checkout_section mt-32">
	   <div class="container">
	        <div class="row">
	        	<?php if (!is_user_logged_in()) : ?>
	           <div class="col-6">
	                <div class="user-actions">
	                    <h3>
	                        <i class="fa fa-file-o" aria-hidden="true"></i>
	                        Returning customer?
	                        <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>

	                    </h3>
	                     <div id="checkout_login" class="collapse" data-parent="#accordion">
	                        <div class="checkout_info">
	                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
	                           <?php

								woocommerce_login_form(
									array(
										'message'  => __( 'If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),
										'redirect' => wc_get_page_permalink( 'checkout' ),
										'hidden'   => true,
									)
								);
								?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        	<?php endif; ?>
	            <div class="<?php if (!is_user_logged_in()) { echo'col-6';} else { echo 'col-12';} ?>">
	                <div class="user-actions">
	                    <h3>
	                        <i class="fa fa-file-o" aria-hidden="true"></i>
	                        Have a coupon code?
	                        <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>

	                    </h3>
	                     <div id="checkout_coupon" class="collapse" data-parent="#accordion">
	                        <div class="checkout_info">
	                            <form method="post">
	                                <input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
	                                <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	           </div>
	        </div>
	        <div class="checkout_form">
	            <div class="row">
	                <div class="col-lg-6 col-md-6">

					<?php if ( $checkout->get_checkout_fields() ) : ?>

						<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

						<?php do_action( 'woocommerce_checkout_billing' ); ?>

						<?php do_action( 'woocommerce_checkout_shipping' ); ?>

						<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

					<?php endif; ?>

	                </div>
	                <div class="col-lg-6 col-md-6">

	                	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                        <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

                        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                        <div id="order_review" class="woocommerce-checkout-review-order">
							<?php do_action( 'woocommerce_checkout_order_review' ); ?>
						</div>

						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!--Checkout page section end-->
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

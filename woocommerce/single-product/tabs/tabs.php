<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
				<div class="product_d_inner">
				    <div class="product_info_button">
				        <ul class="nav" role="tablist">
				        	<?php foreach ( $tabs as $key => $tab ) : ?>
								<li>
									<a data-toggle="tab" href="#tab-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="info" aria-selected="false" class="<?php if ($tab['callback'] === 'woocommerce_product_description_tab') { echo 'active show'; } ?>">
										<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
									</a>
								</li>
							<?php endforeach; ?>
				        </ul>
				    </div>

				    <div class="tab-content">
				    	<?php foreach ( $tabs as $key => $tab ) : ?>
				        <div class="tab-pane fade <?php if ($tab['callback'] === 'woocommerce_product_description_tab') { echo 'show active'; } ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" >
				            <div class="product_info_content">
				                <?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
				            </div>
				        </div>
						<?php endforeach; ?>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

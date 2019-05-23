<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Dynacorn_Parts
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
// function dynacornparts_woocommerce_setup() {
// 	add_theme_support( 'woocommerce' );
// 	add_theme_support( 'wc-product-gallery-zoom' );
// 	add_theme_support( 'wc-product-gallery-lightbox' );
// 	add_theme_support( 'wc-product-gallery-slider' );
// }
// add_action( 'after_setup_theme', 'dynacornparts_woocommerce_setup' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );



/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function dynacornparts_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'dynacornparts_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function dynacornparts_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'dynacornparts_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function dynacornparts_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'dynacornparts_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function dynacornparts_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'dynacornparts_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function dynacornparts_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'dynacornparts_woocommerce_related_products_args' );

if ( ! function_exists( 'dynacornparts_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function dynacornparts_woocommerce_product_columns_wrapper() {
		echo '';
	}
}
add_action( 'woocommerce_before_shop_loop', 'dynacornparts_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'dynacornparts_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function dynacornparts_woocommerce_product_columns_wrapper_close() {
		echo '';
	}
}
add_action( 'woocommerce_after_shop_loop', 'dynacornparts_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

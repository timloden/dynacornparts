<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<!--shop  area start-->
<div class="shop_area shop_reverse">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
               <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_inner">

                        <div class="widget_list widget_categories">
                         	<?php
                         	/**
							 * Hook: woocommerce_sidebar.
							 *
							 * @hooked woocommerce_get_sidebar - 10
							 */
							do_action( 'woocommerce_sidebar' );
							?>
                         </div>

                    </div>
                </aside>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
            	<?php if ( is_product_category() ){
					    global $wp_query;

					    // get the query object
					    $cat = $wp_query->get_queried_object();

					    // get the thumbnail id using the queried category term_id
					    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );

					    // get the image URL
					    $image = wp_get_attachment_url( $thumbnail_id );

					    if ($image) {
					    	 echo '<div class="shop_banner"><img src="' . $image . '"></div>';
					    }
					}
				?>
                <div class="shop_toolbar_wrapper">

				<?php if ( woocommerce_product_loop() ) {
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				}
				?>

                </div>

                	<div class="row shop_wrapper">

					<?php
					if ( woocommerce_product_loop() ) {

						woocommerce_product_loop_start();
						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();
								/**
								 * Hook: woocommerce_shop_loop.
								 *
								 * @hooked WC_Structured_Data::generate_product_data() - 10
								 */
								do_action( 'woocommerce_shop_loop' );
								wc_get_template_part( 'content', 'product' );
							}
						}
						woocommerce_product_loop_end();

						echo '</div>';
						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );


					} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					}
					?>


			</div>
        </div>
    </div>
</div>
<!--shop  area end-->

<?php get_template_part('template-parts/cta', 'global'); ?>

<?php get_footer( 'shop' ); ?>

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
				<div class="shop_banner">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner8.jpg" alt="">
                </div>
            	<div class="shop_title">
                    <h1>shop</h1>
                </div>
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
 <!--call to action start-->
<section class="call_to_action">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call_action_inner">
                    <div class="call_text">
                        <h3>We Have <span>Recommendations</span>  for You</h3>
                        <p>Take 30% off when you spend $150 or more with code Autima11</p>
                    </div>
                    <div class="discover_now">
                        <a href="#">discover now</a>
                    </div>
                    <div class="link_follow">
                        <ul>
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--call to action end-->

<?php get_footer( 'shop' ); ?>

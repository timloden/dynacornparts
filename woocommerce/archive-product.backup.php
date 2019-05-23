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
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                        <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                        <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                    </div>
                    <div class=" niceselect_option">

                        <form class="select_option" action="#">
                            <select name="orderby" id="short">

                                <option selected value="1">Sort by average rating</option>
                                <option  value="2">Sort by popularity</option>
                                <option value="3">Sort by newness</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                                <option value="6">Product Name: Z</option>
                            </select>
                        </form>


                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                 <!--shop toolbar end-->

                 <div class="row shop_wrapper">
				<?php
                    // Only run on shop archive pages, not single products or other pages
                    if ( is_shop() || is_product_category() || is_product_tag() ) {
                        // Products per page
                        $per_page = 24;
                        if ( get_query_var( 'taxonomy' ) ) { // If on a product taxonomy archive (category or tag)
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => $per_page,
                                'paged' => get_query_var( 'paged' ),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => get_query_var( 'taxonomy' ),
                                        'field'    => 'slug',
                                        'terms'    => get_query_var( 'term' ),
                                    ),
                                ),
                            );
                        } else { // On main shop page
                            $args = array(
                                'post_type' => 'product',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => $per_page,
                                'paged' => get_query_var( 'paged' ),
                            );
                        }
                        // Set the query
                        $products = new WP_Query( $args );

                        echo '<pre>';
                        //print_r($products);
                        echo '</pre>';
                        // Standard loop
                        if ( $products->have_posts() ) :
                            while ( $products->have_posts() ) : $products->the_post();
                               	$product = get_product($products->post);
                                ?>

								<div class="col-lg-4 col-md-4 col-12 ">
		                            <div class="single_product">
		                                <div class="product_name grid_name">
		                                    <h3><a href="<?php echo get_permalink( $products->post->ID ) ?>"><?php the_title(); ?></a></h3>
		                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
		                                </div>
		                                <div class="product_thumb">
		                                    <a class="primary_img" href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/product10.jpg" alt=""></a>
		                                    <a class="secondary_img" href="product-details.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/product11.jpg" alt=""></a>
		                                    <div class="label_product">
		                                        <span class="label_sale">-47%</span>
		                                    </div>
		                                    <div class="action_links">
		                                        <ul>
		                                            <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
		                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
		                                            <li class="compare"><a href="#" title="compare"><span class="lnr lnr-sync"></span></a></li>
		                                        </ul>
		                                    </div>
		                                </div>
		                                <div class="product_content grid_content">
		                                    <div class="content_inner">
		                                        <div class="product_ratings">
		                                            <ul>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                            </ul>
		                                        </div>
		                                        <div class="product_footer d-flex align-items-center">
		                                            <div class="price_box">
		                                                <span class="current_price"><?php echo $product->get_price(); ?></span>
		                                                <span class="old_price">$3200.00</span>
		                                            </div>
		                                            <div class="add_to_cart">
		                                                <a href="<?php echo $product->add_to_cart_url(); ?>" title="add to cart"><span class="lnr lnr-cart"></span></a>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="product_content list_content">
		                                    <div class="left_caption">
		                                       <div class="product_name">
		                                            <h3><a href="<?php echo get_permalink( $products->post->ID ) ?>"><?php the_title(); ?></a></h3>
		                                        </div>
		                                        <div class="product_ratings">
		                                            <ul>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                                <li><a href="#"><i class="ion-star"></i></a></li>
		                                            </ul>
		                                        </div>

		                                        <div class="product_desc">
		                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores  </p>
		                                        </div>
		                                    </div>
		                                    <div class="right_caption">
		                                      <div class="text_available">
		                                          <p>availabe: <span>99 in stock</span></p>
		                                      </div>
		                                       <div class="price_box">
		                                            <span class="current_price">$160.00</span>
		                                            <span class="old_price">$420.00</span>
		                                        </div>
		                                        <div class="cart_links_btn">
		                                            <a href="<?php echo $product->add_to_cart_url(); ?>" title="add to cart">add to cart</a>
		                                        </div>
		                                        <div class="action_links_btn">
		                                            <ul>
		                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
		                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
		                                                <li class="compare"><a href="#" title="compare"><span class="lnr lnr-sync"></span></a></li>
		                                            </ul>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>

                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    } else { // If not on archive page (cart, checkout, etc), do normal operations
                        woocommerce_content();
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

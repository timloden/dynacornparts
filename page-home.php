<?php
/**
 * Template name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dynacorn_Parts
 */

get_header();


?>
<!--slider area start-->

<?php if(have_rows('hero_slider') ) : ?>

<section class="slider_section slider_two mb-50">
    <div class="slider_area owl-carousel">

    <?php while( have_rows('hero_slider') ): the_row();

        // vars
        $sub_title = get_sub_field('sub_title');
        $title = get_sub_field('title');
        $button_text = get_sub_field('button_text');
        $button_link = get_sub_field('button_link');
        $background_image = get_sub_field('background_image');
        $text_color = get_sub_field('text_color');

        ?>

            <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo $background_image['url']; ?>">
                <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="slider_content">
                                <h2 style="color: <?php echo esc_attr($text_color); ?>;"><?php echo esc_attr($sub_title); ?></h2>
                                <h1 style="color: <?php echo esc_attr($text_color); ?>;"><?php echo esc_attr($title); ?></h1>
                                <a class="button" href="<?php echo esc_url($button_link); ?>"><?php echo esc_attr($button_text); ?></a>
                            </div>
                       </div>
                   </div>
               </div>
            </div>

    <?php endwhile; ?>

    </div>
</section>

<?php endif; ?>

<!--slider area end-->

<!--shipping area start-->
<!-- <section class="shipping_area mb-50">
    <div class="container">
        <div class=" row">
           <div class="col-12">
               <div class="shipping_inner">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Support 24/7</h2>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>100% Money Back</h2>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Payment Secure</h2>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
</section> -->
<!--shipping area end-->

<?php //echo do_shortcode( '[featured_products per_page="12" columns="4"]' ); ?>



<!--product area start-->
<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span>Dynacorn</span>Products</h2>
                    <ul class="product_tab_button nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#brake" role="tab" aria-controls="brake" aria-selected="true">Featured Products</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#wheels" role="tab" aria-controls="wheels" aria-selected="false">New Products</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="brake" role="tabpanel">
                <div class="product_carousel product_column5 owl-carousel">
                    <?php
                    if(!function_exists('wc_get_products')) {
                        return;
                    }
                    $paged                   = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                    //$ordering                = WC()->query->get_catalog_ordering_args();
                    //$ordering['orderby']     = array_shift(explode(' ', $ordering['orderby']));
                    //$ordering['orderby']     = stristr($ordering['orderby'], 'price') ? 'meta_value_num' : $ordering['orderby'];
                    $products_per_page       = 10;
                    $featured_products       = wc_get_products(
                        array(
                        'meta_key'             => '_price',
                        'status'               => 'publish',
                        'limit'                => $products_per_page,
                        'page'                 => $paged,
                        'featured'             => true,
                        'paginate'             => true,
                        'return'               => 'ids',
                        )
                    );
                    wc_set_loop_prop('current_page', $paged);
                    wc_set_loop_prop('is_paginated', wc_string_to_bool(true));
                    wc_set_loop_prop('page_template', get_page_template_slug());
                    wc_set_loop_prop('per_page', $products_per_page);
                    wc_set_loop_prop('total', $featured_products->total);
                    wc_set_loop_prop('total_pages', $featured_products->max_num_pages);

                    if($featured_products) {
                        //do_action('woocommerce_before_shop_loop');
                        woocommerce_product_loop_start();
                        foreach($featured_products->products as $featured_product) {
                            $post_object = get_post($featured_product);
                            setup_postdata($GLOBALS['post'] =& $post_object);
                            wc_get_template_part('content', 'product-home');
                        }
                        wp_reset_postdata();
                        woocommerce_product_loop_end();
                        //do_action('woocommerce_after_shop_loop');
                    } else {
                        do_action('woocommerce_no_products_found');
                    }
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="wheels" role="tabpanel">
                 <div class="product_carousel product_column5 owl-carousel">
                    <?php
                    if(!function_exists('wc_get_products')) {
                        return;
                    }
                    $paged                   = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                    $products_per_page       = 10;
                    $recent_products       = wc_get_products(
                        array(
                        'meta_key'             => '_price',
                        'status'               => 'publish',
                        'limit'                => $products_per_page,
                        'page'                 => $paged,
                        'featured'             => false,
                        'paginate'             => true,
                        'return'               => 'ids',
                        'orderby'              => 'date',
                        //'order'                => $ordering['order'],
                        )
                    );
                    wc_set_loop_prop('current_page', $paged);
                    wc_set_loop_prop('is_paginated', wc_string_to_bool(true));
                    wc_set_loop_prop('page_template', get_page_template_slug());
                    wc_set_loop_prop('per_page', $products_per_page);
                    wc_set_loop_prop('total', $recent_products->total);
                    wc_set_loop_prop('total_pages', $recent_products->max_num_pages);

                    if($recent_products) {
                        //do_action('woocommerce_before_shop_loop');
                        woocommerce_product_loop_start();
                        foreach($recent_products->products as $recent_product) {
                            $post_object = get_post($recent_product);
                            setup_postdata($GLOBALS['post'] =& $post_object);
                            wc_get_template_part('content', 'product-home');
                        }
                        wp_reset_postdata();
                        woocommerce_product_loop_end();
                        //do_action('woocommerce_after_shop_loop');
                    } else {
                        do_action('woocommerce_no_products_found');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--product area end-->


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

<?php
//get_sidebar();
get_footer();

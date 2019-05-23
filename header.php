<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dynacorn_Parts
 */

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<?php
	$cart_count = WC()->cart->get_cart_contents_count();
	$cart_total = WC()->cart->get_cart_contents_total();
	// echo '<pre>';
	// print_r(WC()->cart->get_cart());
	// echo '</pre>';
	?>
</head>

<body <?php body_class(); ?>>

<header class="header_area header_padding">
	<!--header top start-->
	<div class="header_top top_two">
	    <div class="container">
	        <div class="top_inner">
	            <div class="row align-items-center">
	            <div class="col-lg-6 col-md-6">
	                <div class="follow_us">
	                    <label>Follow Us:</label>
	                    <ul class="follow_link">
	                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
	                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
	                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
	                        <li><a href="#"><i class="ion-social-youtube"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-6 col-md-6">
	                <div class="top_right text-right">
	                    <ul>
	                       <li class="top_links"><a href="#"><i class="ion-android-person"></i> My Account<i class="ion-ios-arrow-down"></i></a>
	                            <ul class="dropdown_links">
	                                <li><a href="checkout.html">Checkout </a></li>
	                                <li><a href="my-account.html">My Account </a></li>
	                                <li><a href="cart.html">Shopping Cart</a></li>
	                                <li><a href="wishlist.html">Wishlist</a></li>
	                            </ul>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	        </div>
	    </div>
	</div>
	<!--header top start-->
	<!--header middel start-->
	<div class="header_middle middle_two">
	    <div class="container">
	        <div class="row align-items-center">
	            <div class="col-lg-3 col-md-3">
	                <div class="logo">
	                    <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt=""></a>
	                </div>
	            </div>
	            <div class="col-lg-9 col-md-9">
	                <div class="middel_right">
	                    <div class="search-container search_two">
	                       <form action="#">
	                            <div class="search_box">
	                                <input placeholder="Search entire store here ..." type="text">
	                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
	                                <?php //if ( function_exists( 'aws_get_search_form' ) ) { aws_get_search_form(); } ?>
	                            </div>
	                        </form>
	                    </div>
	                    <div class="middel_right_info">

	                      <!--   <div class="header_wishlist">
	                            <a href="wishlist.html"><span class="lnr lnr-heart"></span> Wish list </a>
	                            <span class="wishlist_quantity">0</span>
	                        </div> -->
	                        <div class="mini_cart_wrapper">
	                            <a href="<?php echo site_url(); ?>/cart"><span class="lnr lnr-cart"></span>My Cart </a>

								<?php if ($cart_count != 0) : ?>

	                            <span class="cart_quantity"><?php echo esc_attr($cart_count); ?></span>

	                            <div class="mini_cart">
								<?php foreach ( WC()->cart->get_cart() as $cart_item ) {
									$item_name = $cart_item['data']->get_title();
									$quantity = $cart_item['quantity'];
									$sku = $cart_item['data']->get_sku();
									$cart_item_link = get_permalink( $cart_item['data']->get_id() );
								?>

									<div class="cart_item">
	                                    <div class="cart_info">
	                                        <a href="<?php echo esc_url($cart_item_link); ?> "><?php echo esc_attr($item_name); ?> | <?php echo esc_attr($sku); ?></a>
	                                        <span class="quantity">Qty: <?php echo esc_attr($quantity); ?></span>
	                                    </div>
	                                </div>

								<?php } ?>


	                                <div class="mini_cart_table">
	                                    <div class="cart_total">
	                                        <span>Sub total:</span>
	                                        <span class="price"><?php echo esc_attr($cart_total); ?></span>
	                                    </div>
	                                </div>

	                                <div class="mini_cart_footer">
	                                   <div class="cart_button">
	                                        <a href="<?php echo site_url(); ?>/cart">View cart</a>
	                                    </div>
	                                    <div class="cart_button">
	                                        <a href="<?php echo site_url(); ?>/checkout">Checkout</a>
	                                    </div>

	                                </div>

	                            </div>

	                            <?php endif; ?>

	                        </div>
	                    </div>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!--header middel end-->
	<!--header bottom satrt-->
	<div class="header_bottom header_b_three sticky-header">
	    <div class="container">
	        <div class="row align-items-center">
	            <div class="col-12">
	                <div class="header_bottom_container">
	                    <div class="categories_menu">
	                        <div class="categories_title">
	                            <h2 class="categori_toggle">Browse categories</h2>
	                        </div>
	                        <div class="categories_menu_toggle">
								<?php
									$args = array(
								          'taxonomy' => 'product_cat',
								          'hide_empty' => false,
								          'parent'   => 0
								      );
									$product_cat = get_terms( $args );

									foreach ($product_cat as $parent_product_cat)
									{

									echo '<ul>';

									echo '<li class="menu_item_children categorie_list"><a href="'.get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'<i class="fa fa-angle-right"></i></a>';

										echo '<ul class="categories_mega_menu">';

								  		$child_args = array(
								              'taxonomy' => 'product_cat',
								              'hide_empty' => false,
								              'parent'   => $parent_product_cat->term_id
								        );

								  		$child_product_cats = get_terms( $child_args );

										foreach ($child_product_cats as $child_product_cat)
										{
											echo '<li class="menu_item_children"><a href="'.get_term_link($child_product_cat->term_id).'">'.$child_product_cat->name.'</a>';

											echo '<ul class="categorie_sub_menu">';

											$grand_child_args = array(
									              'taxonomy' => 'product_cat',
									              'hide_empty' => false,
									              'parent'   => $child_product_cat->term_id
									        );

									        $grand_child_product_cats = get_terms( $grand_child_args );

									        foreach ($grand_child_product_cats as $grand_child_product_cat)
											{
												echo '<li><a href="'.get_term_link($grand_child_product_cat->term_id).'">'.$grand_child_product_cat->name.'</a></li>';
											}

											echo '</ul>';

										}


								  		echo '</ul>
								  		</li>

								    </ul>';

									}
								?>
	                        </div>
	                    </div>
	                    <div class="main_menu">
	                        <nav>
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container' => false
								) );
								?>
	                        </nav>
	                    </div>
	                </div>

	            </div>

	        </div>
	    </div>
	</div>
	<!--header bottom end-->
</header>


 <!--Offcanvas menu area start-->
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <span>MENU</span>
                    <a href="#"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">

                    <div class="canvas_close">
                          <a href="#"><i class="ion-android-close"></i></a>
                    </div>


                    <div class="top_right text-right">
                        <ul>
                           <li class="top_links"><a href="#"><i class="ion-android-person"></i> My Account<i class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_links">
                                    <li><a href="checkout.html">Checkout </a></li>
                                    <li><a href="my-account.html">My Account </a></li>
                                    <li><a href="cart.html">Shopping Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="Offcanvas_follow">
                        <label>Follow Us:</label>
                        <ul class="follow_link">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="search-container">
                       <form action="#">
                            <div class="search_box">
                                <input placeholder="Search entire store here ..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </div>
                        </form>
                    </div>
                    <div id="menu" class="text-left ">
                        <?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => false
						) );
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Offcanvas menu area end-->








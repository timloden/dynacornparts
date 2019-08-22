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

$logo = get_field('store_logo', 'option');
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
	$logo = get_field('store_logo', 'option');
	$facebook = get_field('facebook_url', 'option');
	$twitter = get_field('twitter_url', 'option');
	$youtube = get_field('youtube_url', 'option');
	$instagram = get_field('instagram_url', 'option');
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
							<?php if($facebook) :?><li><a href="<?php echo esc_url($facebook); ?>"><i class="ion-social-facebook"></i></a></li><?php endif; ?> 
	                        <?php if($twitter) :?><li><a href="<?php echo esc_url($twitter); ?>"><i class="ion-social-twitter"></i></a></li><?php endif; ?> 
	                        <?php if($instagram) :?><li><a href="<?php echo esc_url($instagram); ?>"><i class="ion-social-instagram"></i></a></li><?php endif; ?> 
	                        <?php if($youtube) :?><li><a href="#<?php echo esc_url($youtube); ?>"><i class="ion-social-youtube"></i></a></li><?php endif; ?> 
	                    </ul>
	                </div>
	            </div>
	            <div class="col-lg-6 col-md-6">
	                <div class="top_right text-right">
	                    <ul>
	                       <li class="top_links"><a href="<?php echo site_url(); ?>/my-account"><i class="ion-android-person"></i> My Account<i class="ion-ios-arrow-down"></i></a>
	                            <ul class="dropdown_links">
	                                <li><a href="<?php echo site_url(); ?>/checkout">Checkout </a></li>
	                                <li><a href="<?php echo site_url(); ?>/my-account">My Account </a></li>
	                                <li><a href="<?php echo site_url(); ?>/cart">Shopping Cart</a></li>
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
	                    <a href="<?php echo site_url(); ?>"><img src="<?php echo esc_url($logo['url']); ?>" alt=""></a>
	                </div>
	            </div>
	            <div class="col-lg-9 col-md-9">
	                <div class="middel_right">
	                    <div class="search-container search_two">

	                        <?php echo do_shortcode('[ymm_selector template="horizontal_selector.php"]'); ?>
	                    </div>
	                    <div class="middel_right_info">
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
	                            <h2 class="categori_toggle">Browse by Vehicle</h2>
	                        </div>
	                        <div class="categories_menu_toggle">
								<?php
									$args = array(
								          'taxonomy' => 'product_cat',
								          'hide_empty' => true,
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

<!--
                    <div class="top_right text-right">
                        <ul>
                           <li class="top_links"><a href="/my-account"><i class="ion-android-person"></i> My Account<i class="ion-ios-arrow-down"></i></a>
                                <ul class="dropdown_links">
                                    <li><a href="/checkout">Checkout </a></li>
                                    <li><a href="/my-account">My Account </a></li>
                                    <li><a href="/cart">Cart</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> -->
<!--                     <div class="Offcanvas_follow">
                        <label>Follow Us:</label>
                        <ul class="follow_link">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
 -->                <div id="menu" class="text-left ">
                        <?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => false
						) );
						?>
                    </div>
                    <div class="mini_cart_wrapper mobile-mini-cart">
                        <a href="<?php echo site_url(); ?>/cart"><span class="lnr lnr-cart"></span></a>

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

                        <?php else : ?>

                        	<p>You dont have any items in your cart</p>

                        <?php endif; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!--Offcanvas menu area end-->








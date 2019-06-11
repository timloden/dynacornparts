<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$review_count = $product->get_review_count();
//$review_count = 3;
?>

<div class="single_product_list">
	<div class="single_product">
	    <div class="product_name">
	        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
	    </div>
	    <div class="product_thumb">
	        <a class="primary_img" href="<?php get_permalink(); ?>"><?php echo $product->get_image(); ?></a>
	        <?php if ( $product->is_on_sale() ) : ?>
		        <div class="label_product">
		            <span class="label_sale">SALE</span>
		        </div>
	    	<?php endif; ?>
	        <div class="action_links">
	            <ul>
	                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
	              <!--   <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
	                <li class="compare"><a href="#" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
	            </ul>
	        </div>
	    </div>
	    <div class="product_content">
	        <div class="content_inner">
	            <?php if ( $review_count != 0 ) : ?>
	            <div class="product_ratings">
	                <ul>
	                	<?php for($i=1; $i<=$review_count; $i++) {
	                		echo ' <li><a href="#"><i class="ion-star"></i></a></li>';
	                	} ?>
	                </ul>
	            </div>
	        	<?php endif; ?>

	            <div class="product_footer d-flex align-items-center">
	                <div class="price_box">
	                    <span class="current_price"><?php echo $product->get_price(); ?> | <?php echo $product->get_sku(); ?></span>
	                    <span class="old_price"><?php $product->get_regular_price(); ?></span>
	                </div>
	                <div class="add_to_cart">
	                    <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

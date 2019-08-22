<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dynacorn_Parts
 */


$logo = get_field('store_logo', 'option');
$tagline = get_field('tag_line', 'option');
$address = get_field('address', 'option');
$phone = get_field('phone_number', 'option');
$store_name = get_field('store_name', 'option');
?>

<!--footer area start-->
<footer class="footer_widgets">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="<?php echo site_url(); ?>"><img src="<?php echo esc_url($logo['url']); ?>" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p><?php echo esc_attr($tagline); ?></p>
                            <p><span>Address</span> <?php echo esc_attr($address); ?></p>
                            <p><span>Need Help?</span>Call: <?php echo esc_attr($phone); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Gift Certificates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="widgets_container widget_menu">
                        <h3>Extras</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="wishlist.html">Wish List</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="faq.html">Specials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                   <div class="widgets_container">
                        <h3>Newsletter Subscribe</h3>
                        <p>We’ll never share your email address with a third-party.</p>
                        <div class="subscribe_form">
                            <form>
                                <input placeholder="Enter you email address here..." type="text">
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
           <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; <?php echo date("Y"); ?> <a href="<?php echo site_url(); ?>"><?php echo esc_attr($store_name); ?></a>.  All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payment.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->
<?php wp_footer(); ?>

</body>
</html>

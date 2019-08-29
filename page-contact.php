<?php
/**
 * Template name: Contact Page
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
$sub_title = get_field('description');
$email = get_field('email_address');
$phone = get_field('phone_number');
$form_id = get_field('contact_form_id');
?>

 <div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
               <div class="contact_message content">
                    <h3>Contact us</h3>
                    <?php if ($sub_title) : ?>
                        <p><?php echo esc_attr($sub_title); ?></p>
                    <?php endif; ?>
                    <ul>
                    <?php if ($email) : ?>
                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_attr($email); ?></a></li>
                        <?php endif; ?>
                    <?php if ($phone) : ?>
                        <li><i class="fa fa-phone"></i><?php echo esc_attr($phone); ?></li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
               <div class="contact_message form">
                    <h3>Send us a message</h3>
                    <?php
                        if ($form_id) {
                            gravity_form($form_id, false, false, false, '', true, 12); 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->

<?php

get_footer();
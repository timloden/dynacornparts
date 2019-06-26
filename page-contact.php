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
?>

 <div class="contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
               <div class="contact_message content">
                    <h3>contact us</h3>
                     <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                    <ul>
                        <li><i class="fa fa-phone"></i> <a href="#">info@dynacornparts.com</a></li>
                        <li><i class="fa fa-envelope-o"></i>(916) 770-5565</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
               <div class="contact_message form">
                    <h3>Send us a message</h3>
                    <?php gravity_form(1, false, false, false, '', true, 12); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->



<?php

get_footer();

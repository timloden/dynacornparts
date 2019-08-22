<?php
    $cta_title = $logo = get_field('cta_title', 'option');
    $cta_subtitle = $logo = get_field('cta_subtitle', 'option');
    $show_button = $logo = get_field('show_button', 'option');
    if ($show_button) {
        $button_text = get_field('button_text', 'option');
        $button_url = get_field('button_url', 'option');
    }
    
    $show_social_media_links = $logo = get_field('show_social_media_links', 'option');
    if ($show_social_media_links) {
        $facebook = get_field('facebook_url', 'option');
        $twitter = get_field('twitter_url', 'option');
        $youtube = get_field('youtube_url', 'option');
        $instagram = get_field('instagram_url', 'option');
    }
?>
<!--call to action start-->
<section class="call_to_action">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="call_action_inner">
                    <div class="call_text">
                        <h3><?php echo esc_attr($cta_title); ?></h3>
                        <p><?php echo esc_attr($cta_subtitle); ?></p>
                    </div>
                    <div class="discover_now">
                        <?php if ($show_button) : ?>
                        <a href="<?php echo esc_url($button_url); ?>"><?php echo esc_attr($button_text); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="link_follow">
                        <?php if ($show_social_media_links) : ?>
                        <ul>
                            <?php if($facebook) :?><li><a href="<?php echo esc_url($facebook); ?>"><i class="ion-social-facebook"></i></a></li><?php endif; ?> 
	                        <?php if($twitter) :?><li><a href="<?php echo esc_url($twitter); ?>"><i class="ion-social-twitter"></i></a></li><?php endif; ?> 
	                        <?php if($instagram) :?><li><a href="<?php echo esc_url($instagram); ?>"><i class="ion-social-instagram"></i></a></li><?php endif; ?> 
	                        <?php if($youtube) :?><li><a href="#<?php echo esc_url($youtube); ?>"><i class="ion-social-youtube"></i></a></li><?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--call to action end-->
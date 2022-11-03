<?php
    $privacy = get_sub_field('privacy');
	$form_item = get_sub_field('content');
?>

<div class="box-layout">
    <div class="content-hold">
        <!-- contact form -->
        <?php
            if($form_item) : 
            foreach($form_item as $p) : // variable must NOT be called $post (IMPORTANT) 
            $cf7_id= $p->ID;
                echo do_shortcode('[contact-form-7 id="'.$cf7_id.'" ]');
            endforeach;
            endif;
        ?>
        <!-- /contact form -->

        <?php if(get_sub_field('privacy')) : ?>
            <div class="privacy"><?php echo $privacy; ?></div>
        <?php endif; ?>
    </div>

    <aside class="aside-hold">
        <?php if(get_field('contact-address', 'option')): ?>
            <div class="item-sidebar">
                <p>
                    <strong><i class="far fa-map-marker-alt"></i> Address</strong><br>
                    <?php the_field('contact-address', 'option'); ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if(get_field('contact-phone', 'option')) : ?>
            <div class="item-sidebar">
                <p>
                    <strong><i class="far fa-mobile"></i> Phone</strong><br>
                    <a href="tel: <?php the_field('contact-phone', 'option'); ?>"><?php the_field('contact-phone', 'option'); ?></a>
                </p>
            </div>
        <?php endif; ?>

        <?php if(get_field('contact-office-times', 'option')): ?>
            <div class="item-sidebar">
                <p>
                    <strong><i class="far fa-clock"></i> Oppening Hours</strong><br>
                    <?php the_field('contact-office-times', 'option'); ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if(get_field('contact-email', 'option')): ?>
            <div class="item-sidebar">
                <p>
                    <strong><i class="far fa-at"></i> Email</strong><br>
                    <a href="mailto: <?php the_field('contact-email', 'option'); ?>"><?php the_field('contact-email', 'option'); ?></a>
                </p>
            </div>
        <?php endif; ?>
    </aside>
</div>
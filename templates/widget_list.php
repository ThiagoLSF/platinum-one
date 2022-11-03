<?php
    $feed_format = get_sub_field('feed_format');
    $field = get_sub_field_object('feed_format');

    get_template_part('templates/element_headline');
?>
    <div class="hold-feed <?php echo $feed_format; ?>">
        <?php
            if(have_rows('content')) :
            while(have_rows('content')) : the_row();

            $image = get_sub_field('image');
            $icon = get_sub_field('icon');

            $link = get_sub_field('link');

            if($image) :
            $size = 'medium';
            $thumb = $image['sizes'][$size];
            endif;

            if($link) :
            $url = $link['url'];
            $title = $link['title'];
            $target = $link['target'] ? $link['target'] : '_self';
            endif;
        ?>
            <!-- item -->
            <div class="card column small">
                <div class="hold-card">
                    <?php if(get_sub_field('extra_element') == 'show_image') : ?>
                        <div class="box-image image-square image-round" role="presentation">
                            <figure class="hold-image">
                                <?php if(get_sub_field('link')) : ?>
                                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                                <?php endif; ?>
                                    <img src="<?php echo esc_url($thumb); ?>">
                                <?php if(get_sub_field('link')) : ?>
                                    </a>
                                <?php endif; ?>
                            </figure>
                        </div>
                    <?php endif; ?>

                    <?php if(get_sub_field('extra_element') == 'show_icon') : ?>
                    <div class="box-icon icon-regular" role="presentation">
                        <div class="hold-icon">
                            <?php if(get_sub_field('link')) : ?>
                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                            <?php endif; ?>
                                <?php echo $icon; ?>
                            <?php if(get_sub_field('link')) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="box-text">
                        <?php
                            $headline_01 = get_sub_field('headline_01');
                            $headline_02 = get_sub_field('headline_02');

                            if(get_sub_field('headline_01') || get_sub_field('headline_02')) : ?>
                            <div class="box-headline">
                                <?php
                                    if(get_sub_field('headline_01')) :
                                        echo '<h4 class="h6"><strong>';
                                        echo $headline_01;
                                        echo '</strong></h4>';
                                    endif;

                                    if(get_sub_field('headline_02')) :
                                        echo '<p class="small">';
                                        echo $headline_02;
                                        echo '</p>';
                                    endif;
                                ?>
                            </div>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
            <!-- /item -->
        <?php
            endwhile;
            endif;
        ?>
    </div>

<?php get_template_part('templates/element_buttons'); ?>
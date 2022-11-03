<?php
    if(have_rows('header-widget')) :
    while(have_rows('header-widget')) :
    the_row();

    $headline01 = get_sub_field('headline-01');
    $headline02 = get_sub_field('headline-02');

    $height = get_sub_field('height');

    $button = get_sub_field('button');
    if($button) :
        $url = $button['url'];
        $title = $button['title'];
        $target = $button['target'] ? $button['target'] : '_self';
    endif;
?>
<section class="widget-slideshow default-inverse <?php echo $height; ?>">
    <div class="item background">
        <!-- text -->
        <div class="box-text">
            <div class="box-headline">
                <?php if(get_sub_field('headline-01')) : ?>
                    <h1 class="h1"><?php echo $headline01; ?></h1>
                <?php endif; ?>

                <?php if(get_sub_field('headline-02')) : ?>
                    <h2 class="h3"><?php echo $headline02; ?></h2>
                <?php endif; ?>
            </div>

            <?php if(get_sub_field('button')) : ?>
                <div class="box-buttons">
                    <a href="<?php echo esc_url($url); ?>" class="button round large" target="<?php echo esc_attr($target); ?>"><?php echo $title; ?></a>
                </div>
            <?php endif; ?>
        </div>
        <!-- /text -->
        
        <?php
            if(get_sub_field('background') == 'image') :
        ?>
            <figure class="box-image rellax" role="presentation" data-rellax-speed="-3.5">
                <?php 
                    if(have_rows('background-image')) :
                    while(have_rows('background-image')) :
                    the_row(); 

                    $desktop = get_sub_field('desktop-image');
                    $mobile = get_sub_field('mobile-image');
                ?>
                <img src="<?php echo esc_url($desktop); ?>" class="landscape">
                <img src="<?php echo esc_url($mobile); ?>" class="portrait">
                <?php
                    endwhile;
                    endif;
                ?>
            </figure>
        <?php
            endif;
            if(get_sub_field('background') == 'video') :
        ?>
            <figure class="box-video" role="presentation">
                <?php if(have_rows('background-video')) : while(have_rows('background-video')) : the_row();
                    $video = get_sub_field('mp4');
                    $poster = get_sub_field('poster');
                ?>
                <video autoplay muted loop poster="<?php echo $poster;?>">
                    <source src="<?php echo $video; ?>" type="video/mp4">
                </video>
                <?php
                    endwhile;
                    endif;
                ?>
            </figure>
        <?php endif; ?>
    </div>
</section>
<?php
    endwhile;
    endif;
?>
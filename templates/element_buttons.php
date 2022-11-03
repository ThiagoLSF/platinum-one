<?php if(get_sub_field('button')) : ?>
<div class="box-buttons">
    <?php if(have_rows('button')): while(have_rows('button')) : the_row();
        $button = get_sub_field('link'); if($button) :
            $url = $button['url'];
            $title = $button['title'];
            $target = $button['target'] ? $button['target'] : '_self';
        endif;

        //$button_class = get_sub_field('class');
        $button_size = get_sub_field('size');
        //$button_icon = get_sub_field('icon');
    ?>

    <a href="<?php echo esc_url($url); ?>" class="button round default <?php echo $button_size; ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_html($title); ?></a>
    <?php endwhile; endif; ?>
</div>
<?php endif; ?>
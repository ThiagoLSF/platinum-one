<?php
    get_template_part('templates/element_headline');

    $shortcode = get_sub_field('shortcode');
?>

<?php echo $shortcode; ?>

<?php get_template_part('templates/element_buttons'); ?>
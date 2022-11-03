<?php
    $color = (get_sub_field('color') || get_field('color'));
    $background = (get_sub_field('background') || get_field('background'));

    if((get_sub_field('custom_color') == 1) || (get_field('custom_color') == 1)) :
?>
<style>
<?php echo '.widget-'.$field['ID'].''; echo get_row_index(); ?> .hold {
    color: <?php echo $color; ?> !important;
    background: <?php echo $background; ?> !important;
}

<?php echo '.widget-'.$field['ID'].''; echo get_row_index(); ?> a {
    color: <?php echo $color; ?> !important;
}

<?php echo '.widget-'.$field['ID'].''; echo get_row_index(); ?> .button {
    color: <?php echo $background; ?> !important;
    background: <?php echo $color; ?> !important;
}

<?php echo '.widget-'.$field['ID'].''; echo get_row_index(); ?> .button.line {
    color: <?php echo $color; ?> !important;
    border-color: <?php echo $color; ?> !important;
    background-color: transparent !important;
}
</style>
<?php endif; ?>
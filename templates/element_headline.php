<?php
$headline_01 = get_sub_field('headline_01');
$headline_02 = get_sub_field('headline_02');

if(get_sub_field('headline_01') || get_sub_field('headline_02')) : ?>
<div class="box-headline">
    <?php
        if(get_sub_field('headline_01')) :
            echo '<h2 class="h2">';
            echo $headline_01;
            echo '</h3>';
        endif;
    
        if(get_sub_field('headline_02')) :
            echo '<h3 class="h4">';
            echo $headline_02;
            echo '</h3>';
        endif;
    ?>
</div>
<?php endif; ?>
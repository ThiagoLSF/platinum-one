<?php
    // widget class name
    function theme_widget_class_name() {
        if (get_row_layout() == 'article') : echo 'widget-article'; endif;
        if (get_row_layout() == 'list') : echo 'widget-feed'; endif;
        if (get_row_layout() == 'content_feed') : echo 'widget-feed'; endif;
        if (get_row_layout() == 'gallery') : echo 'widget-feed'; endif;
        if (get_row_layout() == 'shortcode') : echo 'widget-shortcode'; endif;
        if (get_row_layout() == 'form') : echo 'widget-form'; endif;
    };

    if(have_rows('content_widgets')) :
    while (have_rows('content_widgets')) : the_row();

    // template
    if(get_row_layout() == 'template') :
        
        $template = get_sub_field('template_item');
        if($template) :
        foreach($template as $post) : setup_postdata($post);
            //if(have_rows('content_widgets')) :
            while (have_rows('content_widgets')) : the_row(); 
                get_template_part('templates/template_widgets');
            endwhile;
            //endif;
        endforeach;
        wp_reset_postdata();
        endif;
    // template

    else :
        get_template_part('templates/template_widgets');
    endif;

    endwhile;
    endif;
?>
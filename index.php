<?php get_header(); ?> 
    <div style="overflow: hidden">
		<div class="widget-intro desktop video-desktop rellax" data-rellax-speed="-3">
            <div class="menu-holder rellax" data-rellax-speed="3">
                <?php
                    $content_menu = get_field('content-menu', 'option');
                
                    if($content_menu) :
                    foreach($content_menu as $post) :
                    setup_postdata($post);
                ?>
                    <a href="<?php the_permalink(); ?>" class="item">
                        <span class="title">
                            <?php the_title(); ?>
                        </span>
                        
						<div class="visit_button">
							<i class="fas fa-plus"></i>
						</div>
                    </a>
                <?php 
                    endforeach;
                    wp_reset_postdata();
                    endif;
                ?> 
            </div>
            
			<?php
                if(have_rows('intro-video', 'option')) :
                while(have_rows('intro-video', 'option')) :
                the_row();
                
                $mp4 = get_sub_field('mp4');
                $poster = get_sub_field('poster');
            ?>
                <div class="hold-video">
                    <video muted loop autoplay>
                        <source src="<?php echo $mp4; ?>" type="video/mp4">
                    </video>
                </div>
            <?php
                endwhile;
                endif;
            ?>
		</div>
    </div>
<?php get_footer(); ?>
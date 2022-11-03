<div class="item card-posts-secondary">
	<div class="box-hold">
		<div class="box-image">
			<a href="<?php the_permalink() ?>">
                <figure role="presentation">
                <?php
                    if (has_post_thumbnail()) { ?>
                        <img src="<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'thumbnail', false, ''); echo $src[0]; ?>" alt="">
                    <?php }

                    else {
                        echo '<img src="'.get_bloginfo('stylesheet_directory').'/assets/images/placeholder-logo.png" alt="">';
                    }
                ?>
                </figure>
            </a> 
		</div>

		<div class="box-text">
			<div class="item title">
				<?php if(have_rows('page_header')) : while(have_rows('page_header')) : the_row();
                    $headline = get_sub_field('title');
                    $introduction = get_sub_field('introduction');
                ?>
                    <h2 class="h3"><a href="<?php the_permalink() ?>"><?php echo $headline; ?></a></h2>
                    <?php if(get_sub_field('introduction')) : ?>
                        <h5 class="h6"><a href="<?php the_permalink() ?>"><?php echo $introduction; ?></a></h5>
                    <?php endif; ?>
                <?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</div>
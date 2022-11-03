		<!-- footer -->
		<footer class="footer">
			<div class="footer-hold">
				<!-- social menu -->
				<nav class="footer-item">
                    <ul>
                        <?php
                            if(have_rows('social-media', 'option')) :
                            while(have_rows('social-media', 'option')) : the_row();
                            
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                            
                            if($link) :
                                $url = $link['url'];
                                $title = $link['title'];
                                $target = $link['target'] ? $link['target'] : '_blank';
                            endif;
                        ?>
                            <li>
                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                                    <?php echo $icon; ?> <?php echo esc_html($title); ?>
                                </a>
                            </li>
                        <?php
                            endwhile;
                            endif;
                        ?>
                    </ul>
				</nav>
				<!-- / social menu -->
			</div>
			
			<!-- institutional menu -->
			<nav class="institutional-menu">
                <ul role="presentation">
                    <li class="copy"><span>&copy;<?php echo date("Y"); echo ' '; echo get_bloginfo('name');?></span></li>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'menu_institutional',
                        'container_id' => false,
                        'container' => '',
                        'container_class' => '',
                        'items_wrap' => '%3$s',
                        'depth' => '1',
                        'walker' => new theme_custom_menu_institutional()
                    )); ?>
                    <li class="credit"><a href="https://www.circulateonline.com/" target="_blank">Created by Circulate</a></li>
                </ul>
			</nav>
			<!-- /intitutional menu -->
		</footer>
		<!-- /footer -->
	</div>

	<script src="<?php bloginfo('template_directory'); ?>/assets/scripts/script.page-footer.js"></script>

	<?php
        wp_footer();
    ?>
</body>
</html>
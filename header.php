<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    
    <?php /*
	<title><?php if (is_front_page()) {echo bloginfo('name'); echo ' | '; bloginfo('description');}
	else {
		// content home & clean
		if (is_singular('content') && is_page_template('single-content_home.php')) {
			the_title(''); echo ' | ';
		}
		
		// singular content
		elseif (is_singular('content') && is_page_template('single-content_clean.php')) {
			while (have_posts()) : the_post(); if(have_rows('header-widget')) : while(have_rows('header-widget')) : the_row(); $headline01 = get_sub_field('headline-01'); echo $headline01; endwhile; endif; endwhile;
			echo ' | ';
		}
		
		// singular content
		elseif (is_singular('content')) {
			the_title(''); echo ' | ';
			echo ''.content_title().' | ';
		}
		
		// services
		elseif (is_post_type_archive('services')) {
			echo 'Services | ';
			$content_name = get_field('select-vertical'); if($content_name) : $post = $content_name; setup_postdata($post); echo ''.the_title().' |'; wp_reset_postdata(); endif;
		}
		
		elseif (is_singular('services')) {
			//echo ''.the_title('').' | Services | ';
			while (have_posts()) : the_post(); if(have_rows('header-widget')) : while(have_rows('header-widget')) : the_row(); $headline01 = get_sub_field('headline-01'); echo $headline01; endwhile; endif; endwhile;
			echo ' | Services | ';
			$content_name = get_field('select-vertical'); if($content_name) : $post = $content_name; setup_postdata($post); echo ''.the_title().' | '; wp_reset_postdata(); endif;					 
		}
		
		// projects
		elseif (is_post_type_archive('projects')) {
			echo 'Projects | ';
			$content_name = get_field('select-vertical'); if($content_name) : $post = $content_name; setup_postdata($post); echo ''.the_title().' |'; wp_reset_postdata(); endif;
		}
		
		elseif (is_singular('projects')) {
			//echo ''.the_title('').' | Projects | ';
			while (have_posts()) : the_post(); if(have_rows('header-widget')) : while(have_rows('header-widget')) : the_row(); $headline01 = get_sub_field('headline-01'); echo $headline01; endwhile; endif; endwhile;
			echo ' | Projects | ';
			$content_name = get_field('select-vertical'); if($content_name) : $post = $content_name; setup_postdata($post); echo ''.the_title().' | '; wp_reset_postdata(); endif;					 
		}
		
		elseif (is_404()) {echo '404 - Page Not Found | ';}
		echo bloginfo('name');
	} ?></title>
	*/ ?>
    
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/style/style.css?v=9">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/assets/scripts/script.page-header.js"></script>
	<script src="https://kit.fontawesome.com/52680288f1.js" crossorigin="anonymous"></script>

	<!-- icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/assets/icons/avicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/assets/icons/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/assets/icons/safari-pinned-tab.svg" color="#ed2426">
	<!-- /icons -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#ed2426">
	
	<?php the_field('custom-script-header', 'option'); ?>
	
	<?php wp_head(); ?>
    
    <style>
        /* background */
		.header .logo .content:after,
		.hold-menu {
			background-color: #dd3333;
		}

		/* background-secondary */
		[class^="widget-"].clean,
		[class^="widget-"].border,
		[class^="widget-"].inverse {
			background-color: #dd9933;
		}

		/* border */
		[class^="widget-"].border {
			border-color: #dd3333;
		}

		/* text decoration color */
		[class^="widget-listing"] ul li a:hover {
			text-decoration-color: #dd3333;
		}

		/* form */
		.form-button input {
			background: #dd3333 !important;
		}

		div.wpcf7-mail-sent-ok,
		div.wpcf7-mail-sent-ng,
		div.wpcf7-spam-blocked,
		div.wpcf7-validation-errors {
			background: #dd3333;
		}
		
		.widget-contact .info-hold i {
			color: #dd3333;
		}
    </style>
</head>
	
<body>	
	<div id="content">
		<!-- header -->
		<header class="header">
			<div class="hold">
				<!-- logo -->
				<div class="logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <svg id="icon" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103.96 106.79">
                            <defs>
                                <style>
                                    .bg{fill:#e62c2a;}
                                    .white{fill:#fff;}
                                </style>
                            </defs>
                            <rect id="Red" class="bg" width="103.96" height="106.79"/>
                            <g id="Dots">
                                <path class="white" d="M77.08,79.58a11.25,11.25,0,1,1-8.26-13.13,11,11,0,0,1,8.26,13.13" transform="translate(0 0)"/><path class="white" d="M81.34,53.11c-1.46,5.75-7.63,9.15-13.79,7.59s-10-7.49-8.51-13.24,7.63-9.16,13.79-7.59,10,7.49,8.51,13.24" transform="translate(0 0)"/><path class="white" d="M79.57,32.38c-5.86,3.51-13,2.44-15.88-2.41S63.17,18.34,69,14.82s13-2.44,15.88,2.41.52,11.63-5.34,15.15" transform="translate(0 0)"/><path class="white" d="M52.67,72.53A9.21,9.21,0,1,1,34.82,68h0A9.21,9.21,0,0,1,46,61.34h0a9.21,9.21,0,0,1,6.66,11.19" transform="translate(0 0)"/><path class="white" d="M58.08,28.27c-1.3,5.14-6,8.38-10.47,7.24s-7-6.22-5.75-11.35,6-8.37,10.47-7.24,7,6.22,5.75,11.35" transform="translate(0 0)"/><path class="white" d="M32.89,68.67C31.79,73,28.15,75.84,24.75,75S19.5,69.9,20.6,65.55s4.75-7.17,8.14-6.31,5.26,5.08,4.15,9.43" transform="translate(0 0)"/><path class="white" d="M29.68,87.53c-1.1,4.35-4.74,7.18-8.14,6.32s-5.25-5.09-4.15-9.44,4.75-7.17,8.14-6.31,5.26,5.08,4.15,9.43" transform="translate(0 0)"/><path class="white" d="M36.15,48.7C35.05,53.05,31.4,55.87,28,55s-5.26-5.08-4.16-9.43S28.6,38.41,32,39.27s5.25,5.08,4.15,9.43" transform="translate(0 0)"/><path class="white" d="M38.65,29.8C37.54,34.15,33.9,37,30.5,36.11S25.25,31,26.35,26.68s4.75-7.17,8.14-6.31,5.26,5.08,4.16,9.43" transform="translate(0 0)"/>
                            </g>
                        </svg>

                        <svg id="lettering" class="lettering" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 585.24 33.46">
                            <defs>
                                <style>
                                    .white{fill:#fff;}
                                </style>
                            </defs>
                            <path class="white" d="M151.59,55.43H131.33V70.11h-4V36.69h24.26l4,3.83V51.37Zm.08-13.34-1.59-1.48H131.33V51.46H150l1.69-1.66Zm53.81,28V66.16h-21V36.69H180.6V70.11Zm47.79,0-5.36-11.43H231.8l-5.44,11.43H222l15.93-33.42h4l15.84,33.42ZM239.88,41.77l-6.11,12.94h12.31Zm64.83-1.11v-4H276.38v4h12.13V70.11h3.93V40.66Zm24.63,29.45h3.92V36.69h-3.92Zm62.1,0V36.69h-3.92V63.77L365.65,36.69h-3.83V70.11h3.83V43.16l21.91,27ZM448.82,66V36.69h-3.88V64.35l-1.69,1.79H425.4l-1.7-1.57V36.69h-3.93V66.18l3.93,3.93H445Zm61.57,4.15V36.69h-3.92L493.84,59.31l-12.5-22.62h-4V70.11h3.88V44.76l12.45,22.58L506.39,44.9V70.11Zm85.26,0H572.27L568.21,66V40.75l3.89-4.06h23.51l3.93,4.06v25.3Zm0-27.76L594,40.75H573.66l-1.58,1.69V64.35l1.69,1.79h20.17l1.74-1.74Zm59.92,27.76V36.69h-3.93V63.77L629.78,36.69h-3.84V70.11h3.84V43.16l21.91,27Zm57,0V66.05H688.08V54.8h12.31v-4H688.08V40.53h23.55V36.65H684.08V70.07Z" transform="translate(-127.33 -36.65)"/>
                        </svg>
                    </a>
                    <?php /*
                        if (is_singular('content') && is_page_template('single-content_clean.php')) :
                        elseif (is_page_template('single-content_home.php')) : // home
                    ?>
                            <a href="<?php echo get_home_url(); ?>" class="link-home"></a>
                    <?php
                        elseif (is_singular('content')) : // industries
                    ?>
                        <a href="<?php content_permalink()?>" class="link-home"></a>
                    <?php
                        else :
                        endif; */
                    ?>
				</div>
				<!-- /logo -->
			</div>
		</header>
		<!-- /header -->
		
		<?php if(!is_home()):?>
            <div class="hamburguer-menu">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times hide"></i>
            </div>
		<?php endif; ?>
		
        <div class="hold-menu">
            <div class="box-menu">
                <div class="close-menu">
                    <i class="fas fa-times"></i>
                </div>
                
                <?php render_accordion_menu('Verticals'); ?> 
            </div>
        </div>
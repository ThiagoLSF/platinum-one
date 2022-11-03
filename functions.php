<?php

require 'assets/functions/render_accordion_menu.php';

// Remove jQuery
add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', '', false, null);
	wp_enqueue_script('jquery');
}

// Remove Embed
/*
add_action('wp_footer', 'my_deregister_scripts');
function my_deregister_scripts(){
	wp_dequeue_script('wp-embed');
}
*/

// Remove Block Library and other CSS
add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles() {
    wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wpaas-admin-bar'); // GoDaddy Admin Bar
}

// Admin Bar
add_filter('show_admin_bar', 'remove_admin_bar');
function remove_admin_bar() {
	return false;
}

add_action('wp_print_styles', 'wps_deregister_styles', 100);

// Post Thumbnails
add_theme_support('post-thumbnails');

update_option('thumbnail_size_w', 600);
update_option('thumbnail_size_h', 600);
update_option('thumbnail_crop', 0);

update_option('medium_size_w', 1000);
update_option('medium_size_h', 1000);
update_option('medium_crop', 0);

update_option('large_size_w', 2000);
update_option('large_size_h', 2000);
update_option('large_crop', 0);

// Create custom panel
if (function_exists('acf_add_options_page')) {	
	acf_add_options_page (array(
		'page_title' => 'Site Management',
		'menu_title' => 'Site Management',
		'menu_slug' => 'site-management',
		'capability' => 'edit_posts',
		'redirect' => false,
		'icon_url' => 'dashicons-info',
		'position' => 2
	));
}

// Remove elements and functions
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');

add_filter('user_can_richedit', '__return_false', 50);
remove_action('welcome_panel', 'wp_welcome_panel');

//add_filter('acf/settings/show_admin', '__return_false'); // Hide ACF from menu

add_action('admin_menu', 'remove_admin_menus');
function remove_admin_menus() {
	//remove_menu_page('tools.php');
	//remove_submenu_page('themes.php','customize.php?return=' . urlencode(wp_unslash ($_SERVER['REQUEST_URI'])));
	//remove_submenu_page('options-general.php', 'options-writing.php');
	//remove_submenu_page('options-general.php', 'options-media.php');
	//remove_submenu_page('options-general.php', 'options-permalink.php');
	//remove_submenu_page('options-general.php','options-discussion.php');
}

// Disable Feed
function itsme_disable_feed() {
	wp_die( __('No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!'));
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

// Disable Smiles
add_filter('option_use_smilies','customise_remove_smileys',99,1);
function customise_remove_smileys($bool) {return false;}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_filter('emoji_svg_url', '__return_false');

// Disable Comments
add_action('admin_init', 'df_disable_comments_post_types_support');
function df_disable_comments_post_types_support() {
	$post_types = get_post_types(); foreach ($post_types as $post_type) {if(post_type_supports($post_type, 'comments')) {
	remove_post_type_support($post_type, 'comments'); remove_post_type_support($post_type, 'trackbacks');}}
}

add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
function df_disable_comments_status() {return false;}

add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
function df_disable_comments_hide_existing_comments($comments) {$comments = array(); return $comments;}

add_action('admin_menu', 'df_disable_comments_admin_menu');
function df_disable_comments_admin_menu() {remove_menu_page('edit-comments.php');}

add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
function df_disable_comments_admin_menu_redirect() {global $pagenow; if ($pagenow === 'edit-comments.php') {wp_redirect(admin_url()); exit;}}

add_action('admin_init', 'df_disable_comments_dashboard');
function df_disable_comments_dashboard() {remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');}

add_action('init', 'df_disable_comments_admin_bar');
function df_disable_comments_admin_bar() {if (is_admin_bar_showing()) {remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);}}

// Disable Tags
add_action('init', 'ryanbenhase_unregister_tags');
function ryanbenhase_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}

// Disable Posts and Pages
add_action('admin_menu', 'remove_default_post_type');
function remove_default_post_type() {
    remove_menu_page('edit.php');
	//remove_menu_page('edit.php?post_type=page');
}

add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);
function remove_default_post_type_menu_bar($wp_admin_bar) {
    $wp_admin_bar->remove_node('new-post');
	//$wp_admin_bar->remove_node('new-page');
}

add_action('wp_dashboard_setup', 'remove_draft_widget', 999);
function remove_draft_widget(){
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}

// Disable Search
add_action('parse_query', 'wpb_filter_query');
add_filter('get_search_form', create_function('$a', "return null;"));
add_action('widgets_init', 'remove_search_widget');

function wpb_filter_query($query, $error = true) {
	if (is_search()) {
		$query->is_search = false;
		$query->query_vars[s] = false;
		$query->query[s] = false;
		if ($error == true)
		$query->is_404 = true;
	}
}

function remove_search_widget() {
    unregister_widget('WP_Widget_Search');
}

// Contact Form
/*
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return get_bloginfo('stylesheet_directory') . '/assets/ajax-loader.gif';
}
*/

// Yoast SEO
add_filter('wpseo_metabox_prio', 'yoasttobottom');
function yoasttobottom() { // Move Yoast Meta Box to bottom
	return 'low';
}

// Post Type
/*
add_action('init', 'create_content_post', 0);
function create_content_post() {
	register_post_type(
		'content', array(
			'labels' => array(
				'name' => __('Content'),
				'singular_name' => __('Content')
			),
			'menu_position' => 3,
			'menu_icon' => 'dashicons-portfolio',
			
			'public' => true,
			'public_queryable' => true,
			
			'query_var' => true,
			'show_ui' => true,
			
			'capability_type' => 'page',
			'has_archive' => true,
			'hierarchical' => true,
			'can_export' => true,
			'rewrite' => array('slug' => '/', 'with_front' => false),
			'supports' => array ('title', 'thumbnail', 'revisions', 'page-attributes'),
		)
	);
}
*/

/*
// Fix URL for Industry CPT
function sh_remove_cpt_slug($post_link, $post, $leavename) {
	if (in_array( $post->post_type, array('industry'))
        || 'publish' == $post->post_status)
        $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);
    return $post_link;
}
add_filter('post_type_link', 'sh_remove_cpt_slug', 10, 3);

function sh_parse_request_tricksy($query) {
	if (! $query->is_main_query()) {
        return;
    }
	
	if (2 != count($query->query)
        || ! isset($query->query['page']))
		return;
	
    if (! empty($query->query['name'])) {
        $query->set('post_type', array('industry'));
    }
}
add_action('pre_get_posts', 'sh_parse_request_tricksy');
*/


// Content Title
function content_title() { // content title in the header
	global $post;
	$parent = get_ancestors($post->ID, 'page');
	if($parent) {
		echo get_the_title($parent[0]);
	}
	else {
		return the_title();
	}
}

// Content Permalink
function content_permalink() { // content title in the header
	global $post;
	$parent = get_ancestors($post->ID, 'page');
	if($parent) {
		echo get_the_permalink($parent[0]);
	}
	else {
		return the_permalink();
	}
}


// Filter Parent Post Object
function my_post_object_query($args, $field, $post_id) {
	$args['post_parent'] = 0;
    return $args;
}

add_filter('acf/fields/post_object/query/name=select-vertical', 'my_post_object_query', 10, 3);
//add_filter('acf/fields/post_object/query/name=industry-menu', 'my_post_object_query', 10, 3);

// Shortcodes
add_shortcode('button', 'button');
function button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
		"call" => '',
		"target" => '',
	), $atts));   
	return '<div class="button-hold"><a href="'.$url.'" class="button" target="'.$target.'">'.$call.'</a></div>';
}

/* Post Area */
add_action('admin_print_footer_scripts','eg_quicktags'); function eg_quicktags() {?>
	<script type="text/javascript" charset="utf-8">
		buttonA = edButtons.length; edButtons[edButtons.length] = new edButton('headline','h3','<h3 class="h3">','</h3>');
		//buttonB = edButtons.length; edButtons[edButtons.length] = new edButton('header03','h3','<h3>','</h3>');
		//buttonD = edButtons.length; edButtons[edButtons.length] = new edButton('ed_quote','blockquote','<blockquote>','</blockquote>');
		buttonE = edButtons.length; edButtons[edButtons.length] = new edButton('ed_button','button','[button url="" call="" target="_self"]','');
	</script>
<?php }

add_filter('quicktags_settings', 'editarhtml');
function editarhtml($meusbotoes) {
	$meusbotoes['buttons'] = 'strong,em,link';
	return $meusbotoes;
}

/*
// Excerpt
remove_filter('the_excerpt', 'wpautop');
remove_filter('term_description', 'wpautop');

add_filter('excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length($length) {return 18;}

add_filter('excerpt_more', 'custom_excerpt_more');
function custom_excerpt_more($more) {return ' (...)';}
*/

/*
// Video Embed
add_filter('embed_oembed_html', 'wpse_embed_oembed_html', 99, 4);
function wpse_embed_oembed_html($cache, $url, $attr, $post_ID) {
    $classes = array();

    $classes_all = array(
        'embed',
    );

    if (false !== strpos($url, 'vimeo.com')) {
        $classes[] = 'post-video';
    }

    if (false !== strpos( $url, 'youtube.com')) {
        $classes[] = 'post-video';
    }
	
	if (false !== strpos($url, 'slideshare.net')) {
        $classes[] = 'post-video';
    }

    $classes = array_merge($classes, $classes_all);

    return '<div class="'.esc_attr(implode($classes, ' ')).'">'.$cache.'</div>';
}
*/

//** -- SVG -- ** //

add_filter('upload_mimes', 'theme_files_format_upload');

function theme_files_format_upload($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    
    $file_types = array_merge($file_types, $new_filetypes );
    
    return $file_types;
}

	
//** -- SVG -- ** //

//** -- MENU -- ** //

add_action('init', 'theme_register_menus');
function theme_register_menus() {
	register_nav_menus(array(
		'main_menu_header'	=> __('Menu Header'),
        'menu_institutional' => __('Institutional')
	));
}

// Custom Menu - Institutional
class theme_custom_menu_institutional extends Walker_Nav_Menu {
	function filter_builtin_classes($var) {
	    return (FALSE === strpos($var, 'item')) ? $var : '';
	}
	
	// menu -->
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$indent = '';
		
		$unfiltered_classes = empty($item->classes) ? array() : (array) $item->classes;
		
		$classes = array_filter($unfiltered_classes, array($this, 'filter_builtin_classes'));
		if (preg_grep("/^current/", $unfiltered_classes)) {
			$classes[] = 'active';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="'. esc_attr($class_names) .'"' : '';
		
		$output .= $indent . '<li' . $value . $class_names .'>';
		
		// link -->
		$atts = array();
		$atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
		$atts['target'] = ! empty($item->target)     ? $item->target     : '';
		$atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
		$atts['href']   = ! empty($item->url)        ? $item->url        : '';
		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (! empty($value)) {
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		// <-- link
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>";
    }
	// <-- menu
}

?>
<?php
//
//  Get a wordpress menu name and render it as an accordion menu
//  Uses prewritten CSS classes
//  

function render_accordion_menu($menu_name) {

// get the wordpress menu items
$menu_ref = wp_get_nav_menu_object( $menu_name );
$wordpress_menu_object = wp_get_nav_menu_items( $menu_ref->term_id, array( 'order' => 'DESC' ) );

// create menu arrays as menus with submenus
$menu = array();

foreach ( $wordpress_menu_object as $item ) {
    // if item has no parent, then it is a main option
    if ( empty($item->menu_item_parent) ) {
        $menu[$item->ID] = array();
        $menu[$item->ID]['title']   = $item->title;
        $menu[$item->ID]['url']     = $item->url;
        $menu[$item->ID]['submenu'] = array();

        $submenu = array();
        foreach( $wordpress_menu_object as $element ) {
            if ( $element->menu_item_parent ) {
                $submenu[$element->ID] = array();
                $submenu[$element->ID]['title'] = $element->title;
                $submenu[$element->ID]['url']   = $element->url;

                $menu[$element->menu_item_parent]['submenu'][$element->ID] = $submenu[$element->ID];
            }
        }
    }    
}
// render items

$i = 0;
$output = "";
$output .= "<nav class='menu'>";
$output .= "    <ul class='main-menu'>";
foreach ($menu as $menuitem) {
    $output .= "     <li class='main-menu__item'>";
    $output .= "        <a href='".$menuitem['url']."' class='main-menu__item__link'>". $menuitem['title'] ."</a>";
/*    $output .= "        <button class='open-close' title='Open menu options'><i class='far fa-plus'></i></button>";
*/    if ($i == 0) {
        $output .= "        <ul class='main-menu__item__submenu' open='true'>";
    } else {
        $output .= "        <ul class='main-menu__item__submenu'>";
    }    
    foreach ( $menuitem['submenu'] as $subitem ){
        $output .= "            <li class='submenu__item'><a href='". $subitem['url'] ."'>". $subitem['title'] ."</a></li>";
    }
    $output .= "    </ul>";
    $i++;
}
$output .="         </ul>";
$output .="</nav>";

echo $output;

}
?>
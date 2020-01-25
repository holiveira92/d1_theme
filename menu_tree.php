<?php
/**
 * Modification of "Build a tree from a flat array in PHP"
 *
 * Authors: @DSkinner, @ImmortalFirefly and @SteveEdson
 *
 * @link https://stackoverflow.com/a/28429487/2078474
 */
function buildTree( array &$elements, $parentId = 0){
    $branch = array();
    foreach ( $elements as &$element ){
        if ( $element->menu_item_parent == $parentId ){
            $children = buildTree( $elements, $element->ID );
            if ( $children )
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset( $element );
        }
    }
    return $branch;
}

/**
 * Transform a navigational menu to it's tree structure
 *
 * @uses  buildTree()
 * @uses  wp_get_nav_menu_items()
 *
 * @param  String     $menud_id 
 * @return Array|null $tree 
 */
function wpse_nav_menu_2_tree( $menu_id ){
    $items = wp_get_nav_menu_items( $menu_id );
    return  $items ? buildTree( $items, 0 ) : array();
}

function get_d1_menu_tree($menu_name='menu_principal'){
    $tree = wpse_nav_menu_2_tree($menu_name);  // <-- Modify this to your needs!
    return $tree;
}
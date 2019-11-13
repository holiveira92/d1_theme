<?php

add_action( 'after_setup_theme', 'register_my_menu' );

function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'd1_theme' ) );
}

function insert_degrade($str,$tipo=0){
    switch($tipo){
        case 0 :
            $str = str_replace("[degrade]","<span class='text-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 1 :
            $str = str_replace("[degrade]","<span class='text-span-4'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 2 :
            $str = str_replace("[degrade]","<span class='text-span-21 type-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 3 :
            $str = str_replace("[degrade]","<span class='text-span-22 type-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 4 :
            $str = str_replace("[degrade]","<span class='text-span-16 type-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 5 :
            $str = str_replace("[degrade]","<span class='text-span-17'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 6 :
            $str = str_replace("[degrade]","<span class='text-span-16'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 7 :
            $str = str_replace("[degrade]","<span class='body-text-link-inline'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 8 :
            $str = str_replace("[degrade]","<span class='text-span-11 mobi type-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        case 9 :
            $str = str_replace("[degrade]","<span class='text-span-14'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
            break;
        default:
            $str = str_replace("[degrade]","<span class='text-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
    }
    return $str;
}

function get_menus_data($menu_itens){
    $menu_pai = array();
    foreach($menu_itens as $key=>$menu){
        if($menu->menu_item_parent == 0){
            $menu_pai[] = array(
                'id' => $menu->ID,
                'title' => $menu->title,
                'subitems' => array()
            );
        }
    }
    foreach($menu_pai as $key=>&$menu){
        foreach($menu_itens as $key=>$item){
            if($item->menu_item_parent == $menu['id']){
                $menu['subitems'][] = array(
                    'id' => $item->ID,
                    'title' => $item->title,
                    'url' => $item->url,
            );}
        }
    }

    return $menu_pai ;
}
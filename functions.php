<?php
add_action('template_redirect', 'default_page');
function default_page(){
    $url_array = explode("/","https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $last_index = count($url_array) - 1;
    $file = $url_array[$last_index];
    wp_redirect(get_template_directory_uri() . "/$file");
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
        default:
            $str = str_replace("[degrade]","<span class='text-gradient'>",$str);
            $str = str_replace("[/degrade]","</span>",$str);
    }
    return $str;
}
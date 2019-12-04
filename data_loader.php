<?php
function dirname_oldphp($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}
class Data_Loader {
    private $all_data;
    private $data;
	public function __construct(){
        require(trim(dirname_oldphp(__FILE__,4)) . "wp-load.php");
        wp_load_alloptions();
        require_once dirname_oldphp(__FILE__,3).'plugins/d1_plugin/includes/base/d1_view_parser.php';
        $d1_view_parser = new D1_View_Parser();
        $img_default = get_template_directory_uri() . "/images/img_default.jpg";
        $this->all_data = $d1_view_parser->get_data();
    }

    public function get($page='inicio'){
        $data = array();
        switch($page){
            case 'inicio':
                //code
                break;
            case 'd1_midia':
                $data = $this->get_d1_midia_data();
                break;
            default :
                break;
        }

        return $data;
    }

    private function get_inicio_data(){

    }
    
    private function get_d1_midia_data(){
        global $wpdb;
        $this->data['data_midia']                   = $this->all_data["d1_plugin_d1_midia"];
        $this->data['data_midia']['noticias']       = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_midia ")),true);
        $this->data['data_midia']['destaque']       = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_midia WHERE id=" . $this->data['data_midia']['midia_secao1_destaque_select'])),true);
        $this->data['data_midia']['destaque']       = !empty($this->data['data_midia']['destaque'][0]) ? $this->data['data_midia']['destaque'][0] : array();
        return $this->data;
    }

}
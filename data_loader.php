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

    public function get($page='inicio',$id=false){
        $data = array();
        switch($page){
            case 'inicio':
                //code
                break;
            case 'd1_midia':
                $data = $this->get_d1_midia_data();
                break;
            case 'modulos':
                $data = $this->get_modulos_data($id);
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
        $this->data['data_midia']['cases']          = array();
        for($i=1;$i<=3;$i++){
            $id_case                = $this->data['data_midia']["midia_secao2_case$i"];
            $case                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = $id_case")),true);
            $case                   = !empty($case[0]) ? $case[0] : array();
            $id_categoria_case      = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array();
            $id_categoria_case      = !empty($id_categoria_case['categoria_case']) ? $id_categoria_case['categoria_case'] : 0;
            $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias where id = $id_categoria_case")),true);
            $case['categoria']      = !empty($categoria[0]) ? $categoria[0] : array();
            $this->data['data_midia']['cases'][] = $case;
        }
        return $this->data;
    }

    private function get_modulos_data($id){
        global $wpdb;
        $this->data['data_modulos']                   = $this->all_data["d1_plugin_modulos"];
        $this->data['data_modulos']                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_modulos WHERE id=$id")),true);
        $this->data['data_modulos']                   = !empty($this->data['data_modulos'][0]) ? $this->data['data_modulos'][0] : array();
        if(empty($id) || empty($this->data['data_modulos'])){
            wp_redirect(site_url() . '/404/');
        }
        $this->data['data_modulos']['cases_options']  = !empty($this->data['data_modulos']['cases_options']) ? json_decode($this->data['data_modulos']['cases_options'],true) : array();
        $this->data['data_modulos']['challenge1']     = !empty($this->data['data_modulos']['challenge1']) ? json_decode($this->data['data_modulos']['challenge1'],true) : array();
        $this->data['data_modulos']['challenge2']     = !empty($this->data['data_modulos']['challenge2']) ? json_decode($this->data['data_modulos']['challenge2'],true) : array();
        $this->data['data_modulos']['challenge3']     = !empty($this->data['data_modulos']['challenge3']) ? json_decode($this->data['data_modulos']['challenge3'],true) : array();
        $this->data['data_modulos']['features']       = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_key_points WHERE id_segmento=$id AND page='modulos'")),true);
        $this->data['data_modulos']['cases']          = array();
        for($i=1;$i<=3;$i++){
            $id_case                = $this->data['data_modulos']['cases_options']["list_case$i"];
            $case                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases where id_card = $id_case")),true);
            $case                   = !empty($case[0]) ? $case[0] : array();
            $id_categoria_case      = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array();
            $id_categoria_case      = !empty($id_categoria_case['categoria_case']) ? $id_categoria_case['categoria_case'] : 0;
            $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "d1_cases_categorias where id = $id_categoria_case")),true);
            $case['categoria']      = !empty($categoria[0]) ? $categoria[0] : array();
            $this->data['data_modulos']['cases'][] = $case;
        }
        return $this->data;
    }

}
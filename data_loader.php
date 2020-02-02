<?php
function dirname_oldphpv2($path, $level = 0){
    $dir = explode(DIRECTORY_SEPARATOR, $path);
    $level = $level * -1;
    if($level == 0) $level = count($dir);
    array_splice($dir, $level);
    return implode($dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
}
class Data_Loader {
    private $all_data;
    private $data;
    private $language;
	public function __construct(){
        session_start(); 
        $language_option = !empty($_SESSION['d1_language_option']) ? $_SESSION['d1_language_option'] : "PT";
        $this->language = (!empty($language_option) && $language_option != "PT") ? $language_option ."_" : "";
        require(trim(dirname_oldphpv2(__FILE__,4)) . "wp-load.php");
        wp_load_alloptions();
        require_once dirname_oldphpv2(__FILE__,3).'plugins/d1_plugin/includes/base/d1_view_parser.php';
        $d1_view_parser = new D1_View_Parser();
        $img_default = get_template_directory_uri() . "/images/img_default.jpg";
        $this->all_data = $d1_view_parser->get_data($language_option);
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
            case 'objetivos':
                $data = $this->get_objetivos_data($id);
                break;
            case 'departamentos':
                $data = $this->get_departamentos_data($id);
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
        $this->data['data_midia']['noticias']       = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_midia ")),true);
        $this->data['data_midia']['destaque']       = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_midia WHERE id=" . $this->data['data_midia']['midia_secao1_destaque_select'])),true);
        $this->data['data_midia']['destaque']       = !empty($this->data['data_midia']['destaque'][0]) ? $this->data['data_midia']['destaque'][0] : array();
        $this->data['data_midia']['cases']          = array();
        for($i=1;$i<=3;$i++){
            $id_case                = $this->data['data_midia']["midia_secao2_case$i"];
            $case                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases where id_card = $id_case")),true);
            $case                   = !empty($case[0]) ? $case[0] : array();
            $cases_options          = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array();
            $id_categoria_case      = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
            $case['is_whitepaper']  = !empty($cases_options['is_whitepaper']) ? $cases_options['is_whitepaper'] : 0;
            $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases_categorias where id = $id_categoria_case")),true);
            $case['categoria']      = !empty($categoria[0]) ? $categoria[0] : array();
            $this->data['data_midia']['cases'][] = $case;
        }
        return $this->data;
    }

    private function get_modulos_data($id){
        global $wpdb;
        $this->data['data_modulos']                   = $this->all_data["d1_plugin_modulos"];
        $this->data['data_modulos']                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_modulos WHERE id=$id")),true);
        $this->data['data_modulos']                   = !empty($this->data['data_modulos'][0]) ? $this->data['data_modulos'][0] : array();
        if(empty($id) || empty($this->data['data_modulos'])){
            wp_redirect(site_url() . '/404/');
        }
        $this->data['data_modulos']['cases_options']  = !empty($this->data['data_modulos']['cases_options']) ? json_decode($this->data['data_modulos']['cases_options'],true) : array();
        $this->data['data_modulos']['challenge1']     = !empty($this->data['data_modulos']['challenge1']) ? json_decode($this->data['data_modulos']['challenge1'],true) : array();
        $this->data['data_modulos']['challenge2']     = !empty($this->data['data_modulos']['challenge2']) ? json_decode($this->data['data_modulos']['challenge2'],true) : array();
        $this->data['data_modulos']['challenge3']     = !empty($this->data['data_modulos']['challenge3']) ? json_decode($this->data['data_modulos']['challenge3'],true) : array();
        $this->data['data_modulos']['features']       = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_key_points WHERE id_segmento=$id AND page='modulos'")),true);
        $this->data['data_modulos']['cases']          = array();
        for($i=1;$i<=3;$i++){
            $id_case                = $this->data['data_modulos']['cases_options']["list_case$i"];
            $case                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases where id_card = $id_case")),true);
            $case                   = !empty($case[0]) ? $case[0] : array();
            $cases_options          = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array();
            $id_categoria_case      = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
            $case['is_whitepaper']  = !empty($cases_options['is_whitepaper']) ? $cases_options['is_whitepaper'] : 0;
            $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases_categorias where id = $id_categoria_case")),true);
            $case['categoria']      = !empty($categoria[0]) ? $categoria[0] : array();
            $this->data['data_modulos']['cases'][] = $case;
        }
        return $this->data;
    }

    private function get_objetivos_data($id){
        global $wpdb;
        $this->data['data_objetivos']                   = $this->all_data["d1_plugin_objetivos"];
        $this->data['data_objetivos']                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_objetivos WHERE id=$id")),true);
        $this->data['data_objetivos']                   = !empty($this->data['data_objetivos'][0]) ? $this->data['data_objetivos'][0] : array();
        if(empty($id) || empty($this->data['data_objetivos'])){
            wp_redirect(site_url() . '/404/');
        }
        $this->data['data_objetivos']['cases_options']  = !empty($this->data['data_objetivos']['cases_options']) ? json_decode($this->data['data_objetivos']['cases_options'],true) : array();
        $this->data['data_objetivos']['challenge1']     = !empty($this->data['data_objetivos']['challenge1']) ? json_decode($this->data['data_objetivos']['challenge1'],true) : array();
        $this->data['data_objetivos']['challenge2']     = !empty($this->data['data_objetivos']['challenge2']) ? json_decode($this->data['data_objetivos']['challenge2'],true) : array();
        $this->data['data_objetivos']['challenge3']     = !empty($this->data['data_objetivos']['challenge3']) ? json_decode($this->data['data_objetivos']['challenge3'],true) : array();
        $this->data['data_objetivos']['key_points']     = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_key_points WHERE id_segmento=$id AND page='objetivos'")),true);
        $this->data['data_objetivos']['cases']          = array();
        for($i=1;$i<=3;$i++){
            $id_case                = $this->data['data_objetivos']['cases_options']["list_case$i"];
            $case                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases where id_card = $id_case")),true);
            $case                   = !empty($case[0]) ? $case[0] : array();
            $cases_options          = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array();
            $id_categoria_case      = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
            $case['is_whitepaper']  = !empty($cases_options['is_whitepaper']) ? $cases_options['is_whitepaper'] : 0;
            $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases_categorias where id = $id_categoria_case")),true);
            $case['categoria']      = !empty($categoria[0]) ? $categoria[0] : array();
            $this->data['data_objetivos']['cases'][] = $case;
        }
        return $this->data;
    }

    private function get_departamentos_data($id){
        global $wpdb;
        $this->data['data_departamentos']                   = $this->all_data["d1_plugin_departamentos"];
        $this->data['data_departamentos']                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_departamentos WHERE id=$id")),true);
        $this->data['data_departamentos']                   = !empty($this->data['data_departamentos'][0]) ? $this->data['data_departamentos'][0] : array();
        $this->data['data_departamentos']['chamada_plataforma'] = $this->all_data['d1_plugin_plataforma']['plataforma_secao2_chamada'];
        if(empty($id) || empty($this->data['data_departamentos'])){
            wp_redirect(site_url() . '/404/');
        }
        $this->data['data_departamentos']['cases_options']  = !empty($this->data['data_departamentos']['cases_options']) ? json_decode($this->data['data_departamentos']['cases_options'],true) : array();
        $this->data['data_departamentos']['modulos_options']= !empty($this->data['data_departamentos']['modulos_options']) ? json_decode($this->data['data_departamentos']['modulos_options'],true) : array();
        $this->data['data_departamentos']['challenge1']     = !empty($this->data['data_departamentos']['challenge1']) ? json_decode($this->data['data_departamentos']['challenge1'],true) : array();
        $this->data['data_departamentos']['challenge2']     = !empty($this->data['data_departamentos']['challenge2']) ? json_decode($this->data['data_departamentos']['challenge2'],true) : array();
        $this->data['data_departamentos']['challenge3']     = !empty($this->data['data_departamentos']['challenge3']) ? json_decode($this->data['data_departamentos']['challenge3'],true) : array();
        $this->data['data_departamentos']['features']       = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_key_points WHERE id_segmento=$id AND page='departamentos'")),true);
        $this->data['data_departamentos']['cases']          = array();
        $this->data['data_departamentos']['cargos']         = array();
        for($i=1;$i<=3;$i++){
            $id_case                = $this->data['data_departamentos']['cases_options']["list_case$i"];
            $case                   = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases where id_card = $id_case")),true);
            $case                   = !empty($case[0]) ? $case[0] : array();
            $cases_options          = !empty($case['cases_options']) ? json_decode($case['cases_options'],true) : array();
            $id_categoria_case      = !empty($cases_options['categoria_case']) ? $cases_options['categoria_case'] : 0;
            $case['is_whitepaper']  = !empty($cases_options['is_whitepaper']) ? $cases_options['is_whitepaper'] : 0;
            $categoria              = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cases_categorias where id = $id_categoria_case")),true);
            $case['categoria']      = !empty($categoria[0]) ? $categoria[0] : array();
            $this->data['data_departamentos']['cases'][] = $case;
        }
        for($i=1;$i<=3;$i++){
            $id_modulo              = $this->data['data_departamentos']['modulos_options']["list_modulos$i"];
            $modulo                 = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_key_points WHERE id=$id_modulo AND page='modulos'")),true);
            $modulo                 = !empty($modulo[0]) ? $modulo[0] : array();
            $this->data['data_departamentos']['modulos'][] = $modulo;
        }
        $this->data['data_departamentos']['cargos']         = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_cargos where id_departamento = $id")),true);
        $this->data['data_departamentos']['cargo_destaque'] = array();
        if(!empty($this->data['data_departamentos']['cargos'][0])){
            $this->data['data_departamentos']['cargo_destaque'] = $this->data['data_departamentos']['cargos'][0];
        }
        return $this->data;
    }

    function get_cta($id_cta){
        global $wpdb;
        $cta = json_decode(json_encode($wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $this->language  . "d1_call_to_action WHERE id=$id_cta")),true);
        $cta = !empty($cta[0]) ? $cta[0] :  array('title' =>'','link' =>'','target' =>'');
        
        //verifica tipo de cta
        if(!empty($cta['target'])){
            switch($cta['target']){
                case 'modal':
                    $cta['icon'] = 'btn-black-home-play play open-modal';
                    $cta['target'] = '';
                    $cta['video_url'] = $cta['link'];
                    $cta['link']   = '#';
                    break;
                case 'play':
                    $cta['icon'] = 'btn-black-home-play play';
                    $cta['target'] = 'blank';
                    $cta['video_url'] = '';
                    break;
                case 'infinite':
                    $cta['icon'] = 'btn-cx infinite';
                    $cta['target'] = '_blank';
                    $cta['video_url'] = '';
                    break;
                default:
                    $cta['video_url'] = '';
                    $cta['icon'] = '';
                    break;
            }
        }
        return $cta;
    }
}
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author eloge@mediabox.bi
 *Cette classe est charge de logger tous les actions de l'utilisateur, c ad trace de tous les traces et fonction que l'utilisateurs appelle.
 */


class Statistics {

    function __construct() {
        $this->ci = & get_instance();//besoin d'un instance CI pour utilisation des classe
        $this->ci->load->library("user_agent");
        $this->ci->load->helper("url");
        $this->ci->load->library("session");
    }

    public function log_activity() {
       $ip = $_SERVER["REMOTE_ADDR"];
    //  print_r($ip); die();
       $url = current_url();
       $date = date("d/m/Y H:i:s");
       $user = ($this->ci->session->userdata("EMAIL")) ? $this->ci->session->userdata("EMAIL") : 'Anonymous';
       $user_id = ($this->ci->session->userdata("USER_ID")) ? $this->ci->session->userdata("USER_ID") : '-1';
       $method = $_SERVER["REQUEST_METHOD"];
       $browser = $this->ci->agent->browser.' version '.$this->ci->agent->version;
       $os = $this->ci->agent->platform;  
       $uri= uri_string();      
       $logs = sprintf("%s-%s-%s--%s", $date,$url,$method,$uri);
       $enc_logs = $logs;
        // Le "i" après le délimiteur du pattern indique que la recherche ne sera pas sensible à la casse
        if (preg_match("/asset/i", $uri)) {//si le uri contient le mot asset j'ignore car le dossier asset est dEdiie au style
            //echo "Un résultat a été trouvé.";
        }
        else {
            $this->ci->Model->create("logs",array("logs"=>$enc_logs,"date_time"=>date("Y-m-d H:i:s"),"username"=>$user,'user_id'=>$user_id,'ip_adresse'=>$ip,'operating_system'=>$os,'browser_used'=>$browser));
        }

    }
} 

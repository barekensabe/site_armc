<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications
{
	protected $CI;

	public function __construct()
	{
	    $this->CI = & get_instance();
      $this->CI->load->library('email');
      $this->CI->load->model('Model');
	}

  //COUSP VPS

      function send_mail($emailTo = array(), $subjet= array(), $cc_emails = array(), $message=NULL, $attach = array()) {

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://vps.cousp-minisante.gov.bi';
        $config['smtp_port'] = 465;
    
        $config['smtp_user'] = 'admin@cousp-minisante.gov.bi';
    $config['smtp_pass'] = "RSf[5R0)G71#";
       
        $config['mailtype'] = 'html';
        $config['charset'] = 'UTF-8';
        $config['wordwrap'] = TRUE;
        $config['smtp_timeout'] = 20;
        $config['newline'] = "\r\n";
        $this->CI->email->initialize($config);
        $this->CI->email->set_mailtype("html");
        $this->CI->email->from('prof.gongon@gmail.com', 'TTS Burundi');
        $this->CI->email->to($emailTo);
        $this->CI->email->cc($cc_emails);
       
        $this->CI->email->subject($subjet);
        $this->CI->email->message($message);

        if (!empty($attach)) {
            foreach ($attach as $att)
            $this->CI->email->attach($att);
        }
        if (!$this->CI->email->send())
         {
          return 0;
           
         } 
        else
          {
         return 1;
          }
      //echo $this->CI->email->print_debugger();
    }




   public function generate_UIID($taille)
   {
     $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
      $QuantidadeCaracteres = strlen($Caracteres); 
      $QuantidadeCaracteres--; 

      $Hash=NULL; 
        for($x=1;$x<=$taille;$x++){ 
            $Posicao = rand(0,$QuantidadeCaracteres); 
            $Hash .= substr($Caracteres,$Posicao,1); 
        }

        return $Hash; 
   }

    public function generate_password($taille)
   {
     $Caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVXWYZ0123456789,.@{-_/#'; 
      $QuantidadeCaracteres = strlen($Caracteres); 
      $QuantidadeCaracteres--; 

      $Hash=NULL; 
        for($x=1;$x<=$taille;$x++){ 
            $Posicao = rand(0,$QuantidadeCaracteres); 
            $Hash .= substr($Caracteres,$Posicao,1); 
        }
        return $Hash; 
   }


   //notification sur whatsapp
   public function whatsapp($phone,$message)
   {
// {
//   "created": true,
//   "message": null,
//   "chatId": "25769176202-1585228756@g.us",
//   "groupInviteLink": "https://chat.whatsapp.com/Jwrl92pPGqCJNCafwiZZWl"
// }
    $data = [
    'phone' =>"'".$phone."'", // Receivers phone
    'body' => "".$message."" // Message
            ];

    $json = json_encode($data); // Encode data to JSON
    // URL for request POST /message
    $url = 'https://api.chat-api.com/instance110613/sendMessage?token=44k8xwmfiveo2h53';

    // Make a POST request
    $options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
        ]
        ]);
     // Send a request
     $result = file_get_contents($url, false, $options);


   }

}

?>

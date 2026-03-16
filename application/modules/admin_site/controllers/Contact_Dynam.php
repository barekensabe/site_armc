<?php


class Publication extends CI_Controller
{


    public function index(){

     $this->load->view('Publication_View');
 }

    /**
     * fonction pour insert dans la base de donnees departement
     * 
     */
    public function insert()

    {
    	$table='publications';

        $image=$this->upload_document1($_FILES['IMAGE_SITE']['tmp_name'],$_FILES['IMAGE_SITE']['name']);


        $data_array=array("TITRE_PUBLICATION"=>$this->input->post('TITRE_SITE'),"DESC_PUBLICATION"=>$this->input->post('DESC_SITE'),"TITRE_PUBLICATION_ENG"=>$this->input->post('TITRE_SITE_ENG'),"DESC_PUBLICATION_ENG"=>$this->input->post('DESC_SITE_ENG'),"IMAGE_PUBLICATION"=>$image);



        $this->Model->create($table,$data_array);


        redirect(base_url('admin_site/Publication/index'));

    }


    public function upload_document1($nom_file,$nom_champ)
    {
  # code...

        $rep_doc =FCPATH.'uploads/image_publication/';
        $code=date("YmdHis");
        $fichier=basename($code."piece".uniqid());
        $file_extension = pathinfo($nom_champ, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        $valid_ext = array('png','jpeg','jpg');

        if(!is_dir($rep_doc)) //create the folder if it does not already exists   
        {
            mkdir($rep_doc,0777,TRUE);
            
        }  

        move_uploaded_file($nom_file, $rep_doc.$fichier.".".$file_extension);
        $pathfile=$fichier.".".$file_extension;
        return $pathfile;

    }



    
}





?>
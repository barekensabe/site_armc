<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

    public function get_all_feries() {
        $query = $this->db->select('DATE_FERIE')->get('jours_feries');
        return array_column($query->result_array(), 'DATE_FERIE');
    }

	function create($table, $data) {

        $query = $this->db->insert($table, $data);
        return ($query) ? true : false;

    }

    function Requetedelete($requete){
      $this->db->query($requete);
      
    }

    public function read($table,$critere=array()){
      $this->db->where($critere);
      $query=$this->db->get($table);//select * FROM table_name where $critere
      return $query->result_array();//row_array izana icambere ishikiyeko ihuye niyo condition result_array utegerezwa gukoresha boucle mug row_array ntic mur boucle
      
      }

      function getRequete1($requete){
        $query=$this->db->query($requete);
        if ($query) {
          return $query->result_array();
        }
      }

    
    function calcule_distance($point1,$point2,$unite="km",$precision=2) {
        //recuperation de l'instance de codeigniter
        $ci = & get_instance();
        $degrees = rad2deg(acos((sin(deg2rad($point1["lat"]))*sin(deg2rad($point2["lat"]))) + (cos(deg2rad($point1["lat"]))*cos(deg2rad($point2["lat"]))*cos(deg2rad($point1["long"]-$point2["long"])))));
      // Conversion de la distance en degrés à l'unité choisie (kilomètres, milles ou milles nautiques)
      switch($unite) {
        case 'km':
          $distance = $degrees * 111.13384; // 1 degré = 111,13384 km, sur base du diamètre moyen de la Terre (12735 km)
          break;
        case 'mi':
          $distance = $degrees * 69.05482; // 1 degré = 69,05482 milles, sur base du diamètre moyen de la Terre (7913,1 milles)
          break;
        case 'nmi':
          $distance =  $degrees * 59.97662; // 1 degré = 59.97662 milles nautiques, sur base du diamètre moyen de la Terre (6,876.3 milles nautiques)
      }
      return array(round($distance, $precision)." ".$unite);       
      }


     function getList_betweenincident($table,$critere=array(),$criteres=array()){
        $this->db->where('DATE_INCIDENT >=', $critere);
        $this->db->where('DATE_INCIDENT <=', $criteres);
      
        $query= $this->db->get($table);
        return $query->result_array();
    }

   
    function insert_batch($table,$data){
      
    $query=$this->db->insert_batch($table, $data);
    return ($query) ? true : false;
    //return ($query)? true:false;

    }
    function getListLimitold($table,$limit)
    {
     $this->db->limit($limit);
     $query= $this->db->get($table);
     
      if($query)
       {
           return $query->result_array();
       }   
    }

    function getListLimi($table,$limit,$cond=array())
    {
     $this->db->limit($limit);
     $this->db->where($cond);
     $query= $this->db->get($table);
     
      if($query)
       {
           return $query->result_array();
       }   
    }

    function getListLimitwhere($table,$criteres = array(),$limit = NULL)
    {
      $this->db->limit($limit);
      $this->db->where($criteres);
     $query= $this->db->get($table);
     
      if($query)
       {
           return $query->result_array();
       }   
    }

    function getList_distinct($table,$distinct=array()) {
        $this->db->select($distinct);
        $query = $this->db->get($table);
        return $query->result_array();
    }



       function getList_dist($table,$condi = array(),$criteres = array(),$criteres1=array(),$criteres2=array())

        {
        $this->db->where($condi);
        $this->db->where($criteres);
        $this->db->where($criteres1);
        $this->db->where($criteres2);

        $query = $this->db->get($table);
        if($query){
          return $query->result_array();
        }   
    }





    function getList_distinct2($table,$distinct=array(),$criteres=array()) {
      $this->db->where($criteres);
        $this->db->select($distinct);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function getList_between($table,$critere=array(),$criteres=array()){
        $this->db->where('NBRE_PIECES_PRINCIPALES >=', $critere);
$this->db->where('NBRE_PIECES_PRINCIPALES <=', $criteres);
return $this->db->get($table);
    }

  function update($table, $criteres, $data) {
        $this->db->where($criteres);
        $query = $this->db->update($table, $data);
        return ($query) ? true : false;
    }
    function update_batch($table, $criteres, $data) {
        $this->db->where($criteres);
        $query = $this->db->update_batch($table, $data);
        return ($query) ? true : false;
    }
  function update_table($table, $criteres, $data) {
        foreach ($data as $key => $value) {
          $this->db->set($key,$value);
        }
        $this->db->where($criteres);
        $query = $this->db->update($table);
        return ($query) ? true : false;
    }

    function insert_last_id($table, $data) {

        $query = $this->db->insert($table, $data);
       
       if ($query) {
            return $this->db->insert_id();
        }

    }
  

    function getList($table,$criteres = array()) {
        $this->db->where($criteres);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function getListTime($table,$criteres = array(),$time = NULL) {
        $this->db->where($criteres);
        $this->db->where($time);
        $query = $this->db->get($table);
        return $query->result_array();
    }


    function checkvalue($table, $criteres) {
        $this->db->where($criteres);
        $query = $this->db->get($table);
        if($query->num_rows() > 0)
        {
           return true ;
        }
        else{
    return false;
    }
    }



    function getOne($table, $criteres) {
        $this->db->where($criteres);
        $query = $this->db->get($table);
        return $query->row_array();
    }
    function getOneSearch($table, $criteres) {
        $this->db->like($criteres);
        $query = $this->db->get($table);
        return $query->row_array();
    }
    function getOneSearch1($table, $criteres) {
        $this->db->like($criteres);
        $query = $this->db->get($table);
        return $query->row_array();
    }

   function delete($table,$criteres){
        $this->db->where($criteres);
        $query = $this->db->delete($table);
        return ($query) ? true : false;
    }



    function record_count($table)
    {
       $query= $this->db->get($table);
       if($query)
       {
           return $query->num_rows();
       }
       
    }


    function record_countsome($table, $criteres)
    {
      $this->db->where($criteres);
       $query= $this->db->get($table);
       if($query)
       {
           return $query->num_rows();
       }
       
    }



        function getListOrder($table,$criteres)
    {
        $this->db->order_by($criteres);
      $query= $this->db->get($table);
      if($query)
      {
          return $query->result_array();
      }
    }


    
	



     function fetch_table($table,$limit,$start,$order,$ordervalue)
    {
     $this->db->limit($limit,$start);
     $this->db->order_by($order,$ordervalue);
     $query= $this->db->get($table);
     
      if($query)
       {
           return $query->result_array();
       }   
    }




        function getToutList($requete) {
        //$this->db->where($criteres);
       $query = $this->db->query($requete);
       $result=$query->result_array();
        return $result;
    }
    
    function checkvalue1($table,$champ, $criteres) {
        
        $this->db->where($champ, $criteres);
        $query = $this->db->get($table);

        if ($query) {
            return $query->row_array();
        }
       
    }

    public function Listdelegationpersonnel(){
    $data = array();
    $this->db->select('pd.ID_DELEGATION');
    
    $this->db->from('personnel_delegation pd');

    $this->db->group_by('pd.ID_DELEGATION');
    $query=$this->db->get();
       
    if ($query) {
            return $query->result_array();
        }
    }

public function get_elements($criterepieces=array()){

      /* $this->db->select('NOM_ELEMENT');
       
      $this->db->group_by('NOM_ELEMENT');
      $query=$this->db->get($table);
      return $query->result_array()  ;*/
      
  $this->db->select("*");
  $this->db->from('element e');
  $this->db->join('elements_piece ep', 'ep.CODE_ELEMENT = e.CODE_ELEMENT');
   $this->db->where("CODE_PIECE",$criterepieces);
  $query = $this->db->get();
  return $query->result_array();
 
       }
    public function get_ones($table, $champ, $value) {
        $this->db->where($champ, $value);
        $query = $this->db->get($table);
        if ($query) {
            return $query->result_array();
        }
    }



function fetch_table_new($table,$limit,$start,$order,$ordervalue,$criteres)
    {
     $this->db->where($criteres);
     $this->db->limit($limit,$start);
     $this->db->order_by($order,$ordervalue);
     $query= $this->db->get($table);
     
      if($query)
       {
           return $query->row_array();
       }   
    }

    function findNext($table,$primary_key,$current_id) {
        $sql = "select * from $table where $primary_key = (select min($primary_key) from $table where $primary_key > $current_id)";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    function findPrevious($table,$primary_key,$current_id) {
        $sql = "select * from $table where $primary_key = (select max($primary_key) from $table where $primary_key < $current_id)";
        $query = $this->db->query($sql);
        return $query->row_array();
    }



    //fonction permettant de se connecter
function login($email,$password)
    {
   $this->db->where('EMAIL_PRENEUR',$email);
   $this->db->where('PASSWORD',$password);
   $query=$this->db->get('preneur');

  if($query->num_rows()==1)
   {
      return $query->row();
    }
  else{
      return false;
      }
   }


   function getListOrdered($table,$order=array(),$criteres = array()) {
        $this->db->where($criteres);
        $this->db->order_by($order,"ASC");
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function record_countsome22($table, $criteres=array(),$cond=array())
    {
      $this->db->where($criteres);
      $this->db->where($cond);
       $query= $this->db->get($table);
       if($query)
       {
           return $query->num_rows();
       }
       
    }
    //alain
     function getCond_distinct($table,$distinct=array(),$where=array(),$where2=array()) {
        $this->db->select($distinct);
        $this->db->where($where);
        $this->db->where($where2);
        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    function getsomme($table, $column=array(), $cond=array(),$cond2=array())
    {
       $this->db->select($column);
       $this->db->where($cond);
       $this->db->where($cond2);
       $query = $this->db->get($table);
       return $query->row_array();
    }  



          function get_somme($sum=array(), $table=array(),$cond=array())
    {
        $this->db->where($cond);
        $this->db->select($sum);
        $query = $this->db->get($table);

        if ($query) {
            return $query->row_array();
        }
    }
    public function ListMinute($idReunion){
    $data = array();

     $this->db->select('titre');
    
    $this->db->from('points_du_jour');
    $this->db->where( array('idReunion'=>$idReunion));

    $this->db->group_by('titre');
    $query=$this->db->get();
       
    if ($query) {
            return $query->result_array();
        }
    }
public function ListMinute1($idReunion){
    $data = array();

     //$this->db->select('idPoint');
      $this->db->distinct('idPoint');

     //$this->db->select('titre');
    
    $this->db->from('points_du_jour');
    $this->db->where( 'idReunion',$idReunion);

   // $this->db->group_by('idPoint');
    $query=$this->db->get();
       
    if ($query) {
            return $query->result_array();
        }
    }



      function record_countsome222($table, $criteres=array(),$cond=array(),$cond2=array())
    {
      $this->db->where($criteres);
      $this->db->where($cond);
      $this->db->where($cond2);
       $query= $this->db->get($table);
       if($query)
       {
           return $query->num_rows();
       }
    }

public function make_datatables($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query($table,$select_column,$critere_txt,$critere_array,$order_by);
        if($_POST['length'] != -1){
           $this->db->limit($_POST["length"],$_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }

   public function make_query($table,$select_column=array(),$critere_txt = NULL,$critere_array=array(),$order_by=array())
    {
        $this->db->select($select_column);
        $this->db->from($table);

        if($critere_txt != NULL){
            $this->db->where($critere_txt);
        }
        if(!empty($critere_array))
          $this->db->where($critere_array);

        if(!empty($order_by)){
            $key = key($order_by);
          $this->db->order_by($key,$order_by[$key]);  
        }        
          
    }
    public function count_all_data($table,$critere = array())
    {
       $this->db->select('*');
       $this->db->where($critere);
       $this->db->from($table);
       return $this->db->count_all_results();   
    }
  public function get_filtered_data($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query($table,$select_column,$critere_txt,$critere_array,$order_by);
        $query = $this->db->get();
        return $query->num_rows();
        
    }

    public function getListRequest($requete)
    {
      $query=$this->db->query($requete);
      if($query){
         return $query->result_array();
      }
    }

    function getOne_cond($table, $criteres=array(),$cond2=array()) {
        $this->db->where($criteres);
        $this->db->where($cond2);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    function getList_cond($table,$criteres = array(),$cond=array()) {
        $this->db->where($criteres);
        $this->db->where($cond);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function getList_distinct22($table,$distinct=array(),$criteres=array(),$cond2=array()) {
      $this->db->where($criteres);
      $this->db->where($cond2);
        $this->db->select($distinct);
        $query = $this->db->get($table);
        return $query->result_array();
    }

        function getRequete($requete){
      $query=$this->db->query($requete);
      if ($query) {
         return $query->result_array();
      }
    }
     function getRequeteOne($requete){
      $query=$this->db->query($requete);
      if ($query) {
         return $query->row_array();
      }
    }


    
    function mois($moi=0){
            $moislettre='';
            if($moi==1)
                $moislettre='Janvier';
            if($moi==2)
                $moislettre='Fevrier';
            if($moi==3)
                $moislettre='Mars';
            if($moi==4)
                $moislettre='Avril';
            if($moi==5)
                $moislettre='Mai';
            if($moi==6)
                $moislettre='Juin';
            if($moi==7)
                $moislettre='Juillet';
            if($moi==8)
                $moislettre='Août';
            if($moi==9)
                $moislettre='Septembre';
            if($moi==10)
                $moislettre='Octobre';
            if($moi==11)
                $moislettre='Novembre';
            if($moi==12)
                $moislettre='Decembre';

            return $moislettre;
        }

   

    public  function getMax($table,$champ,$condition=array())
    {
        $this->db->select('MAX('.$champ.')as MAX');
        $this->db->from($table);
        $this->db->where($condition);
         $query = $this->db->get();
        return $query->row_array(); 
    }





    public function get_nombreincident($criteres)
    {
      $this->db->select("COUNT(incid.INCIDENT_ID) as nbincidents");
      $this->db->from('incident incid');
      $this->db->join('province pv','pv.PROVINCE_ID=incid.PROVINCE_ID');
      $this->db->join('commune cm','cm.COMMUNE_ID=incid.COMMUNE_ID');
      $this->db->join('colline col','col.COLLINE_ID=incid.COLLINE_ID');
      $this->db->where($criteres);
      $query = $this->db->get();

      if($query){
        return $query->row_array();
      }
    }


      public function get_auteurs($criteres)
    {
      $this->db->select("COUNT(aut.AUTEUR_ID) as nbauteur");
      $this->db->from('auteur aut');
      $this->db->join('sexe se','se.SEXE_ID=aut.SEXE');
      $this->db->join('incident_auteur incid_aut','incid_aut.AUTEUR_ID=aut.AUTEUR_ID');
      $this->db->join('incident incid','incid.INCIDENT_ID=incid_aut.INCIDENT_ID');
      $this->db->join('province pv','pv.PROVINCE_ID=incid.PROVINCE_ID');
      $this->db->join('commune cm','cm.COMMUNE_ID=incid.COMMUNE_ID');
      $this->db->join('colline col','col.COLLINE_ID=incid.COLLINE_ID');
      $this->db->where($criteres);
      $query = $this->db->get();

      if($query){
        return $query->row_array();
      }
    }



    //procedure

    // public function procedure()
    // {
    //     $query = $this->db->('CALL `getProvinces`()');
    //     return $query->result_array();
    // }
    function getListDesc($table,$criteres=array(),$order_by='')
      {
         if(!empty($criteres))
          $this->db->where($criteres);
        if($order_by != NULL)
          $this->db->order_by($order_by,'DESC');
        $query= $this->db->get($table);

        if($query)
        {
            return $query->result_array();
        }
    }




    // public function count_all_data_acteur($table,$critere =NULL)
    // {
    //    $this->db->select('*');
    //    $this->db->where($critere);
    //    $this->db->from($table);
    //    $this->db->join('provinces', 'provinces.PROVINCE_ID='.$table.'.PROVINCE_ACTUEL','left');
    //    $this->db->join('communes', 'communes.COMMUNE_ID='.$table.'.COMMUNE_ACTUEL','left');
    //    $this->db->join('acteur_affectation', 'acteur_affectation.ID_ACTEUR='.$table.'.ID_ACTEUR','left');
    //    $this->db->join('acteur_profile', 'acteur_profile.PROFILE_ID='.$table.'.PROFIL_ID','left');
    //    $this->db->join('district', 'district.DISTRICT_ID='.$table.'.ID_DESTRICT_SANITAIRE','left');
    //    return $this->db->count_all_results();   
    // }
    // public function get_filtered_data_acteur($table,$select_column,$critere_txt,$critere_array,$order_by)
    // {
    //     $this->make_query_acteur($table,$select_column,$critere_txt,$critere_array,$order_by);
    //     $query = $this->db->get();
    //     return $query->num_rows();
        
    // }
    // public function make_datatables_acteur($table,$select_column,$critere_txt,$critere_array=array(),$order_by)
    // {
    //     $this->make_query_acteur($table,$select_column,$critere_txt,$critere_array,$order_by);
    //     if($_POST['length'] != -1){
    //        $this->db->limit($_POST["length"],$_POST["start"]);
    //     }
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    //  public function make_query_acteur($table,$select_column=array(),$critere_txt = NULL,$critere_array=NULL,$order_by=array())
    // {
    //     $this->db->select($select_column);
    //     $this->db->from($table);
    //     $this->db->join('provinces', 'provinces.PROVINCE_ID='.$table.'.PROVINCE_ACTUEL','left');
    //     $this->db->join('communes', 'communes.COMMUNE_ID='.$table.'.COMMUNE_ACTUEL','left');
    //     $this->db->join('acteur_affectation', 'acteur_affectation.ID_ACTEUR='.$table.'.ID_ACTEUR','left');
    //     $this->db->join('acteur_profile', 'acteur_profile.PROFILE_ID='.$table.'.PROFIL_ID','left');
    //     $this->db->join('district', 'district.DISTRICT_ID='.$table.'.ID_DESTRICT_SANITAIRE','left');

    //     if($critere_txt != NULL){
         
    //         $this->db->where($critere_txt);
    //     }
    //     if(!empty($critere_array))
    //       $this->db->where($critere_array);

    //     if(!empty($order_by)){
    //         $key = key($order_by);
    //       $this->db->order_by($key,$order_by[$key]);  
    //     }        
          
    // }

  


// /Acteur/
      public function count_all_data_acteur($table,$critere =NULL)
    {
       $this->db->select('*');
       if ($critere!="1") {
         # code...
        $this->db->where($critere);
       }
       

       $this->db->from($table);
       $this->db->join('provinces', 'provinces.PROVINCE_ID='.$table.'.PROVINCE_ACTUEL','left');
       $this->db->join('communes', 'communes.COMMUNE_ID='.$table.'.COMMUNE_ACTUEL','left');
       $this->db->join('acteur_affectation', 'acteur_affectation.ID_ACTEUR='.$table.'.ID_ACTEUR','left');
       $this->db->join('acteur_profile', 'acteur_profile.PROFILE_ID='.$table.'.PROFIL_ID','left');
       $this->db->join('district', 'district.DISTRICT_ID='.$table.'.ID_DESTRICT_SANITAIRE','left');
       return $this->db->count_all_results();   
    }
    public function get_filtered_data_acteur($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query_acteur($table,$select_column,$critere_txt,$critere_array,$order_by);
        $query = $this->db->get();
        return $query->num_rows();
        
    }
    public function make_datatables_acteur($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query_acteur($table,$select_column,$critere_txt,$critere_array,$order_by);
        if($_POST['length'] != -1){
           $this->db->limit($_POST["length"],$_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
     public function make_query_acteur($table,$select_column=array(),$critere_txt = NULL,$critere_array=NULL,$order_by=array())
    {
        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->join('provinces', 'provinces.PROVINCE_ID='.$table.'.PROVINCE_ACTUEL','left');
        $this->db->join('communes', 'communes.COMMUNE_ID='.$table.'.COMMUNE_ACTUEL','left');
        $this->db->join('acteur_affectation', 'acteur_affectation.ID_ACTEUR='.$table.'.ID_ACTEUR','left');
        $this->db->join('acteur_profile', 'acteur_profile.PROFILE_ID='.$table.'.PROFIL_ID','left');
        $this->db->join('district', 'district.DISTRICT_ID='.$table.'.ID_DESTRICT_SANITAIRE','left');

        if($critere_txt != NULL){
         
            $this->db->where($critere_txt);
        }
       if( $critere_array!="1" )
          {$this->db->where($critere_array);}

        if(!empty($order_by)){
            $key = key($order_by);
          $this->db->order_by($key,$order_by[$key]);  
        }        
          
    }

/**/



      public function count_all_data_not($table,$critere =NULL)
    {
       $this->db->select('*');
      
         # code...
        $this->db->where($critere);
    
       

       $this->db->from($table);
       $this->db->join('alerte_notif_canal', 'alerte_notif_canal.TYPE_CANAL_ID='.$table.'.TYPE_CANAL_ID','left');
       $this->db->join('alertes_types', 'alertes_types.TYPE_ALERTE_ID='.$table.'.TYPE_ALERTE_ID','left');
       $this->db->join('alerte_notif_type_acteur', 'alerte_notif_type_acteur.ALERTE_TYPE_ACTEUR_ID='.$table.'.ALERTE_TYPE_ACTEUR_ID','left');
       return $this->db->count_all_results();   
    }
    public function get_filtered_data_not($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query_not($table,$select_column,$critere_txt,$critere_array,$order_by);
        $query = $this->db->get();
        return $query->num_rows();
        
    }
    public function make_datatables_not($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query_not($table,$select_column,$critere_txt,$critere_array,$order_by);
        if($_POST['length'] != -1){
           $this->db->limit($_POST["length"],$_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
     public function make_query_not($table,$select_column=array(),$critere_txt = NULL,$critere_array=array(),$order_by=array())
    {
        $this->db->select($select_column);
        $this->db->from($table);

        $this->db->join('alerte_notif_canal', 'alerte_notif_canal.TYPE_CANAL_ID='.$table.'.TYPE_CANAL_ID','left');
        $this->db->join('alertes_types', 'alertes_types.TYPE_ALERTE_ID='.$table.'.TYPE_ALERTE_ID','left');
        $this->db->join('alerte_notif_type_acteur', 'alerte_notif_type_acteur.ALERTE_TYPE_ACTEUR_ID='.$table.'.ALERTE_TYPE_ACTEUR_ID','left');

        if($critere_txt != NULL){
         
            $this->db->where($critere_txt);
        }
       if( !empty($critere_array) )
          {$this->db->where($critere_array);}

        if(!empty($order_by)){
            $key = key($order_by);
          $this->db->order_by($key,$order_by[$key]);  
        }        
          
    }

/**/

 
// /alerts/
      public function count_all_data_alert($table,$critere =NULL)
    {
       $this->db->select('*');
      
       $this->db->from($table);
       $this->db->join('alertes_types', 'alertes_types.TYPE_ALERTE_ID='.$table.'.TYPE_ALERTE_ID','left');
       $this->db->join('structures', 'structures.STRUCTURE_ID='.$table.'.STRUCTURE_ID','left');
       $this->db->join('district', 'district.DISTRICT_ID='.$table.'.DISTRICT_ID','left');
       $this->db->join('provinces', 'provinces.PROVINCE_ID='.$table.'.PROVINCE_ID','left');
       $this->db->join('communes', 'communes.COMMUNE_ID='.$table.'.COMMUNE_ID','left');
       $this->db->join('alerte_statut', 'alerte_statut.STATUT_ID='.$table.'.STATUT_ID','left');

       $this->db->join('requerant', 'requerant.REQUERANT_ID='.$table.'.REQUERANT_ID','left');
       return $this->db->count_all_results();   
    }
    public function get_filtered_data_alert($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query_alert($table,$select_column,$critere_txt,$critere_array,$order_by);
        $query = $this->db->get();
        return $query->num_rows();
        
    }
    public function make_datatables_alert($table,$select_column,$critere_txt,$critere_array,$order_by)
    {
        $this->make_query_alert($table,$select_column,$critere_txt,$critere_array,$order_by);
        if($_POST['length'] != -1){
           $this->db->limit($_POST["length"],$_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
  
/**/
 //Didace Dady: Automatiser les list avec Json : on met en parametre un requet concu avec tous les jointure possible
 public function datatable($requete)//make_datatables : requete avec Condition,LIMIT start,length
 { 
        $query =$this->maker($requete);//call function make query
        return $query->result();
      }  
    public function maker($requete)//make query
    {
      return $this->db->query($requete);
    }

    public function all_data($requete)//count_all_data : requete sans Condition sans LIMIT start,length
    {
       $query =$this->maker($requete); //call function make query
       return $query->num_rows();   
     }
     public function filtrer($requete)//get_filtered_data : requete avec Condition sans LIMIT start,length
     {
         $query =$this->maker($requete);//call function make query
         return $query->num_rows();
         
       }
}
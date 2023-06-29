<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Reset_model extends CI_Model
{

   function email_check($email){
    $this->db->where('email', $email);
    $this->db->where('status', '1');
    $query = $this->db->get('tbl_users');
    if($query->num_rows() > 0)
    { 
      $row = $query->row();
      /*echo $this->db->last_query();
      die("jack");*/
      return $row;
      
    }
    }

  
   function add_data($data,$table){
    if(!empty($data)){
        $this->db->insert($table, $data);
         return $this->db->insert_id();
    }
  
   }
   function check_user($hprk){
     $this->db->where('retrieval_key',$hprk);
     $this->db->where('status', '1');
    $query = $this->db->get('tbl_pass_recovery');   
      if ($query->num_rows() > 0){
        //die("greter");
         $result = $query->row();
        return $result;
    }
    else{
     // die("smaller");
        return false;
    }
  }
   function update_password($data,$cust_code)
   {
    if(!empty($data)){
    $this->db->where('user_code',$cust_code);
      $this->db->update('tbl_users', $data);
      /*echo $this->db->last_query();
      die("jack");*/
    }
  
   }
   function update_status($cust_code){
          $data['status']='0';
    $this->db->where('customer_id_fk',$cust_code);
      $this->db->update('tbl_pass_recovery', $data);
   }
	
	/*function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 17);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }*/
   
	
}

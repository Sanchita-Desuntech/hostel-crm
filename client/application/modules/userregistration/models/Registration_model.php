<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Registration_model extends CI_Model
{

  function getLastid()
     {
   		$this->db->select('max(id) as lastid');
    	$query = $this->db->get('tbl_customer');
    	$result = $query->row();
	    /*echo $this->db->last_query();
	    exit;*/
	    return $result;
    }
   function check_url($url)
     {
   $this->db->select('*');
   $this->db->where('profile_url',$url);
    $query = $this->db->get('tbl_customer');
    $result = $query->result();
    // echo $this->db->last_query();
    // exit;
    return $result;
   }
   function email_check($email){
     $this->db->where('email',$email);
    $query = $this->db->get('tbl_users');
      if ($query->num_rows() > 0){
        //die("greter");
        return false;
    }
    else{
     // die("smaller");
        return true;
    }

   }
   function check_user($hprk){
     $this->db->where('ecode',$hprk);
     $this->db->where('is_email_verified', '0');
    $query = $this->db->get('tbl_users');   
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
   function insert_customer($data){
    if(!empty($data)){
        $this->db->insert('tbl_customer', $data);
       // echo $this->db->last_query();exit;
         return $this->db->insert_id();
    }
  
   }
   function insert_user($data){
    if(!empty($data)){
        $this->db->insert('tbl_users', $data);
         return $this->db->insert_id();
    }
  
   }
   function update_status($id,$hprk){
          $data['is_email_verified']='1';
    $this->db->where('id',$id);
    $this->db->where('ecode',$hprk);
      $this->db->update('tbl_users', $data);
   }
   
	
}

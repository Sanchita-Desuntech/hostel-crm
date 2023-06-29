<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Submitrecipe_model extends CI_Model
{
	
	
   /*function get_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 16);
		
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }*/
 
    function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id',16);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
   function get_recipe_category_data()
  {
  	$this->db->select('*');
  	$this->db->where('tbl_category.status=', '1');
	$this->db->where('tbl_category.cat_type=', 'Recipe');
	$query = $this->db->get('tbl_category');	
	$result = $query->result();
    return $result;
  }
  function difficulty_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('status!=', 2);

		 $query = $this->db->get('tbl_difficulty');

		 $result = $query->result();

		 return $result;

  }
  function meal_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('status!=', 2);

		 $query = $this->db->get('tbl_meal_type');

		 $result = $query->result();

		 return $result;

  }
  function unit_allvalue() 

  {

		 $this->db->select('*');

		 $this->db->where('status!=', 2);

		 $query = $this->db->get('tbl_unit');

		 $result = $query->result();

		 return $result;

  }
  
  function add_data($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe',$data);
		//echo $this->db->last_query();
	     return $this->db->insert_id();
	     
			
		}

  }
  
  function instruction_insert($data)
  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe_instruction',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
  function ingradients_insert($data)
  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe_ingredients',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
  
  
	
  function nutrition_insert($data)
  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_recipe_nutritional_elements',$data);

	     return $this->db->insert_id();
	     
			
		}

  }
	
}

<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Recipe_model extends CI_Model
{
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 5);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   function get_details_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 6);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
	function get_recipe_data()
  {
	 $this->db->select('tbl_recipe.*,tbl_category.cat_name,tbl_category.slug as tcs,tbl_users.full_name,tbl_difficulty.name as diff_name');
	 $this->db->from('tbl_recipe');
      $this->db->join('tbl_category', 'tbl_category.id = tbl_recipe.category', 'left');
      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_recipe.user_code', 'left');
      $this->db->join('tbl_difficulty', 'tbl_difficulty.id = tbl_recipe.dificulty', 'left');
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_recipe.status=', 1);
      $this->db->where('tbl_recipe.is_approved=',1);
	 $query = $this->db->get();
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
  
  function get_single_recipe_data($slug)
     {
	   $this->db->select('tbl_recipe.*,tbl_category.cat_name,tbl_users.full_name as tuf,tbl_difficulty.name as tdn,tbl_meal_type.name as tmtn');
	  $this->db->from('tbl_recipe');
      $this->db->join('tbl_category', 'tbl_category.id = tbl_recipe.category', 'left');
      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_recipe.user_code', 'left');
      $this->db->join('tbl_difficulty', 'tbl_difficulty.id = tbl_recipe.dificulty', 'left');
      $this->db->join('tbl_meal_type', 'tbl_meal_type.id = tbl_recipe.type_of_meal', 'left');
      
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_recipe.status=', 1);
      $this->db->where('tbl_recipe.is_approved=',1);
      $this->db->where('tbl_recipe.slug',$slug);
	 $query = $this->db->get();
	 $result = $query->result();
	 /*echo $this->db->last_query();
	 exit();*/
	  //print_r($result); die();
	 return $result;
   }
   
   function get_recipe_cat_data($catid){
   		$this->db->select('cat_name,slug');	
   		$this->db->where('tbl_category.id=',$catid);	
		$query = $this->db->get('tbl_category');	
		$result = $query->row();		
	    return $result;
   }
   
   function get_recipe_other_data($rescode)
   {	 	
	 $this->db->select('tbl_recipe_ingredients.*,tbl_unit.name as unitname,tbl_unit.slug as unitslug');
	 $this->db->from('tbl_recipe_ingredients');
     $this->db->join('tbl_unit', 'tbl_unit.id = tbl_recipe_ingredients.unit', 'left');      
     $this->db->where('tbl_recipe_ingredients.recipe_code',$rescode);
	 $query = $this->db->get();	  
	 $result['ingredients'] = $query->result();
	 //nutrition  element
	 $this->db->select('tbl_recipe_nutritional_elements.*,tbl_unit.name as unitname,tbl_unit.slug as unitslug');
	 $this->db->from('tbl_recipe_nutritional_elements');
     $this->db->join('tbl_unit', 'tbl_unit.id = tbl_recipe_nutritional_elements.unit', 'left');      
     $this->db->where('tbl_recipe_nutritional_elements.recipe_code',$rescode);
	 $query = $this->db->get();	  
	 $result['nelement'] = $query->result();
	 
	 //instruction  element
	$this->db->select('*');  	
	$this->db->where('recipe_code=', $rescode);
	$query = $this->db->get('tbl_recipe_instruction');	
	$result['instruction'] = $query->result();
	/*echo $this->db->last_query();
	print_r($result['instruction']);*/
	 return $result;	 
   }
   
   function get_recipe_featured_data()
  {
  	  $this->db->select('tbl_recipe.*,tbl_difficulty.name as tdn');
	  $this->db->from('tbl_recipe');
      $this->db->join('tbl_difficulty', 'tbl_difficulty.id = tbl_recipe.dificulty', 'left');
      
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_recipe.status=', '1');
      $this->db->where('tbl_recipe.is_featured=', '1');
	  $query = $this->db->get();
	  $result = $query->result();
      return $result;
  }
  
  function get_category_recipe_data($slugcategory)
  { 	
  		  		
   		$this->db->select('id,cat_name,slug');	
   		$this->db->where('tbl_category.slug=',$slugcategory);	
		$query = $this->db->get('tbl_category');	
		$result['category'] = $query->row();
		
		 $this->db->select('tbl_recipe.*,tbl_users.full_name,tbl_difficulty.name as diff_name');
		 $this->db->from('tbl_recipe');     	 
    	$this->db->join('tbl_users', 'tbl_users.user_code = tbl_recipe.user_code', 'left');
    	  $this->db->join('tbl_difficulty', 'tbl_difficulty.id = tbl_recipe.dificulty', 'left');
   	  	 $this->db->order_by("orderid", "asc");
  	    $this->db->where('tbl_recipe.status=', 1);
    	$this->db->where('tbl_recipe.is_approved=',1);
		 $query = $this->db->get();
	 	$result['recipe'] = $query->result();
//		echo "<pre>";
//		print_r($result);die();
	    return $result;
   }
   
   function add_comments($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_comment_reviews',$data);

	     return $this->db->insert_id();

		}

  }
  
  function get_all_comments($refcode)
  {
  			
  		  $this->db->select('tbl_comment_reviews.*,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url,tbl_recipe.recipe_code ');
		  $this->db->from('tbl_comment_reviews');
	      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_comment_reviews.user_code', 'left');
	      $this->db->join('tbl_recipe', 'tbl_comment_reviews.ref_code = tbl_recipe.recipe_code', 'left');
	       $this->db->where('tbl_comment_reviews.status=',1);
	       $this->db->where('tbl_comment_reviews.ref_code=',$refcode);
	       $this->db->where('tbl_comment_reviews.parent=',0);
		  $query = $this->db->get();
		  $result = $query->result();
		  //echo $this->db->last_query();die();
		 
		 return $result;
  	
  }
  
  function get_all_child_comments($refcode,$id)
  {
  		  $this->db->select('tbl_comment_reviews.*,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url,tbl_comment_reviews.description,tbl_comment_reviews.rate_on,tbl_recipe.recipe_code ');
		  $this->db->from('tbl_comment_reviews');
	      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_comment_reviews.user_code', 'left');
	      $this->db->join('tbl_recipe', 'tbl_comment_reviews.ref_code = tbl_recipe.recipe_code', 'left');
	      $this->db->where('tbl_comment_reviews.status=',1);
	      $this->db->where('tbl_comment_reviews.ref_code=',$refcode);
	      $this->db->where('tbl_comment_reviews.parent=',$id);
		  $query = $this->db->get();
		  $result['child_comments'] = $query->result();
		  //echo $this->db->last_query();die();
		  return $result;
  	
  }
  function count_comments($refcode)
  {
  		$this->db->select('count(id) as total');
      $this->db->where('status', 1);
      $this->db->where('ref_code', $refcode);
      
      $query = $this->db->get('tbl_comment_reviews');
	  $result = $query->row();
	  //print_r ($result);
	  //echo $this->db->last_query();
	  
      return $result;
  }
  
  function count_review($refcode)
  {
  	$this->db->select('avg(rate) as rating');
	$this->db->where('ref_code', $refcode);
	$query = $this->db->get('tbl_comment_reviews');
	$result = $query->row();
	/*print_r ($result);
	echo $this->db->last_query();exit;*/
	return $result;
  }
  
  
  
  
   
  
}

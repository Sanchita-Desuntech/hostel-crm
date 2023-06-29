<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blog_model extends CI_Model
{
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 3);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   function get_details_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 4);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
	function get_blog_data()
  {
	 $this->db->select('tbl_blogs.*,tbl_category.cat_name,tbl_category.slug as tcs,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url');
	 $this->db->from('tbl_blogs');
      $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'left');
      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_blogs.user_code', 'left');
      $this->db->order_by("orderid", "asc");
      $this->db->where('tbl_blogs.status=', 1);
      $this->db->where('tbl_blogs.is_approved=',1);
	 $query = $this->db->get();
	 $result = $query->result();
	
	 return $result;
	
  }
  
  
  function get_blog_category_data(){
  	$this->db->select('*');
  	
	$this->db->where('tbl_category.status=', '1');
	$this->db->where('tbl_category.cat_type=', 'Blog');
	$query = $this->db->get('tbl_category');	
	$result = $query->result();
    return $result;
  }
  
  function get_single_blog_data($slug)
     {
	   $this->db->select('tbl_blogs.*,tbl_category.cat_name,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url');
	 $this->db->from('tbl_blogs');
      $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'left');
      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_blogs.user_code', 'left');
      $this->db->where('tbl_blogs.status=', 1);
      $this->db->where('tbl_blogs.is_approved=',1);
      $this->db->where('tbl_blogs.slug',$slug);
	 $query = $this->db->get();
	 $result = $query->result();
	 
	 return $result;
	 /*echo $this->db->last_query();
	 exit();*/
	  //print_r($result); die();	 
   }
   
   function get_featured_blog_data()
   {
   		$this->db->select('tbl_blogs.*,tbl_category.cat_name,tbl_category.slug as tcs,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url');
	    $this->db->from('tbl_blogs');
        $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'left');
        $this->db->join('tbl_users', 'tbl_users.user_code = tbl_blogs.user_code', 'left');
        $this->db->where('tbl_blogs.is_feature_blog=', '1');
        $this->db->where('tbl_blogs.status=', 1);
        $this->db->where('tbl_blogs.is_approved=',1);
	    $query = $this->db->get();
	    $result = $query->result();
		/*echo $this->db->last_query();
		die();*/
	 	return $result;
   }
   
   function get_category_data($slugcategory)
  { 	
  		  		
   		$this->db->select('id,cat_name,slug');	
   		$this->db->where('tbl_category.slug=',$slugcategory);	
		$query = $this->db->get('tbl_category');	
		$result['category'] = $query->row();
		
		$this->db->select('tbl_blogs.*,tbl_category.cat_name,tbl_category.slug as tcs,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url');
	    $this->db->from('tbl_blogs');
        $this->db->join('tbl_category', 'tbl_category.id = tbl_blogs.blog_category', 'left');
        $this->db->join('tbl_users', 'tbl_users.user_code = tbl_blogs.user_code', 'left');
        $this->db->where('tbl_blogs.status=', 1);
        $this->db->where('tbl_blogs.is_approved=',1);
        $this->db->where('tbl_blogs.blog_category',$result['category']->id);
	    $query = $this->db->get();
	    $result['blog'] = $query->result();
		
		/*echo "<pre>";
		print_r($result);die();*/
	    return $result;
   }
   
   function add_comments($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_comment_reviews',$data);

	     /*echo $this->db->last_query();
		 die();*/
	     return $this->db->insert_id();

		}

  }
  function get_all_comments($refcode)
  {
  			
  		  $this->db->select('tbl_comment_reviews.*,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url,tbl_comment_reviews.description,tbl_comment_reviews.rate_on,tbl_blogs.blog_code ');
		  $this->db->from('tbl_comment_reviews');
	      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_comment_reviews.user_code', 'left');
	      $this->db->join('tbl_blogs', 'tbl_comment_reviews.ref_code = tbl_blogs.blog_code', 'left');
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
  		  $this->db->select('tbl_comment_reviews.*,tbl_users.profile_photo,tbl_users.full_name,tbl_users.profile_url,tbl_comment_reviews.description,tbl_comment_reviews.rate_on,tbl_blogs.blog_code ');
		  $this->db->from('tbl_comment_reviews');
	      $this->db->join('tbl_users', 'tbl_users.user_code = tbl_comment_reviews.user_code', 'left');
	      $this->db->join('tbl_blogs', 'tbl_comment_reviews.ref_code = tbl_blogs.blog_code', 'left');
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
   
  
}

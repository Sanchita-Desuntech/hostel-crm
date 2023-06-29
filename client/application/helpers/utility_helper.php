<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
* @package     CLIRENT 1.0
* @subpackage  utility helper for frontend
*
* @copyright   Copyright (C) 2016 CLIRENT, Inc. All rights reserved.
*/
#################################################################
//constractor checking for login and signup section,
//if get true then it will not come to sign/login page again,
//it will redirect to the account page
//start
#################################################################
if (! function_exists('is_logged_in_profile')) {
    function is_logged_in_profile()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('is_logged_in');
        //print_r($CI->session);
        //echo $is_logged_in;
        //exit;
        if ($is_logged_in == true) {
            redirect('admin/home');
        } else {
        }
    }
}
#################################################################
//constractor checking for login and signup section,
//if get true then it will not come to sign/login page again,
//it will redirect to the account page
//end
#################################################################
#################################################################
//constractor checking for all page where user session is requried
//start
#################################################################
if (! function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI =& get_instance();
        $is_logged_in = $CI->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in == false) {
            //redirect('home');
           redirect('admin/home');
        }
    }
}
#################################################################
#################################################################
if (! function_exists('session_doc_detail')) {
    function session_doc_detail($doctor_id)
    {
        $CI =& get_instance();
        $CI->db->select(
        '
		'
        );
        $qry="SELECT  ksd.doctor_name,ksd.profile_image,ksd.profile,
		GROUP_CONCAT(ms.spec_name ORDER BY ms.master_doc_spec_id) DepartmentName
		FROM    knwlg_sessions_doctors ksd
		INNER JOIN master_doctor_specialization ms
		ON FIND_IN_SET(ms.master_doc_spec_id, ksd.speciality) > 0
		WHERE ksd.sessions_doctors_id=".$doctor_id."
		GROUP   BY ksd.sessions_doctors_id";
        $query = $CI->db->query($qry);
        $data_row= $query->result_array();
        return $data_row;
    }
}
if (! function_exists('get_knowledge_by_date')) {
    function get_knowledge_by_date($date)
    {
        $tomorrow=date('Y-m-d', strtotime('+1 days'));
        $prev_date=date('Y-m-d', strtotime('-1 days'));
        //$client_list = ' and ('. implode(' OR ', array_map(function($x) { return "FIND_IN_SET('$x', kcp.client_id)"; }, explode(',', $CI->session->userdata('client_ids')))).')';
        $CI =& get_instance();
        $client_list = ' and ('. implode(' OR ', array_map(function ($x) {
            return "FIND_IN_SET('$x', kcp.client_id)";
        }, explode(',', $CI->session->userdata('client_ids')))).')';
        $CI->db->select(
        '
		'
        );
        $qry="SELECT
				kcp.kc_id,
				kcp.kc_text,
				kcp.kc_image,
				kcp.kc_source_name,
				kcp.kc_post_datetime,
				kcp.kc_publish_date,
				kcp.kc_published_url,
				cln.client_name,
				mkt.kc_type_name,
				GROUP_CONCAT(DISTINCT ms.specialities_name) as specialities_name,
				GROUP_CONCAT(DISTINCT mt.master_tags_id) as  master_tags_id,
				GROUP_CONCAT(DISTINCT mt.tag_name) as  tag_name,
				ROUND(AVG(rating),1) as averageRating
				FROM knwlg_kcap as kcp
				LEFT JOIN master_specialities as ms ON FIND_IN_SET(ms.master_specialities_id, kcp.kc_speciality_id) > 0
				LEFT JOIN client_master as cln ON cln.client_master_id = kcp.client_id
				LEFT JOIN master_kcap_type as mkt ON mkt.master_kcap_type_id = kcp.kc_type_id
				LEFT JOIN knwlg_rating as rt ON rt.post_id = kcp.kc_id and  rt.post_type='kcap'
				LEFT JOIN master_tags mt ON FIND_IN_SET(mt.master_tags_id, kcp.kc_tags) > 0
				WHERE DATE(kcp.kc_post_datetime) = DATE('".$date."')   AND kcp.status=3 ".$client_list."   GROUP BY kcp.kc_id ORDER BY kcp.kc_post_datetime DESC ";
        $query = $CI->db->query($qry);
        $data_row= $query->result_array();
        return $data_row;
    }
}
if (! function_exists('get_compendium_by_date')) {
    function get_compendium_by_date($date)
    {
        $tomorrow=date('Y-m-d', strtotime('+1 days'));
        $prev_date=date('Y-m-d', strtotime('-1 days'));
        $CI =& get_instance();
        $client_list = ' and ('. implode(' OR ', array_map(function ($x) {
            return "FIND_IN_SET('$x', cm.client_id)";
        }, explode(',', $CI->session->userdata('client_ids')))).')';
        $CI->db->select(
        '
		'
        );
        $qry="SELECT
				cm.*,
				cln.client_name,
				ms.specialities_name,
				ROUND(AVG(rating),1) as averageRating
				FROM knwlg_compendium as cm
				JOIN master_specialities as ms ON ms.master_specialities_id = cm.comp_qa_speciality_id
				JOIN client_master as cln ON cln.client_master_id = cm.client_id
				LEFT JOIN knwlg_rating as rt ON rt.post_id = cm.comp_qa_id and  rt.post_type='comp'
				WHERE cm.status=3 AND DATE(cm.publication_date) = DATE('".$date."') ".$client_list."  GROUP BY cm.comp_qa_id ORDER BY cm.added_on DESC ";
        $query = $CI->db->query($qry);
        $data_row= $query->result_array();
        return $data_row;
    }
}
if (! function_exists('get_grandround_by_date')) {
    function get_grandround_by_date($date)
    {
        $tomorrow=date('Y-m-d', strtotime('+1 days'));
        $prev_date=date('Y-m-d', strtotime('-1 days'));
        $CI =& get_instance();
        $CI->db->select(
        '
		'
        );
        $qry="SELECT
		gr.gr_id,
		gr.gr_description,
		gr.gr_date_of_publication,
		gr.gr_volume,
		gr.template_id,
		grc.gr_content_id,
		grc.gr_content_heading,
		grc.gr_cont_image,
		grc.gr_content_text,
		grc.gr_cont_publish_date,
		grc.disp_start_time
		FROM knwlg_gr_register as gr
		JOIN knwlg_gr_content as grc ON grc.gr_reg_id = gr.gr_id
		WHERE gr.status=3 AND DATE(gr.gr_date_of_publication) = DATE('".$date."') ORDER BY gr.gr_date_of_publication DESC ";
        $query = $CI->db->query($qry);
        $data_row= $query->result_array();
        return $data_row;
    }
}
#################################################################
if (! function_exists('get_progress_color')) {
    function get_progress_color($count)
    {
        $CI =& get_instance();
        $CI->db->select(
        '
		'
        );
        $qry="SELECT color from knwlg_session_progress_color WHERE from_percent<=".$count." AND to_percent>=".$count."";
        $query = $CI->db->query($qry);
        $data_row= $query->result_array();
        return $data_row[0]['color'];
    }
}
#################################################################
#################################################################
if (! function_exists('user_questions_by_mastersession_id')) {
    function user_questions_by_mastersession_id($session_id, $user_id)
    {
        $CI =& get_instance();
        $CI->db->select(
        '
		'
        );
        $qry="SELECT  kspd.question,kspd.upload_documents,kspd.sessions_participant_id
		FROM    knwlg_sessions_participant ksp
		INNER JOIN knwlg_sessions_participant_details kspd
		ON ksp.knwlg_sessions_participant_id=kspd.sessions_participant_id
		WHERE ksp.participant_id=".$user_id." AND
		ksp.knwlg_sessions_id=".$session_id."";
        $query = $CI->db->query($qry);
        $data_row= $query->row();
        return $data_row;
    }
}
#################################################################
#################################################################
if (! function_exists('get_logo_by_file_extension')) {
    function get_logo_by_file_extension($image_name)
    {
        $CI =& get_instance();
        $file_name_split= explode(".", $image_name);
        $spl_count=count($file_name_split);
        $spl_count=$spl_count-1;
        $file_type=$file_name_split[$spl_count];
        if (strtolower($file_type)=="jpg"||strtolower($file_type)=="jpeg"||strtolower($file_type)=="gif"||strtolower($file_type)=="png") {
            $image_name_logo="image_down.png";
        }
        if ($file_type=="doc"||$file_type=="docx") {
            $image_name_logo= "word_down.png";
        }
        if ($file_type=="pdf") {
            $image_name_logo= "pdf_down.png";
        }
        return 	$image_name_logo;
    }
}
#################################################################
#################################################################
if (! function_exists('download_zip')) {
    function download_zip()
    {
        $files = array('http://43.242.212.179/~devappv1clirnet/final/knowledge/themes/front/uploads/askclir_docs/pdf2.pdf');
        $zipname = 'file.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        foreach ($files as $file) {
            $zip->addFile($file);
        }
        $zip->close();
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);
    }
}
#################################################################
#################################################################
if (! function_exists('get_list_rating')) {
    function get_list_rating($postid = '', $rating = '', $myrating = '', $type = '')
    {
        if ($myrating) {
            $rateValue 	= $myrating;
            $readOnly	= 'false';
        } else {
            $rateValue 	= 4;
            $readOnly	= 'false';
        }
        if ($rating) {
            $avrate = $rating;
        } else {
            $avrate = 4.0;
        }
        $str = '<div class="avgrateme">Avg. Rating: <span>'.$avrate.'</span></div><div class="retme_container"><div class="retme_text">Rate Me : </div> <div id="rateYo'.$postid.'"></div>
		<div class="counter">'.$myrating.'</div></div>
		<script>
		$(function () {
			$("#rateYo'.$postid.'").rateYo({
			starWidth: "20px",
			rating: '.$rateValue.',
			fullStar: true,
			readOnly: '.$readOnly.',
			onChange: function (rating, rateYoInstance) {
				$(this).next().text(rating);
				},
			onSet: function (rating, rateYoInstance) {
				//alert("Rating is set to: " + rating);
				var postid = '.$postid.';
				var type = "'.$type.'";
				var rating = rating;
				$.ajax({
					url: "'.base_url().'kcap/rating",
					type: "POST",
					data: {postid:postid, type:type, rating:rating},
				success: function(msg)
				{
				  //alert(msg);
				},
				});
				}
			});
		});
		</script>';
        return $str;
    }
}





if (! function_exists('get_list_rating1')) {
    function get_list_rating1($postid = '', $rating = '', $myrating = '', $type = '')
    {
        if ($myrating) {
            $rateValue 	= $myrating;
            $readOnly	= 'false';
        } else {
            $rateValue 	= 4;
            $readOnly	= 'false';
        }
        if ($rating) {
            $avrate = $rating;
        } else {
            $avrate = 4.0;
        }
        $str = '<div class="avgrateme">Avg. Rating: <span>'.$avrate.'</span></div><div class="retme_container"><div class="retme_text">Rate Me : </div> <div id="rateYo1'.$postid.'"></div>
		<div class="counter">'.$myrating.'</div></div>
		<script>
		$(function () {
			$("#rateYo1'.$postid.'").rateYo({
			starWidth: "20px",
			rating: '.$rateValue.',
			fullStar: true,
			readOnly: '.$readOnly.',
			onChange: function (rating, rateYoInstance) {
				$(this).next().text(rating);
				},
			onSet: function (rating, rateYoInstance) {
				//alert("Rating is set to: " + rating);
				var postid = '.$postid.';
				var type = "'.$type.'";
				var rating = rating;
				$.ajax({
					url: "'.base_url().'kcap/rating",
					type: "POST",
					data: {postid:postid, type:type, rating:rating},
				success: function(msg)
				{
				  //alert(msg);
				},
				});
				}
			});
		});
		</script>';
        return $str;
    }
}
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
if (! function_exists('add_to_vault')) {
    function add_to_vault($postid, $type = '', $user_id)
    {
        $CI =& get_instance();
        $CI->db->select(
        '
		'
        );
        $qry="SELECT * FROM knwlg_vault WHERE user_id=".$user_id." AND type='".$type."' AND post_id=".$postid." AND status=1";
        $query = $CI->db->query($qry);
        $data_row = $query->row();
        if (empty($data_row)) {
            $str = '<span class="vault_span_'.$postid.'"><a class="text-uppercase font_12px addValue_link" href="javascript:void(0)" onclick="switch_vault('.$postid.','.$user_id.',1);"><img src="'.base_url().'themes/front/images/addVault.png" alt="icon" title="icon" class="value_img_add" width="14" height="18">
                   <img src="'.base_url().'themes/front/images/addVault-hover.png" alt="icon" title="icon" class="value_hover_img_add" width="16" height="19">
                   Add to vault</a></span>
				   ';
        } else {
            $str = '<span class="vault_span_'.$postid.'"><a class="text-uppercase font_12px addValue_link active" href="javascript:void(0)" onclick="switch_vault('.$postid.','.$user_id.',0);">
                   <img src="'.base_url().'themes/front/images/addVault.png" alt="icon" title="icon" class="value_img_add" width="14" height="18">
                   <img src="'.base_url().'themes/front/images/addVault-hover.png" alt="icon" title="icon" class="value_hover_img_add" width="16" height="19">
                   Remove From Vault</a></span>
		';
        }
        return $str;
    }
}
if (! function_exists('add_to_vault_for_my_vault')) {
    function add_to_vault_for_my_vault($postid, $type = '', $user_id)
    {
        $CI =& get_instance();
        $CI->db->select(
        '
		'
        );
        $qry="SELECT * FROM knwlg_vault WHERE user_id=".$user_id." AND type='".$type."' AND post_id=".$postid." AND status=1";
        $query = $CI->db->query($qry);
        $data_row = $query->row();
        if (empty($data_row)) {
            $str = '<span class="vault_span_'.$postid.'"><a class="text-uppercase font_12px addValue_link" href="javascript:void(0)" onclick="switch_vault('.$postid.','.$user_id.',1);"><img src="'.base_url().'themes/front/images/addVault.png" alt="icon" title="icon" class="value_img_add" width="14" height="18">
                   <img src="'.base_url().'themes/front/images/addVault-hover.png" alt="icon" title="icon" class="value_hover_img_add" width="16" height="19">
                   Add to vault</a></span>
				   ';
        } else {
            $str = '<span class="vault_span_'.$postid.'"><a class="text-uppercase font_12px addValue_link active" href="javascript:void(0)" onclick="switch_vault('.$postid.','.$user_id.',0,'.$type.');">
                   <img src="'.base_url().'themes/front/images/addVault.png" alt="icon" title="icon" class="value_img_add" width="14" height="18">
                   <img src="'.base_url().'themes/front/images/addVault-hover.png" alt="icon" title="icon" class="value_hover_img_add" width="16" height="19">
                   Remove From Vault</a></span>
		';
        }
        return $str;
    }
}
if (! function_exists('get_background_box_img')) {
    function get_background_box_img($category_id)
    {
        if ($category_id==1) {
            $classValue = " masterCast ";
        }
        if ($category_id==2) {
            $classValue = " masterConsult ";
        }
        if ($category_id==3) {
            $classValue = " masterCircle ";
        }
        return $classValue;
    }
}
if ( ! function_exists('get_image_by_ext'))
{
	function get_image_by_ext($image_name,$class_name,$height,$width) 
	{ 
		
	if($image_name!="")
	{
		if (file_exists("".FCPATH."uploads/kcap/image/".$image_name."")) 
		{
        $html_return='<img class="'.$class_name.'" height="'.$height.'px" width="'.$width.'px" src="'.base_url().'uploads/kcap/image/'.$image_name.'" title="'.$image_name.'">';
		}
		else
		{
		//echo $image_name; 
		$image_temp_name_array=explode(".",$image_name);
		$image_name_count= count($image_temp_name_array);
		$image_name_str="";
		for($i=0;$i<=$image_name_count-2;$i++)
		{
			if(isset($image_temp_name_array[$i]))
			{
				$image_name_str.=$image_temp_name_array[$i].".";
			}
		}
		$temp_image=$image_name_str."jpg";
		
		if (file_exists("".FCPATH."uploads/kcap/image/".$temp_image."")) 
		{
        $html_return='<img class="'.$class_name.'" height="'.$height.'px" width="'.$width.'px" src="'.base_url().'uploads/kcap/image/'.$temp_image.'" title="'.$image_temp_name_array[0].'">';
		}
		else 

		{
		$html_return='<img class="'.$class_name.'" height="'.$height.'px" width="'.$width.'px" src="'.base_url().'uploads/kcap/image/no_image.jpg" title="No Image">';
		}
	}
	
	}
	else
	{
		$html_return='<img class="'.$class_name.'" height="'.$height.'px" width="'.$width.'px" src="'.base_url().'uploads/kcap/image/no_image.jpg" title="No Image">';
	}
		
		

		return $html_return;			 
	}
}
if (! function_exists('get_doctor_image')) {
    function get_doctor_image($image_name, $class_name, $height, $width)
    {
        $CI =& get_instance();
        if ($image_name!="") {
            if (file_exists("".FCPATH."uploads/docimg/".$image_name."")) {
                $html_return='<img class="'.$class_name.'" height="'.$height.'px" width="'.$width.'px" src="'.base_url().'uploads/docimg/'.$image_name.'" title="doc_pr_image">';
            } else {
                $color_array=["1E90FF"];
                $fr_name=$CI->session->userdata['first_name'];
                $firstCharacter = substr($fr_name, 0, 1);
                $html_return='<div class="name_usr_icon" style="background-color:#'.$color_array[array_rand($color_array)].'"><span class="translate_both">'.$firstCharacter.'</span></div>';
            }
        } else {
            $color_array=["1E90FF"];
            $fr_name=$CI->session->userdata['first_name'];
            $firstCharacter = substr($fr_name, 0, 1);
            $html_return='<div class="name_usr_icon" style="background-color:#'.$color_array[array_rand($color_array)].'"><span class="translate_both">'.$firstCharacter.'</span></div>';
        }
        return $html_return;
    }
}


if (! function_exists('get_profile_image')) {
    function get_profile_image($image_name = '', $user_name = '', $class_name = '', $height = '', $width = '')
    {
        $CI =& get_instance();
        if ($image_name!="") {
            if (file_exists("".FCPATH."uploads/docimg/".$image_name."")) {
                $html_return='<img class="'.$class_name.'" height="'.$height.'px" width="'.$width.'px" src="'.base_url().'uploads/docimg/'.$image_name.'" title="doc_pr_image">';
            } else {
                $color_array=["21ad66"];
                $fr_name=$user_name;
                $firstCharacter = substr($fr_name, 0, 1);
                $html_return='<div class="name_usr_icon" style="background-color:#'.$color_array[array_rand($color_array)].'"><span class="translate_both">'.$firstCharacter.'</span></div>';
            }
        } else {
            $color_array=["21ad66"];
            $fr_name =$user_name;
            $firstCharacter = substr($fr_name, 0, 1);
            $html_return='<div class="name_usr_icon" style="background-color:#'.$color_array[array_rand($color_array)].'"><span class="translate_both">'.$firstCharacter.'</span></div>';
        }
        return $html_return;
    }
}


if (! function_exists('get_session_doctor_image')) {
    function get_session_doctor_image($image_name, $class_name, $height, $width, $doctor_name)
    {
        $CI =& get_instance();
        if ($image_name!="") {
            if (file_exists("".FCPATH."uploads/docimg/".$image_name."")) {
                $html_return='<img class="'.$class_name.'" height="'.$height.'px" width="'.$width.'px" src="'.base_url().'uploads/docimg/'.$image_name.'" title="doc_pr_image">';
            } else {
                $color_array=["1E90FF"];
                $fr_name=$doctor_name;
                $firstCharacter = substr($fr_name, 0, 1);
                $html_return='<div class="name_usr_icon" style="background-color:#'.$color_array[array_rand($color_array)].'"><span class="translate_both">'.$firstCharacter.'</span></div>';
            }
        } else {
            $color_array=["1E90FF"];
            $fr_name=$doctor_name;
            $firstCharacter = substr($fr_name, 0, 1);
            $html_return='<div class="name_usr_icon" style="background-color:#'.$color_array[array_rand($color_array)].'"><span class="translate_both">'.$firstCharacter.'</span></div>';
        }
        return $html_return;
    }
}








if ( ! function_exists('get_image_path_by_ext'))
{
	function get_image_path_by_ext($image_name) 
	{ 
		
	if($image_name!="")
	{
		if (file_exists("".FCPATH."uploads/kcap/image/".$image_name."")) 
		{
        $html_return=''.base_url().'uploads/kcap/image/'.$image_name.'';
		}
		else
		{
		//echo $image_name; 
		$image_temp_name_array=explode(".",$image_name);
		$image_name_count= count($image_temp_name_array);
		$image_name_str="";
		for($i=0;$i<=$image_name_count-2;$i++)
		{
			if(isset($image_temp_name_array[$i]))
			{
				$image_name_str.=$image_temp_name_array[$i].".";
			}
		}
		$temp_image=$image_name_str."jpg";
		
		if (file_exists("".FCPATH."uploads/kcap/image/".$temp_image."")) 
		{
        $html_return=''.base_url().'uploads/kcap/image/'.$temp_image.'';
		}
		else 

		{
		$html_return=''.base_url().'uploads/kcap/image/no_image.jpg';
		}
	}
	
	}
	else
	{
		$html_return=''.base_url().'uploads/kcap/image/no_image.jpg';
	}
		
		

		return $html_return;			 
	}
}






if (! function_exists('is_manual_seen')) {
    function is_manual_seen()
    {
       
		
		 $CI =& get_instance();
		$module_name= $CI->router->fetch_class();
		$user_id=$CI->session->userdata['user_master_id'];
		 $qry="SELECT * FROM master_manual_view WHERE user_id=".$user_id." AND type='".$module_name."'";
        $query = $CI->db->query($qry);
        $data_result= $query->result();
        if(empty($data_result))
		{
			
			 redirect('howtouse/openmanual/'.$module_name.'');
		}
		
		else
		{
			
		}
		
		return $output;
    }
}



if (! function_exists('get_option_by_question')) {
    function get_option_by_question($question_id)
    {
        $CI =& get_instance();
        $CI->db->select(
        '
		'
        );
        $qry="SELECT * FROM master_answer_options WHERE question_id=".$question_id." ORDER BY question_id ASC";
        $query = $CI->db->query($qry);
        $data_row= $query->result_array();
        return $data_row;
    }
}

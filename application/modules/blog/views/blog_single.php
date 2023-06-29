<style>
.s-title.pull-left h1 {
    width: 301px;
}
</style>

<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li><a href="<?php echo base_url()?>blog" title="Blog">Blog</a></li>
					<li><?php echo $blog_single_data[0]->blog_name;?></li>
				</ul>
			</nav>
			
			<!--//breadcrumbs-->
	
			<!--row-->
			<div class="row">
			    <header class="s-title pull-left">
					<h1><?php echo $blog_single_data[0]->blog_name;?></h1>
				</header>
				<header class="pull-right">
				 <div class="recipefinder recipefinder-all">
					<div class="search">
						<input type="search" placeholder="Find Blog by name">
						<input type="submit" value="Search">
					</div>
				 </div>
				</header>
				
				<!--content-->
				<section class="content three-fourth">
					<!--blog entry-->
					<?php foreach($blog_single_data as $res_single_data) { ?>
					<article class="post single">
						<div class="entry-meta">
							<div class="date">
								<span class="day"><?php echo date("d", strtotime($res_single_data->post_on));?></span> 
								<span class="my"><?php echo date("M", strtotime($res_single_data->post_on));?>, <?php echo date("Y", strtotime($res_single_data->post_on));?></span>
							</div>
							<div class="avatar">
								<a href="<?php echo base_url()?>/users/<?php echo $res_single_data->profile_url;?>"><img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$res_single_data->profile_photo?>" alt="" /><span><?php echo $res_single_data->full_name;?></span></a>
							</div>
						</div>
						<div class="container">
							<div class="entry-featured"><a href="#"><img src="<?php echo base_url()?>uploads/blog_image/<?=$res_single_data->feature_image?>" height="590px" width="790px" alt="" /></a></div>
							<div class="entry-content">
								<div class="lead"><?php echo $res_single_data->blog_description;?></div>
							</div>
							<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads.png" alt=""/></div>
						</div>
						
					</article>
					<?php } ?>
					<!--//blog entry-->
					
					<!--comments-->
					<div class="comments" id="comments">
						<h2><?php echo $comment_count->total; ?> comments </h2>
						<ol class="comment-list">
							<!--comment-->
							<?php $i=0;
							 foreach($blog_comments as $res_comments) { 
							 $i++;
							 $CI =& get_instance();
							$CI->load->model('Blog_model');
							$result = $CI->Blog_model->get_all_child_comments($res_single_data->blog_code,$res_comments->id);
							 
							 ?>
							 	
							
							<li class="comment depth-1" id="comment<?php echo $i;?>">
								
								<div class="avatar"><a href="<?php echo base_url()?>users"><img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$res_comments->profile_photo?>" alt="" /></a>
								</div>
								<div class="comment-box">
									<div class="comment-author meta"> 
										<strong><?php echo $res_comments->full_name;?></strong> 
										<?php
											 $date1 = $res_comments->rate_on;
											 $date2 = date("Y-m-d");
											

											$diff = abs(strtotime($date2) - strtotime($date1));

											$years = floor($diff / (365*60*60*24));
											$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
											$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
											if($years==0 && $months==0 && $days==0)
											{
												echo "Today's Blog Post";
											}
											elseif($years!=0)
											{
												echo $years." Years Ago";
											}
											elseif($months!=0)
											{
												echo $months." Months Ago";
											}
											elseif($days!=0)
											{
												echo $days." Days Ago";
											}
										?>
										
										<?php  if($this->session->userdata('is_logged_in')==1) { ?>
										<a href="javascript:void(0)" onclick="addReply(this.id)" id="reply<?php echo $i;?>" class="comment-reply-link"> Reply</a>
										<?php }else{ ?>
										<a href="<?php echo base_url();?>login" class="comment-reply-link">Logged in to reply</a>
										<?php } ?>
										
									</div>
									<div class="comment-text">
										<p><?php echo $res_comments->description;?></p>
									</div>
								
								<div class="reply" id="replyform<?php echo $i;?>" style="display: none">
									<form method="post" action="">
										<div class="f-row">
											<textarea placeholder="description" name="description" required="required"></textarea>
										</div>
										<input type="hidden" name="ref_code" id="ref_code" value="<?php echo $res_single_data->blog_code;?>">
										<input type="hidden" id="parent<?php echo $i;?>" name="parent" value="<?php echo $res_comments->id;?>">
										
										
										<div class="f-row">
											<div class="third bwrap">
												<input type="submit" value="Post comment" />
											</div>
										</div>							
									</form>
								</div>
								</div> 
								<ul>
								<?php 
								$s=500;
								foreach ($result['child_comments'] as $child_reply) {
							 	$CI =& get_instance();
								$CI->load->model('Blog_model');
								$result = $CI->Blog_model->get_all_child_comments($res_single_data->blog_code,$child_reply->id);
								$s++;	
								?>
									<li>
										<div class="avatar"><a href="<?php echo base_url()?>users"><img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$child_reply->profile_photo?>" alt="" /></a>
										</div>
								<div class="comment-box">
									<div class="comment-author meta"> 
										<strong><?php echo $child_reply->full_name;?></strong> 												<?php 
											 $date1 = $child_reply->rate_on;
											 $date2 = date("Y-m-d");
											

											$diff = abs(strtotime($date2) - strtotime($date1));

											$years = floor($diff / (365*60*60*24));
											$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
											$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
											if($years==0 && $months==0 && $days==0)
											{
												echo "Today's Blog Reply";
											}
											elseif($years!=0)
											{
												echo $years." Years Ago";
											}
											elseif($months!=0)
											{
												echo $months." Months Ago";
											}
											elseif($days!=0)
											{
												echo $days." Days Ago";
											}
										?>
										
										 <?php  if($this->session->userdata('is_logged_in')==1) { ?>
										<a href="javascript:void(0)" onclick="addtoReply(this.id)" id="reply<?php echo $s;?>" class="comment-reply-link"> Reply</a>
										<?php }else{ ?>
										<a href="<?php echo base_url();?>login" class="comment-reply-link">Logged in to reply</a>
										<?php } ?>
										
									</div>
									<div class="comment-text">
										<p><?php echo $child_reply->description;?></p>
									</div>
								</div> 
								<div class="reply" id="replytoform<?php echo $s;?>" style="display: none">
									<form method="post" action="">
										<div class="f-row">
											<textarea placeholder="description" name="description" required="required"></textarea>
										</div>
										<input type="hidden" name="ref_code" id="ref_code" value="<?php echo $res_single_data->blog_code;?>">
										<input type="hidden" id="parent<?php echo $s;?>" name="parent" value="<?php echo $child_reply->id;?>">
								
								
								<div class="f-row">
									<div class="third bwrap">
										<input type="submit" value="Post comment" />
									</div>
								</div>							
							</form>
								</div>
										
									</li>
									<?php }?>
								</ul>
							</li>
							<?php } ?>
							<!--//comment-->
						</ol>
					</div>
					<!--//comments-->
					
					<!--respond-->
					<div class="comment-respond" id="respond">
						<h2>Leave a Comment</h2>
						<div class="container" id="respond">
							<p><strong>Note:</strong> Comments on the web site reflect the views of their respective authors, and not necessarily the views of this web portal. Members are requested to refrain from insults, swearing and vulgar expression. We reserve the right to delete any comment without notice or explanations.</p>
							<p>Your email address will not be published. Required fields are signed with <span class="req">*</span></p>
							<?php  if($this->session->userdata('is_logged_in')==1) { ?>
							<form method="post" action="" id="comment">
								<div class="f-row">
									<textarea placeholder="description" name="description" required="required"></textarea>
								</div>
								<input type="hidden" name="ref_code" id="ref_code" value="<?php echo $res_single_data->blog_code;?>">
								<input type="hidden" id="parent" name="parent" value="0">
								
								<div class="f-row">
									<div class="third bwrap">
										<input type="submit" value="Post comment" />
									</div>
								</div>
								
								<!--<div class="bottom">
									<div class="f-row checkbox">
										<input type="checkbox" id="ch1" />
										<label for="ch1">Sign me up for the newsletter!</label>
									</div>
									<!--<div class="f-row checkbox">
										<input type="checkbox" id="ch2" />
										<label for="ch2">Notify me of new articles by email.</label>
									</div>
								</div>-->
							</form>
							<?php } else { ?>
							Please Register Your Account To Make Comments<a href="<?php echo base_url();?>user-registration">Register</a>
							<?php } ?>
						</div>
					</div>
					<!--//respond-->
				</section>
				<!--//content-->
			
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
					<div class="widget">
						<h3>Recipe Categories</h3>
						<ul class="boxed">
						<?php 
						$i=0;
						foreach($blog_category_data as $res_cat) { $i++;
						if($i%2==0){
							$class="light";
						}else{
							$class="dark";
						}
						 ?>
							<li class="<?php echo $class;?>"><a href="<?php echo base_url()?>blog/category/<?php echo $res_cat->slug;?>" title="<?php echo $res_cat->cat_name;?>"><i class="icon icon-themeenergy_pasta"></i> <span><?php echo $res_cat->cat_name;?></span></a></li>
							<?php } ?>
							
						</ul>
					</div>
					
					<div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-3.png" alt="" />
					</div>
				
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
<script>
	function addReply(replyid){
		var id=replyid.substr(5);
		
		$("#replyform"+id).show();
		$("#comment").hide();
		
		//alert(id);
	}
	function addtoReply(replyid){
		var id=replyid.substr(5);
		
		$("#replytoform"+id).show();
		$("#comment").hide();
		
		//alert(id);
	}
	
</script>
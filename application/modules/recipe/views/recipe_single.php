<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li><a href="<?php echo base_url()?>recipe" title="Recipe">Recipe</a></li>
					<li><?php echo $recipe_single_data[0]->recipe_name;?></li>
				</ul>
			</nav>
			
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1><?php echo $recipe_single_data[0]->recipe_name;?></h1>
				</header>
				<!--content-->
				<section class="content three-fourth">
					<!--recipe-->
						<div class="recipe">
							<?php foreach($recipe_single_data as $res_single_data) { ?>
							<div class="row">
								<!--two-third-->
								<article class="two-third">
									<div class="image"><a href="#"><img src="<?php echo base_url()?>uploads/recipe_image/<?=$res_single_data->feature_image?>" height="430px" width="570px" alt="" /></a></div>
									<div class="intro"><p><?php echo $res_single_data->description;?></p></div>
									<?php                                         
		                                $k = 0;
		                                for ($j = 0;$j < 5;$j++) {
		                                    if ($j < round($count_review_data->rating)) {
		                                        $k = $k + 1;                            
		                                        echo "<span class='fa fa-star checked' style='color: #999; font-size: 15px;'></span>";
		                                    }
		                                }
		                                for ($r = 0;$r < 5 - $k;$r++) {
		                                    echo "<span class='fa fa-star'></span>";
		                                }?>
		                                <?php  if($this->session->userdata('is_logged_in')==1) { ?>
										<a href="<?php echo base_url()?>makereview/recipe/<?php echo $res_single_data->slug;?>">Add Review</a>
                            		<?php }else{ ?>
                            			<a href="<?php echo base_url()?>login">Add Review</a>
									<?php } ?>
                            		
									<div class="instructions">
										<ol>
										<?php 
										$CI =& get_instance();
										$CI->load->model('Recipe_model');
										$result = $CI->Recipe_model->get_recipe_other_data($res_single_data->recipe_code);
										//print_r($result['instruction']);die();
										foreach($result['instruction'] as $res_ins){
											
											?>
											<li><?php echo $res_ins->name;?>
											<img src="<?php echo base_url()?>uploads/recipe_image/instruction/<?=$res_ins->images?>" height="480px" width="480px" alt="" /></li>
											<?php } ?>
										</ol>
									</div>
									
								</article>
								<!--//two-third-->
								
								<!--one-third-->
								<article class="one-third">
									<dl class="basic">
										<dt>Preparation time</dt>
										<dd><?php echo $res_single_data->preparetion_time;?> mins</dd>
										<dt>Cooking time</dt>
										<dd><?php echo $res_single_data->cook_time;?> mins</dd>
										<dt>Difficulty</dt>
										<dd><?php echo ucwords($res_single_data->tdn);?></dd>
										<dt>Serves</dt>
										<dd><?php echo $res_single_data->serving_people;?> people</dd>
									</dl>
									
									<dl class="user">
									<?php
										$categoriesJosn=json_decode($res_single_data->category);
										//print_r($categoriesJosn);
										
										for($cat=0;$cat<count($categoriesJosn);$cat++){
											//echo $categoriesJosn[$cat];
											$CI =& get_instance();
											$CI->load->model('Recipe_model');
											$result = $CI->Recipe_model->get_recipe_cat_data($categoriesJosn[$cat]);?>
											<dt>Category</dt>
											<dd><?php echo $result->cat_name;?></dd>
											
											<?php	} ?>
										<dt>Posted by</dt>
										<dd><?php echo $res_single_data->tuf;?></dd>
										<dt>Meal course</dt>
										<dd><?php echo $res_single_data->tmtn;?></dd>
										<dt>Posted on</dt>
										<dd>
											<?php echo date("M", strtotime($res_single_data->created_on));?> 
											<?php echo date("d", strtotime($res_single_data->created_on));?>, 
											<?php echo date("Y", strtotime($res_single_data->created_on));?>
										</dd>
									</dl>
									
									<dl class="ingredients">
									<?php
										$result = $CI->Recipe_model->get_recipe_other_data($res_single_data->recipe_code);
										foreach($result['ingredients'] as $ing){?>
										<dt><?php echo $ing->quantity;?>&nbsp;<?php echo $ing->unitname;?></dt>
										<dd><?php echo ucwords($ing->name);?></dd>
										<?php }
										foreach($result['nelement'] as $ne){															?>
										<dt><?php echo $ne->quantity;?>&nbsp;<?php echo $ne->unitname;?></dt>
										<dd><?php echo ucwords($ne->name);?></dd>
										
										<?php } ?> 
										
										
									</dl>
								</article>
								<!--//one-third-->
							</div>
							<?php } ?>
							<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-2.png" alt=""/></div>
						</div>
						<!--//recipe-->
							
						<!--comments-->
						<div class="comments" id="comments">
							<h2>
							<?php echo $comment_count->total; ?> Comments 
							</h2>                            
							<ol class="comment-list">
								<!--comment-->
								<?php $i=0;
									 foreach($recipe_comments as $res_comments) { 
									 $i++;
									 $CI =& get_instance();
									$CI->load->model('Recipe_model');
									$result = $CI->Recipe_model->get_all_child_comments($res_single_data->recipe_code,$res_comments->id);
							 
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
												echo "Today's Recipe Post";
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
										<input type="hidden" name="ref_code" id="ref_code" value="<?php echo $res_single_data->recipe_code;?>">
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
								$s=0;
								foreach ($result['child_comments'] as $child_reply) {
							 	$CI =& get_instance();
								$CI->load->model('Recipe_model');
								$result = $CI->Recipe_model->get_all_child_comments($res_single_data->recipe_code,$child_reply->id);
								$s++;	
								?>
									<li class="">
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
												echo "Today's Recipe Reply";
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
								
								<div class="reply" id="replytoform<?php echo $s;?>" style="display: none">
									<form method="post" action="">
										<div class="f-row">
											<textarea placeholder="description" name="description" required="required"></textarea>
										</div>
										<input type="hidden" name="ref_code" id="ref_code" value="<?php echo $res_single_data->recipe_code;?>">
										<input type="hidden" id="parent<?php echo $s;?>" name="parent" value="<?php echo $child_reply->id;?>">
								
								
								<div class="f-row">
									<div class="third bwrap">
										<input type="submit" value="Post comment" />
									</div>
								</div>							
							</form>
								</div>
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
							<h2>Leave a reply</h2>
							<div class="container">
								<p><strong>Note:</strong> Comments on the web site reflect the views of their respective authors, and not necessarily the views of this web portal. Members are requested to refrain from insults, swearing and vulgar expression. We reserve the right to delete any comment without notice or explanations.</p>
								<p>Your email address will not be published. Required fields are signed with  <span class="req">*</span></p>
								<?php  if($this->session->userdata('is_logged_in')==1) { ?>
								<form method="post" action="" id="comment">
								<div class="f-row">
									<textarea placeholder="description" name="description" required="required"></textarea>
								</div>
								<input type="hidden" name="ref_code" id="ref_code" value="<?php echo $res_single_data->recipe_code;?>">
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
						foreach($recipe_category_data as $res_cat) { $i++;
						if($i%2==0){
							$class="light";
						}else{
							$class="dark";
						}
						 ?>
							<li class="<?php echo $class;?>"><a href="<?php echo base_url()?>recipe/category/<?php echo $res_cat->slug;?>" title="<?php echo $res_cat->cat_name;?>"><i class="icon icon-themeenergy_pasta"></i> <span><?php echo $res_cat->cat_name;?></span></a></li>
							<?php } ?>
							
						</ul>
						
					</div>
					
					<div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-3.png" alt="deb" />
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
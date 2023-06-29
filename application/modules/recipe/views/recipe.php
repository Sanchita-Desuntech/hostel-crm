<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li>Recipe</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title pull-left">
					<h1>Recipes</h1>
				</header>
				<header class="pull-right">
				 <div class="recipefinder recipefinder-all">
					<div class="search">
						<input type="search" placeholder="Find Recipe by name">
						<input type="submit" value="Search">
					</div>
				 </div>
				</header>
				<div class="clearfix"></div>
				<!--content-->
				<section class="content three-fourth">
					<!--entries-->
					<div class="entries row">
						<!--item-->
						<?php foreach($recipe_data as $res_rcp) { ?>
						<div class="entry one-third">
							<figure>
								<img src="<?php echo base_url()?>uploads/recipe_image/<?=$res_rcp->feature_image?>" height="203px" width="270px" alt="" / />
								<figcaption><a href="<?php echo base_url()?>recipe/<?php echo $res_rcp->slug;?>"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
							</figure>
							<div class="container">
								<h2><a href="<?php echo base_url()?>recipe/<?php echo $res_rcp->slug;?>"><?php echo $res_rcp->recipe_name;?></a></h2> 
								
								<?php 
									$CI =& get_instance();
									$CI->load->model('Recipe_model');
									$result_data = $CI->Recipe_model->count_review($res_rcp->recipe_code);
									?>
								
								<?php                                         
		                           $k = 0;
		                             for ($j = 0;$j < 5;$j++) {
		                                    if ($j < round($result_data->rating)) {
		                                        $k = $k + 1;                            
		                                        echo "<span class='fa fa-star checked' style='color: #999; font-size: 15px;'></span>";
		                                    }
		                                }
		                                for ($r = 0;$r < 5 - $k;$r++) {
		                                    echo "<span class='fa fa-star'></span>";
		                         }?>
								<div class="actions">
									<div>
										<div class="difficulty">
										<?php if($res_rcp->diff_name=='easy') { ?>
										<i class="ico i-easy"></i>
										<?php } elseif($res_rcp->diff_name=='hard') { ?>
										<i class="ico i-hard"></i>
										<?php } elseif($res_rcp->diff_name=='moderate'){?>
										<i class="ico i-medium"></i>
										<?php } ?>
										<a href="<?php echo base_url()?>recipe/<?php echo $res_rcp->slug;?>"><?php echo $res_rcp->diff_name;?>
										</a>
										</div>
										<!--<div class="likes"><i class="fa fa-heart"></i><a href="#">10</a></div>-->
										<div class="comments"><i class="fa fa-comment"></i><a href="<?php echo base_url()?>recipe/<?php echo $res_rcp->slug;?>#comments">
										<?php 
											$CI =& get_instance();
											$CI->load->model('Recipe_model');
											$result_data = $CI->Recipe_model->count_comments($res_rcp->recipe_code);
											echo  $result_data->total;
											
											?>	
										</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<!--item-->
						
						<!--<div class="quicklinks">
							<a href="#" class="button">More recipes</a>
							<a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
						</div>-->
					</div>
					<!--//entries-->
					<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
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
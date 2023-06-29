<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li>Featured Blog</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title pull-left">
					<h1>Featured Blog</h1>
				</header>
				<header class="pull-right">
				 <div class="recipefinder recipefinder-all">
					<div class="search">
						<input type="search" placeholder="Find Blog by name">
						<input type="submit" value="Search">
					</div>
				 </div>
				</header>
				<div class="clearfix"></div>
				
				<!--content-->
				<section class="content three-fourth">
					<!--blog entry-->
					<?php
					foreach($blog_featured_data as $res_blog) { 
					//$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $res_blog->full_name)));
					?>
					<article class="post">
						<div class="entry-meta">
							<div class="date">
								<span class="day"><?php echo date("d", strtotime($res_blog->post_on));?></span> 
								<span class="my"><?php echo date("M", strtotime($res_blog->post_on)); ?>, 
								<?php echo  date("Y", strtotime($res_blog->post_on)); ?></span>;
							</div>
							<div class="avatar">
								<a href="<?php echo base_url()?>/users/<?php echo $res_blog->profile_url;?>"><img src="<?php echo base_url()?>uploads/users/profile_photo/<?=$res_blog->profile_photo?>" alt="" /><span><?php echo $res_blog->full_name;?></span></a>
							</div>
						</div>
						<div class="container">
							<div class="entry-featured"><a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>"><img src="<?php echo base_url()?>uploads/blog_image/<?=$res_blog->feature_image?>" height="205px" width="270px" alt="" /></a></div>
							<div class="entry-content">
								<h2><a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>"><?php echo $res_blog->blog_name;?></a></h2>
								<p><?php echo $res_blog->blog_description;?></p>
							</div>
							<div class="actions">
								<div>
									<div class="category"><i class="fa fa-tags"></i><a href="<?php echo base_url()?>blog/category/<?php echo $res_blog->tcs;?>"><?php echo ucwords($res_blog->cat_name);?></a></div>
									<div class="comments"><i class="fa fa-comment"></i>
									<a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>#comments">
									<?php 
									$CI =& get_instance();
									$CI->load->model('Blog_model');
									$result_data = $CI->Blog_model->count_comments($res_blog->blog_code);
									echo  $result_data->total;
									
									?>
									</a>
									</div>
									<div class="leave_comment"><a href="<a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>#respond">Leave a comment</a></div>
									<div class="more"><a href="<?php echo base_url()?>blog/<?php echo $res_blog->slug;?>">Read more</a></div>
								</div>
							</div>
						</div>
					</article>
					<?php } ?>
					<!--//blog entry-->
					<div class="pager">
						<a href="#">1</a>
						<a href="#" class="current">2</a>
						<a href="#">3</a>
						<a href="#">4</a>
						<a href="#">5</a>
					</div>
					<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-2.png" alt=""/></div>
				</section>
				<!--//content-->
				
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
					<div class="widget">
						<h3>Blog Categories</h3>
						
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
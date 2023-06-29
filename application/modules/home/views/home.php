<section class="container-fluid">
	<div class="row">
		<div id="slides">
			<?php foreach($get_home_slider as $res_slider) {
				//print_r($get_home_slider); die("here"); ?>
		      <div>
		        <img width="100%" src="<?php echo base_url()?>uploads/slider_image/<?=$res_slider->image_src?>" alt="">
		        <div class="banner-text">
		        </div>
		      </div>
		      <?php } ?>
		      <!--<div>
		        <img src="<?php echo base_url()?>themes/front/images/slider-2.jpg" alt="">
		        <div class="banner-text">
		        </div>
		      </div>-->
		 </div>
	</div>
</section>
				

<?php foreach($drop_down_menulist as $dropdownmenulist)
//print_r($dropdownmenulist->id); die("here"); 
{ ?>
<section class="container-fluid releases-wrap pd">
	<div class="row">
		<div class="container">
			<div class="row">
			
			   <div class="pull-left">
			   		<h3 class="color-white pd-left"><?php echo $dropdownmenulist->cat_name;?></h3>
			   </div>
			   
			   <div class="color-white pull-right"><a href="<?php echo base_url();?>category/<?php echo $dropdownmenulist->slug;?>">See More <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
			   <div class="clearfix"></div>
			   
			   <div class="slider responsive">
			   <?php 
			   		foreach($post_list as $res_post) {
			    	if($res_post->movie_category == $dropdownmenulist->id)
			    	{ ?>
                    <div class="testbox">
						  <a href="<?php echo base_url()?>movies/<?php echo $res_post->movies_slug; ?>"><img src="<?php echo base_url()?>uploads/movies_image/<?=$res_post->feature_image; ?>" alt="" class="img-responsive" /></a>
					</div>
				<?php } } ?>
					
					
                </div>
			</div>
		</div>
	</div>
</section>

<?php } ?>

<section class="container-fluid footer-camp pd">
	<div class="row">
		<div class="container">
			<div class="row">
			   <div class="col-lg-4">
			   
			   	<h4><i class="fa fa-facebook-official" aria-hidden="true"></i> Get Social With Us</h4>
                <p>Connect with Redbox on Facebook to join the conversation</p>
                <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="100%" height="auto" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			   </div>
			   <div class="col-lg-4">
			   	<h4><i class="fa fa-mobile" aria-hidden="true"></i> Join Redbox Text Club</h4>
                <p>Get members-only deals sent straight to your phone</p>
                <a href="<?php echo base_url()?>userregistration" class="btn">Join Now</a>
			   </div>
			   <div class="col-lg-4">
			   	<h4><i class="fa fa-envelope" aria-hidden="true"></i> Stay In The Loop</h4>
                <p>Be the first to hear about new releases and special offers by email</p>
                <a href="<?php echo base_url()?>login" class="btn">Log In</a>
			   </div>
			</div>
		</div>
	</div>
</section>
<section class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
			   
			</div>
		</div>
	</div>
</section>
<section class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
			   
			</div>
		</div>
	</div>
</section>
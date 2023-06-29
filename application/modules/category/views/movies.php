<section class="container-fluid releases-wrap pd">
	<div class="row">
		<div class="container">
			<div class="row">
			   <div class="pull-left"><h3 class="color-white pd-left"><?php echo $get_post[0]->cat_name ?></h3></div>
			   <!--<div class="color-white pull-right"><a href="">See More <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>-->
			   <div class="clearfix"></div>
					<?php
			   		foreach($get_post as $res_movie) { ?>
                    <div class="load">
						  <a href="<?php echo base_url()?>movies/<?php echo $res_movie->movies_slug; ?>">
						  <img src="<?php echo base_url()?>uploads/movies_image/<?=$res_movie->feature_image; ?>" alt="" class="img-responsive" /></a>
					</div>
					<?php } ?>
					<div class="clearfix"></div>
					<a href="#" id="loadMore">Load More</a>
			</div>
		</div>
	</div>
</section>
<section class="container-fluid ads-wrap pd">
	<div class="row">
		<div class="container">
			<div class="row">
			 <div class="col-lg-121">
			  <a href=""><img src="<?php echo base_url()?>themes/front/images/ads.jpg" alt="" class="img-responsive" /></a>
			 </div> 
			</div>
		</div>
	</div>
</section>
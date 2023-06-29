<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #000;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<section class="container-fluid releases-wrap pd">
	<div class="row">
		<div class="container">
			<div class="row">
			   <!--<div class="pull-left"><h3 class="color-white pd-left">New Releases & Back At The Box</h3></div>
			   <div class="color-white pull-right"><a href="">See More <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>-->
			 
			   <div class="clearfix"></div>
               <div class="col-lg-9">
               	<div class="video-wrap">
               	<?php if($this->session->userdata('is_logged_in')==1) { ?>
               	
	               	<?php
	               	//print_r($movie_single_data);die("kl");
	               	  if ($movie_single_data->full_video_upload) { ?>
	               	<video width="100%" controls>
	               	
					  <source src="<?php echo base_url()?>uploads/videos/full_video/<?php echo $movie_single_data->full_video_upload?>" type="video/mp4" />
					  
					</video> 
					
					<?php } else { ?>
					
					<iframe width="100%" src="<?php echo $movie_single_data->full_video_link; ?>"></iframe>
					
					<?php } ?>
					 <a class="join-btn" id="trailer_video">Click here to watch Trailer video</a>
					 
					<div id="myModal" class="modal">
						
				  <!-- Modal content -->
						<div class="modal-content">
					    <span class="close">&times;</span>
					  <?php if ($movie_single_data->full_video_upload) {?>
					   <video width="100%" controls>
							<source src="<?php echo base_url()?>uploads/videos/trailer_video/<?php echo $movie_single_data->trailer_video_upload?>" type="video/mp4" />
						</video>
					 <?php }else{?>
					 <iframe width="100%" src="<?php echo $movie_single_data->trailer_video_link; ?>"></iframe>
					 <?php } ?>
					  </div>
					</div>
					
				
				<?php } else { ?>
				
					<?php if ($movie_single_data->trailer_video_upload) { ?>
					<video width="100%" controls>
						<source src="<?php echo base_url()?>uploads/videos/trailer_video/<?php echo $movie_single_data->trailer_video_upload?>" type="video/mp4" />
					</video>
					<?php } else { ?>
					  <iframe style="display: block" src="<?php echo $movie_single_data->trailer_video_link; ?>"></iframe>
					  
					<?php } ?>
					<a class="join-btn" href="<?php echo base_url()?>login">Click here to watch full video</a>
				
				<?php } ?>
				


				<h3 class="color-white"><?php echo $movie_single_data->movies_name; ?></h3>
				<p><?php echo $movie_single_data->movie_summary; ?></p>
					</div>
					</div>
               <div class="col-lg-3">
               <div class="sidebar">
                <h3 class="color-white">Related Video</h3>
                <?php
			   		foreach($related_movie as $res_movie) {
			    	if($movie_single_data->movies_slug!=$res_movie->movies_slug) { 
			    ?>
               	<div class="related">
               		<a href="<?php echo base_url()?>movies/<?php echo $res_movie->movies_slug; ?>">
               			<img src="<?php echo base_url()?>uploads/movies_image/<?=$res_movie->feature_image; ?>" class="img-responsive" alt="" />
               		</a>
               		<div class="time">30:00</div>
               	</div>
               	<?php } } ?>
               	
               	</div>
               </div>
               <div class="clearfix"></div>
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

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("trailer_video");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php
 function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}
?>
<?php $data_settings = get_settings_data();  ?>    

        <section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Placement</h1>
					<ul class="list-unstyled">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li class="active">Placement</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
    	      <?php foreach($pages_data as $pagesdata){?>
              <div class="container">
              <div class="row">
              <div class="col-lg-12" style="position:relative;">
              <div class="marquetext"> <marquee><?php echo $pagesdata->extra_descrip;?></marquee></div>
              </div></div>
              </div>
    	<section class="about-ds" style="padding-top:60px; padding-bottom: 0px;">
		<div class="container">
			<div class="row">
            
	            <div class="col-md-12 col-sm-12 about-ds-content corporatecont">
				  
                    <div class="section-header03">
						<h2><?php echo $pagesdata->heading_title;?></h2>
					</div>
                    <div class="corpocnt">
              
					<p><?php echo $pagesdata->descrip;?></p>
                    </div>
                   
                    
                    <div class="clearfix"></div>
					
                    
            	</div>
          
			</div>
		</div>
	</section>
	 <?php } ?>

<section class="">
		<div class="container events">
			<div class="row">

              <?php foreach($get_placement_data as $result_placement){?>
               <div class="col-lg-12 placembox">

               	<div class="section-header header-dark text-center">
					 <h2><?php echo $result_placement->title;?></h2>

					<span><img src="<?php echo base_url()?>themes/front/images/edu-icon.png" alt="Our success story"></span>

                 <br/>
                 </div>
	           
				<div class="col-md-12" >
                 <div class="placecntbx">
                 	<img src="<?php echo base_url();?>uploads/placementc_image/<?php echo $result_placement->image_src ;?>">
                  <?php echo $result_placement->descrip ;?>
                  </div>
				</div>
               </div>

               <?php } ?>
			</div>
		</div>
	</section>


       <section class="clients-logo">
		<div class="container">
		<div class="row text-center">
	            <div class="col-sm-12 section-header header-dark">
	                <h2>Our students  <span>placed companies</span></h2>
					<span><img src="<?php echo base_url()?>themes/front/images/edu-icon.png" alt="Our student placed companies"></span>
	            </div>
			</div>
			<div class="row">
				<div class="col-sm-12 clients-logo-slider owl-carousel">
                <?php foreach($get_client_logo as $clientdata){?>
					<div class="clogo">
						<img src="<?php echo base_url()?>uploads/client_image/<?php echo $clientdata->image_src;?>" alt="<?php echo $clientdata->title;?>" class="img-responsive">
					</div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </section>
		
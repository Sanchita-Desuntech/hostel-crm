<!--main-->
	<section class="container-fluid releases-wrap pd">
		<!--wrap-->
		<div class="wrap clearfix">
			
			<!--row-->
			<?php foreach($pages_data as $res_data) { ?>
			<div class="row">
				<div class="s-title">
					<h1 class="color-white"><?php echo $res_data->title ?></h1>
				</div>
				<!--content-->
				<section class="content three-fourth">
					<!--one-half-->
					<section class="container" style="color: #ffffff">
					<?php if($res_data->image_src =='') { ?>
						<p><?php echo $res_data->descrip ?></p>
					<?php } else { ?>
					<div class="row">
						<div class="container">
							<div class="row">
								<img src="<?php echo base_url()?>uploads/pages_image/<?=$res_data->image_src; ?>" class="img-responsive" alt="" />
								<p style="color: #ffffff"><?php echo $res_data->descrip; ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
					</section>
					<!--//one-half-->
				</section>
				<!--//content-->
			</div>
			<?php } ?>
			<!--//row-->
		</div>
		<!--//wrap-->
	</section>
	<!--//main-->
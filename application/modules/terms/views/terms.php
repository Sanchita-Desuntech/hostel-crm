<section class="container-fluid releases-wrap pd">
<?php foreach($pages_data as $res_data) { ?> 
	<h2 class="color-white"><?php echo $res_data->title; ?></h2><br>
	<?php if($res_data->image_src =='') { ?>
	<div>
		<?php echo $res_data->descrip; ?>
	</div>
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
<?php } ?>
</<section>

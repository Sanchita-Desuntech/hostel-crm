<section id="main-content">
	<section class="wrapper">
		<!-- page start-->

		<div class="row">
			<div class="col-lg-12">
				<?php if ($this->session->flashdata('success_msg') != "") { ?>
					<div class="clearfix"></div>
					<div class="alert alert-success">
						<strong>Success!</strong> <?php $this->session->flashdata('success_msg'); ?>
					</div>
				<?php } ?>
				<?php if ($this->session->flashdata('err_msg') != "") { ?>
					<div class="clearfix"></div>
					<div class="alert alert-danger">
						<strong>Danger!</strong> <?= $this->session->flashdata('err_msg'); ?>
					</div>
				<?php } ?>
				<section class="panel">
					<header class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h3>Edit Service</h3>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>admin/service" class="btn btn-danger flotright">Back</a>
							</div>
						</div>
					</header>
					<?php
					foreach ($allservice_row as $singledata) { ?>
						<form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
							<div class="panel-body">
								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">

										<div class="form-group">
											<label for="service_name">Service Name *</label>
											<input name="service_name" type="text" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->service_name; ?>">
											<?php echo form_error('service_name', '<div class="error">', '</div>'); ?>
										</div>

										<div class="form-group">
											<label for="inputslidercaption3">Service Description</label>
											<textarea name="service_desp" class="form-control editor_big" placeholder="Enter Service Description"><?php echo $singledata->service_desp; ?></textarea>
											<?php echo form_error('service_desp', '<div class="error">', '</div>'); ?>
										</div>

										<div class="form-group">
											<label for="inputslidercaption">Service Type</label>
											<select name="service_type" class="form-control">
												<option value="Prepaid" <?php if ($singledata->service_type == 'Prepaid') {
																			echo "selected";
																		} ?>>Prepaid</option>
												<option value="Postpaid" <?php if ($singledata->service_type == 'Postpaid') {
																				echo "selected";
																			} ?>>Postpaid</option>
											</select>
										</div>

										<div class="form-group">
											<label for="inputslidercaption">Service Status</label>
											<select name="ser_status" class="form-control">
												<option value="1" <?php if ($singledata->ser_status == 1) {
																		echo "selected";
																	} ?>>Active</option>
												<option value="0" <?php if ($singledata->ser_status == 0) {
																		echo "selected";
																	} ?>>Inactive</option>
											</select>
										</div>
									</div>
								</div>

							</div>
							<div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
						</form>
					<?php } ?>
				</section>

			</div>
		</div>
		<!-- page end-->
	</section>
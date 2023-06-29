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
								<h3>Add Package</h3>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>admin/package" class="btn btn-danger flotright">Back</a>
							</div>
						</div>
					</header>
					<div class="panel-body">
						<div>
							<form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
								<div class="panel-body">
									<div class="tab-content">
										<div id="home" class="tab-pane fade in active">
											<div class="form-group">
												<label for="package_name">Name *</label>
												<input name="package_name" value="<?php echo set_value('package_name'); ?>" type="text" class="form-control" placeholder="Enter Package Name*">
												<?php echo form_error('package_name', '<div class="error">', '</div>'); ?>
											</div>
											<div class="form-group">
												<label for="inputslidercaption3">Package Description</label>
												<textarea name="package_desp" class="form-control editor_big" placeholder="Enter Package Description"><?php echo set_value('package_desp'); ?></textarea>

											</div>


											<div class="form-group">
												<label for="package_hours">Package Hours *</label>
												<input name="package_hours" value="<?php echo set_value('package_hours'); ?>" type="text" class="form-control" placeholder="Enter package Hours*">
												<?php echo form_error('package_hours', '<div class="error">', '</div>'); ?>
											</div>
											<div class="form-group">
												<label for="package_price">Package Price(in INR) *</label>
												<input name="package_price" value="<?php echo set_value('package_price'); ?>" type="text" class="form-control" placeholder="Enter Package Price*">
												<?php echo form_error('package_price', '<div class="error">', '</div>'); ?>
											</div>

											<div class="form-group">
												<label for="inputslidercaption">Status</label>
												<select name="status" class="form-control">
													<option value="active">Active</option>
													<option value="inactive">Inactive</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer"> <button type="submit" class="btn btn-info">Add</button></div>
							</form>
						</div>

					</div>
				</section>

			</div>
		</div>
		<!-- page end-->
	</section>
</section>
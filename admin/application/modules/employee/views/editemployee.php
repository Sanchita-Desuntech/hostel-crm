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
								<h3>Edit Employee</h3>
							</div>
							<div class="col-md-6">
								<a href="<?php echo base_url(); ?>admin/employee" class="btn btn-danger flotright">Back</a>
							</div>
						</div>
					</header>
					<?php foreach ($allemployee_row as $singledata) { ?>
						<form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
							<div class="panel-body">
								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div class="form-group">
											<label for="full_name">Name*</label>
											<input name="full_name" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" type="text" class="form-control" placeholder="Enter Name*" value="<?php echo $singledata->full_name; ?>">
											<?php echo form_error('full_name', '<div class="error">', '</div>'); ?>
										</div>

										<div class="form-group">
											<label for="mobile">Mobile*</label>
											<input name="mobile" required maxlength="10" type="number" class="form-control" placeholder="Enter Mobile*" value="<?php echo $singledata->mobile; ?>">
											<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
										</div>
										<div class="form-group">
											<label for="mobile">Address*</label>
											<textarea name="address" required class="form-control"><?= $singledata->address ?></textarea>
											<?php echo form_error('address', '<div class="error">', '</div>'); ?>
										</div>
										<div class="form-group">
											<img src="<?php echo base_url() ?>uploads/users/profile_photo/<?= $singledata->profile_photo ?>" height=100px; width=100px;>
											<label for="inputslidercaption">Profile Image</label>
											<input type="file" name="profile_photo" accept="image/*" />
											<input name="prev_link" type="hidden" value="<?= $singledata->profile_photo ?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
											<p class="help-block" style="color:red;">Please Select Only Image.</p>
										</div>

										<div class="form-group">

											<label for="inputslidercaption3">
												<h4>Permissions</h4>
											</label>

											<div class="clearfix"></div>

											<?php foreach($system_module_permissions as $module) : ?>
												<div class="col-md-3" style="border-bottom: 1px solid; height: 160px;">
													
													<p style="margin-top: 13px;"><?= $module->name ?></p>

													<?php foreach($module->actions as $action) : ?>
														<div class="checker">
															<input type="checkbox" name="module_actions[]" value="<?= $action['action_id'] ?>" <?= in_array($action['action_id'], $user_module_actions) ? 'checked' : ''  ?>>
															<label for="uniq-label"><?= $action['action_name'] ?></label>
														</div>
													<?php endforeach ?>
												</div>
											<?php endforeach ?>

											<div class="clearfix"></div>
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
<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
	}

	/* The Modal (background) */
	.modal {
		display: none;
		/* Hidden by default */
		position: fixed;
		/* Stay in place */
		z-index: 1;
		/* Sit on top */
		padding-top: 100px;
		/* Location of the box */
		left: 0;
		top: 0;
		width: 100%;
		/* Full width */
		height: 100%;
		/* Full height */
		overflow: auto;
		/* Enable scroll if needed */
		background-color: rgb(0, 0, 0);
		/* Fallback color */
		background-color: rgba(0, 0, 0, 0.4);
		/* Black w/ opacity */
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
		color: #aaaaaa;
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

<section id="main-content">
	<section class="wrapper">
		<!-- page start-->

		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading">
						<h3>Task Management

							<span class="tools pull-right">
								<a href="javascript:;" class="fa fa-chevron-down"></a>
								<!--<a href="javascript:;" class="fa fa-times"></a>-->
							</span>
						</h3>

					</header>
					<div class="panel-body" style="display: block;">
						<?php if ($this->session->flashdata('success_msg') != "") { ?>
							<div class="clearfix"></div>
							<div class="alert alert-success">
								<strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
							</div>
						<?php } ?>

						<?php if ($this->session->flashdata('err_msg') != "") { ?>
							<div class="clearfix"></div>
							<div class="alert alert-danger">
								<strong>Sorry!</strong> <?= $this->session->flashdata('err_msg'); ?>
							</div>
						<?php } ?>
						<div class="adv-table editable-table ">
							<div class="clearfix">
								<div class="btn-group">
									<a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url() ?>client/task/addtask">
										Add New <i class="fa fa-plus"></i>
									</a>
								</div>
								<div class="btn-group pull-right">
									<!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>-->
								</div>
								<div class="space15"></div>
								<table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
									<thead>
										<tr>
											<th>SL No.</th>
											<th>Task Name</th>
											<th>Service Name</th>
											<th>Task Priority</th>
											<th>Task Status</th>
											<th>Task Hours</th>
											<th>Start Date</th>
											<th>Priority</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										foreach ($alltask_row as $alldata) {
										?>
											<tr class="">
												<td><?php echo $i; ?></td>
												<td><?php echo $alldata->task_name; ?></td>
												<td><?php echo $alldata->service_name; ?></td>
												<td><?php echo $alldata->task_priority; ?></td>
												<td><?php echo $alldata->task_status; ?></td>
												<td><?php echo $alldata->task_hours; ?></td>
												<td><?php echo $alldata->created_on; ?></td>
												<td><?php echo $alldata->task_priority; ?></td>
												<td>
													<?php if ($alldata->status == 0) { ?>
														<a class="view_data" href="<?php echo base_url(); ?>client/task/details/<?php echo $alldata->task_id; ?>"><i class="fa fa-eye"></i></a> &nbsp;
														<a class="edit_data" href="<?php echo base_url(); ?>client/task/edittask/<?php echo $alldata->task_id; ?>"><i class="fa fa-edit"></i></a> &nbsp;
													<?php } else { ?>
														<a class="view_data" href="<?php echo base_url(); ?>client/task/details/<?php echo $alldata->task_id; ?>"><i class="fa fa-eye"></i></a> &nbsp;
													<?php } ?>

												</td>
											</tr>
										<?php $i++;
										} ?>

									</tbody>
								</table>


								<br />
							</div>
						</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
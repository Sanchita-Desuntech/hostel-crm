<style>
	.advanced-dialog {
		width: 50%;
		min-height: 350px;
		border: 1px solid #eee0e0;
		margin: 0 auto;
		top: 23%;
		border: 1px solid #eee0e0;
		position: absolute;
	}
</style>

<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading">
						<h3>Customer Management</h3>
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
									<a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url() ?>admin/customer/addcustomer">
										Add New <i class="fa fa-plus"></i>
									</a>
								</div>
								<div class="btn-group pull-right">
									<button class="btn btn-success btn-sm" id="advancedSearch">Advanced Search</button>
								</div>
								<div class="space15"></div>
								<div class="table-responsive">
									<table class="table table-striped table-bordered " id="data-customer" style="width:100%;">
										<thead>
											<tr>
												<th>Name</th>
												<th>Mobile</th>
												<th>Email</th>
												<th>Time Wallet</th>
												<th>Profile Photo</th>
												<th>Created On</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
									</table>
								</div>
								<br />
							</div>
						</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<style></style>

<dialog class="advanced-dialog" id="advancedSearchModal">

	<div class="">
		<div class="col-md-6">
			<h4 style="margin-bottom: 30px;">Advanced Search</h4>
		</div>
		<div class="col-md-6">
			<button class="btn btn-primary btn-sm pull-right" id="clearSearch">Clear Search</button>
		</div>
	</div>
	<div class="clearfix"></div>

	<hr />
	<div>
		<div class="col-md-6">
			<label>Customer Name</label>
			<input type="text" id="customer_name" class="form-control" />
		</div>
		<div class="col-md-6">
			<label>Customer Email</label>
			<input type="email" id="customer_email" class="form-control" />
		</div>
	</div>
	<div class="clearfix"></div>
	<div style="margin-top: 30px;">
		<div class="col-md-6">
			<label>From</label>
			<input type="date" id="joined_from" class="form-control" />
		</div>
		<div class="col-md-6">
			<label>To</label>
			<input type="date" id="joined_to" class="form-control" />
		</div>
	</div>
	<div class="clearfix"></div>

	<div style="margin-top: 30px;">
		<div class="col-md-6">
			<label>Customer Mobile</label>
			<input type="text" id="customer_mobile" class="form-control" />
		</div>
	</div>

	<div class="clearfix"></div>

	<hr />

	<div style="margin-top: 30px;">
		<div class="col-md-6">
			<button class="btn btn-danger btn-sm" id="closeModalBtn">Cancel</button>
		</div>
		<div class="col-md-6">
			<button class="btn btn-info btn-sm pull-right" id="applyFilter">Apply Filter</button>
		</div>
	</div>
	<div class="clearfix"></div>
</dialog>

<script type="text/javascript">
	function myJsFunc_comdel(dataid, dataimg) {
		if (confirm("Are you sure that you want to delete the data?")) {
			window.location.href = "<?php echo base_url() ?>admin/customer/delete_data/" + dataid + '/' + dataimg;
		}
	}

	window.addEventListener("load", (e) => {
		let table = $("#data-customer").DataTable({
			dom: 'rt<"bottom"p>',
			processing: true,
            serverSide: true,
            ajax: "<?= base_url('admin/customer/datatable') ?>",
            lengthChange: true,
            columns: [
                { "data": "name"},
                { "data": "mobile" },
                { "data": "email"},
                { "data": "time_wallet" },
                { "data": "profile_photo"},
                { "data": "created_on"},
                { "data": "status"},
                { "data": "action", "orderable" : false, "searchable": false}
            ]
		});

		const modal = document.getElementById("advancedSearchModal");

		$("#applyFilter").click(function(e) {

			var customerName = $('#customer_name').val().trim();
			var customerEmail = $('#customer_email').val().trim();
			var joinedFrom = $('#joined_from').val().trim();
			var joinedTo = $('#joined_to').val().trim();
			var customerMobile = $('#customer_mobile').val().trim();


			const searchParms = new URLSearchParams({
				customerName: customerName,
				customerEmail: customerEmail,
				joinedFrom: joinedFrom,
				joinedTo: joinedTo,
				customerMobile: customerMobile
			})

			table.search( searchParms.toString() ).draw();
			modal.close();
		});

		$('#advancedSearch').click(function(e) {
			modal.showModal();
		});

		$("#closeModalBtn").click(function() {
			modal.close();
		});

		$("#clearSearch").click(function() {
			$('#customer_name').val('');
			$('#customer_email').val('');
			$('#joined_from').val('')
			$('#joined_to').val('')
			$('#customer_mobile').val('')
		});
	});
</script>
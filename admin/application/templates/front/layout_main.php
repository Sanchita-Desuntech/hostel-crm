<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">



	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="">

	<meta name="author" content="iNetworkExperts">

	<meta name="robots" content="index, nofollow" />

	<link rel="shortcut icon" href="<?php echo base_url() ?>themes/admin/images/favicon.png" type="image/x-icon">

	<link rel="icon" href="<?php echo base_url() ?>themes/admin/images/favicon.png" type="image/x-icon">

	<title><?php echo $title; ?></title>

	<!--Core CSS -->

	<link href="<?php echo base_url() ?>themes/admin/bs3/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>themes/admin/css/bootstrap-reset.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>themes/admin/css/dropzone.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>themes/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

	<!-- Custom styles for this template -->

	<link href="<?php echo base_url() ?>themes/admin/css/style.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>themes/admin/css/style-responsive.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>themes/admin/js/bootstrap-datepicker/css/datepicker.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>themes/admin/js/bootstrap-timepicker/css/timepicker.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>themes/admin/js/bootstrap-colorpicker/css/colorpicker.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>themes/admin/js/bootstrap-datetimepicker/css/datetimepicker.css">
	<script src="<?php echo base_url() ?>themes/admin/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>



<body>



	<section id="container">

		<!--header start-->

		<header class="header fixed-top clearfix">

			<!--logo start-->

			<div class="brand">

				<?php if ($this->session->userdata('user_type') == '1') {  ?>
					<a href="<?php echo base_url(); ?>admin/employee" class="logo">

						<center><img src="<?php echo base_url() ?>themes/front/images/logo2.png" style="width: 83%; margin: 10%" alt=""></center>

					</a>
				<?php } elseif ($this->session->userdata('user_type') == '3') { ?>
					<a href="<?php echo base_url(); ?>admin/supervisor" class="logo">

						<center><img src="<?php echo base_url() ?>themes/front/images/logo2.png" style="width: 83%; margin: 10%" alt=""></center>

					</a>
				<?php } else { ?>
					<a href="<?php echo base_url(); ?>admin/home" class="logo">

						<center><img src="<?php echo base_url() ?>themes/front/images/logo2.png" style="width: 83%; margin: 10%" alt=""></center>

					</a>
				<?php } ?>
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars"></div>
				</div>

			</div>

			<!--logo end-->



			<div class="nav notify-row" id="top_menu">



			</div>

			<div class="top-nav clearfix">

				<!--search & user info start-->

				<ul class="nav pull-right top-menu">

					<!--  <li>

						<input type="text" class="form-control search" placeholder=" Search">

					</li>-->

					<!-- user login dropdown start-->

					<li class="dropdown">

						<a data-toggle="dropdown" class="dropdown-toggle" href="#">

							<?php if ($this->session->userdata('profile_photo') == '') { ?>
								<img alt="" src="<?php echo base_url() ?>uploads/users/profile_photo/default.png">
							<?php } else { ?>
								<img alt="" src="<?php echo base_url() ?>uploads/users/profile_photo/<?php echo $this->session->userdata('profile_photo') ?>">
							<?php } ?>

							<span class="username"><?php echo $this->session->userdata('full_name'); ?></span>

							<b class="caret"></b>

						</a>

						<ul class="dropdown-menu extended logout">
							<?php if ($this->session->userdata('user_type') == '1') {  ?>
								<li><a href="<?php echo base_url() ?>admin/employeee/profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
								<li><a href="<?php echo base_url('admin/employeee/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
							<?php } elseif ($this->session->userdata('user_type') == '3') { ?>
								<li><a href="<?php echo base_url() ?>admin/supervisorr/profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
								<li><a href="<?php echo base_url('admin/supervisorr/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
							<?php } else { ?>
								<li><a href="<?php echo base_url() ?>admin/profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
								<li><a href="<?php echo base_url('admin/login/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
							<?php } ?>
						</ul>

					</li>
					
				</ul>

			</div>

		</header>

		<!--header end-->

		<!--sidebar start-->

		<?php include __DIR__ . '/sidebar-menu.php' ?>

		<!--sidebar end-->
		<?php
		/*

		<aside>

			<div id="sidebar" class="nav-collapse">

				<!-- sidebar menu start-->
				<?php if ($this->session->userdata('user_type') == '4') { ?>
					<div class="leftside-navigation">
						<!-- for temporary purpose -->
						<?php if (1 == 1) { ?>
							<ul class="sidebar-menu" id="nav-accordion">

								<li>
									<a href="<?php echo base_url(); ?>admin/home">
										<i class="fa fa-dashboard"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<!-- Previous menu backup available on 01.10.2019 backup -->
								<?php
								$this->db->select('*');
								// $this->db->from('tbl_menu_child');
								// $this->db->join('tbl_menu_parent', 'tbl_menu_parent.id = tbl_menu_child.parent_id', 'left');
								$query = $this->db->get('tbl_menu_parent');
								// echo $this->db->last_query();die();
								$results = $query->result();
								foreach ($results as $result) {
								?>
									<li class="sub-menu">
										<a href="javascript:;">
											<?php echo  $result->menu_icon; ?>
											<span><?php echo  $result->menu_name; ?></span>
											<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
										</a>
										<ul class="sub">
											<?php $this->db->select('*');
											$this->db->where('parent_id =', $result->id);
											$query = $this->db->get('tbl_menu_child');
											$cresults = $query->result();
											//echo $this->db->last_query();die();
											foreach ($cresults as $cresult) {
											?>
												<li><a href="<?php echo base_url() ?>admin/<?php echo $cresult->menu_slug; ?>"><i class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $cresult->menu_name; ?> </a></li>
												<!--          <li><a href="<?php echo base_url() ?>admin/payment"><i class="fa fa-circle-o" aria-hidden="true"></i>Complete Payment </a></li>--> <?php } ?>
										</ul>
									</li>
								<?php } ?>
							</ul>
						<?php } ?>
						<!-- //end -->
						
					</div>
				<?php } else if ($this->session->userdata('user_type') == '3') { ?>

					<div class="leftside-navigation">
						<?php if (1 == 1) { ?>
							<ul class="sidebar-menu" id="nav-accordion">
								<li>
									<a href="<?php echo base_url(); ?>admin/supervisorr">
										<i class="fa fa-dashboard"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li class="sub-menu">
									<a href="javascript:;">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Employee Management</span>
										<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
									</a>
									<ul class="sub">

										<li><a href="<?php echo base_url() ?>admin/supervisorr"><i class="fa fa-circle-o" aria-hidden="true"></i> Employee</a></li>
									</ul>
								</li>
								<li class="sub-menu">
									<a href="javascript:;">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Task Management</span>
										<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
									</a>
									<ul class="sub">
										<li><a href="<?php echo base_url() ?>admin/supervisorr/task"><i class="fa fa-circle-o" aria-hidden="true"></i> Task</a></li>
									</ul>
								</li>
								<?php
								//First getting all the menu ids stored in database against the user id 
								$this->db->select('menu_ids');
								$this->db->where('user_id', $this->session->userdata('user_code'));
								$query = $this->db->get('tbl_menu_access');

								$results = $query->result();
								$child_menu_id_array = json_decode($results['0']->menu_ids);

								//Then getting parent ids from tbl_child_menu   
								foreach ($child_menu_id_array as $child_menu_id) {
									$this->db->select('tbl_menu_parent.*');
									$this->db->from('tbl_menu_parent');
									$this->db->join('tbl_menu_child', 'tbl_menu_parent.id = tbl_menu_child.parent_id', 'left');
									$this->db->where('tbl_menu_child.id', $child_menu_id);
									$query = $this->db->get();
									//echo $this->db->last_query();die();
									$results_parent_menu = $query->result();


									foreach ($results_parent_menu as $result) {
								?>
										<li class="sub-menu">
											<a href="javascript:;">
												<?php echo  $result->menu_icon; ?>
												<span><?php echo  $result->menu_name; ?></span>
												<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
											</a>
											<ul class="sub">
												<?php $this->db->select('*');
												$this->db->where('parent_id =', $result->id);
												$query = $this->db->get('tbl_menu_child');
												$cresults = $query->result();
												//echo $this->db->last_query();die();
												foreach ($cresults as $cresult) {
												?>
													<li><a href="<?php echo base_url() ?>admin/<?php echo $cresult->menu_slug; ?>"><i class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $cresult->menu_name; ?> </a></li>
													<!--          <li><a href="<?php echo base_url() ?>admin/payment"><i class="fa fa-circle-o" aria-hidden="true"></i>Complete Payment </a></li>--> <?php } ?>
											</ul>
										</li>
									<?php } ?>
								<?php } ?>
							</ul>
						<?php } ?>
					</div>
				<?php } else if ($this->session->userdata('user_type') == '2') { ?>
					<!--  <div class="leftside-navigation">
          <ul class="sidebar-menu" id="nav-accordion">

            <li>
              <a href="<?php echo base_url(); ?>admin/home">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user" aria-hidden="true"></i>
                <span>Profile Management</span>
              <i class="fa fa-angle-down iconright" aria-hidden="true"></i>
            </a>
            <ul class="sub">
              <li><a href="<?php echo base_url() ?>admin/customer"><i class="fa fa-circle-o" aria-hidden="true"></i> Customer</a></li>
            </ul>
            </li>
          </ul>
        </div>-->
				<?php } else if ($this->session->userdata('user_type') == '1') { ?>
					<div class="leftside-navigation">
						<?php if (1 == 2) { ?>
							<ul class="sidebar-menu" id="nav-accordion">
								<li>
									<a href="<?php echo base_url(); ?>admin/employeee">
										<i class="fa fa-dashboard"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li class="sub-menu">
									<a href="javascript:;">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Task Management</span>
										<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
									</a>
									<ul class="sub">
										<li><a href="<?php echo base_url() ?>admin/employeee/"><i class="fa fa-circle-o" aria-hidden="true"></i> Task </a></li>
									</ul>
								</li>
								<li class="sub-menu">
									<a href="javascript:;">
										<i class="fa fa-user" aria-hidden="true"></i>
										<span>Chat Section</span>
										<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
									</a>
									<ul class="sub">
										<li><a href="<?php echo base_url() ?>admin/employeee/task"><i class="fa fa-circle-o" aria-hidden="true"></i> Chat </a></li>
									</ul>
								</li>
								<?php
								//First getting all the menu ids stored in database against the user id 
								$this->db->select('menu_ids');
								$this->db->where('user_id', $this->session->userdata('user_code'));
								$query = $this->db->get('tbl_menu_access');
								// echo $this->db->last_query();die();
								$results = $query->result();
								$child_menu_id_array = json_decode($results['0']->menu_ids);

								//Then getting parent ids from tbl_child_menu   
								foreach ($child_menu_id_array as $child_menu_id) {
									$this->db->select('tbl_menu_parent.*');
									$this->db->from('tbl_menu_parent');
									$this->db->join('tbl_menu_child', 'tbl_menu_parent.id = tbl_menu_child.parent_id', 'left');
									$this->db->where('tbl_menu_child.id', $child_menu_id);
									$query = $this->db->get();
									//echo $this->db->last_query();die();
									$results_parent_menu = $query->result();


									foreach ($results_parent_menu as $result) {
								?>
										<li class="sub-menu">
											<a href="javascript:;">
												<?php echo  $result->menu_icon; ?>
												<span><?php echo  $result->menu_name; ?></span>
												<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
											</a>
											<ul class="sub">
												<?php $this->db->select('*');
												$this->db->where('parent_id =', $result->id);
												$query = $this->db->get('tbl_menu_child');
												$cresults = $query->result();
												//echo $this->db->last_query();die();
												foreach ($cresults as $cresult) {
												?>
													<li><a href="<?php echo base_url() ?>admin/<?php echo $cresult->menu_slug; ?>"><i class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $cresult->menu_name; ?> </a></li>
													<!--          <li><a href="<?php echo base_url() ?>admin/payment"><i class="fa fa-circle-o" aria-hidden="true"></i>Complete Payment </a></li>--> <?php } ?>
											</ul>
										</li>
									<?php } ?>
								<?php } ?>



							</ul>
						<?php } ?>
						<ul class="sidebar-menu" id="nav-accordion">
							<li>
								<a href="https://ehostingguru.com/stage/valogical/admin/employeee">
									<i class="fa fa-dashboard"></i>
									<span>Dashboard</span>
								</a>
							</li>
							<li class="sub-menu dcjq-parent-li">
								<a href="javascript:;" class="dcjq-parent">
									<i class="fa fa-user" aria-hidden="true"></i>
									<span>Task Management</span>
									<i class="fa fa-angle-down iconright" aria-hidden="true"></i>
									<span class="dcjq-icon"></span></a>
								<ul class="sub" style="display: none;">
									<li><a href="https://ehostingguru.com/stage/valogical/admin/employeee/"><i class="fa fa-circle-o" aria-hidden="true"></i> Task </a></li>
								</ul>
							</li>
						</ul>
					</div>
				<?php } ?>
				<!-- sidebar menu end-->

			</div>

		</aside>

		*/ ?>

		

		<!--main content start-->

		<?php echo $template['body']; ?>



		<!-- Placed js at the end of the document so the pages load faster -->



		<!--Core js-->



		<script src="<?php echo base_url() ?>themes/admin/bs3/js/bootstrap.min.js"></script>

		<script class="include" type="text/javascript" src="<?php echo base_url() ?>themes/admin/js/jquery.dcjqaccordion.2.7.js"></script>

		<script src="<?php echo base_url() ?>themes/admin/js/jquery.scrollTo.min.js"></script>

		<script src="<?php echo base_url() ?>themes/admin/js/jQuery-slimScroll-1.3.0\jquery.slimscroll.js"></script>

		<script src="<?php echo base_url() ?>themes/admin/js/jquery.nicescroll.js"></script>
		<script src="<?php echo base_url() ?>themes/admin/js/dropzone.js"></script>





		<script type="text/javascript" src="<?php echo base_url() ?>themes/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>



		<script type="text/javascript" src="<?php echo base_url() ?>themes/admin/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

		<script type="text/javascript" src="<?php echo base_url() ?>themes/admin/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>


		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

		<!--common script init for all pages-->

		<script src="<?php echo base_url() ?>themes/admin/js/scripts.js"></script>


		<link rel="stylesheet" href="<?php echo base_url() ?>themes/admin/vendor/datatables/dataTables.bootstrap.css">

		<link rel="stylesheet" href="<?php echo base_url() ?>themes/admin/vendor/responsive-tables/responsivetables.css">

		<script src="<?php echo base_url() ?>themes/admin/vendor/datatables/jquery.dataTables.min.js"></script>

		<script src="<?php echo base_url() ?>themes/admin/vendor/datatables/dataTables.bootstrap.min.js"></script>

		<script src="<?php echo base_url() ?>themes/admin/vendor/responsive-tables/responsivetables.js"></script>

		
		<?php if(!is_null($this->session->flashdata('permission_error'))) : ?>
		<script>
			window.addEventListener("load", () => {
				Toastify({
					text: "<?= $this->session->flashdata('permission_error') ?>",
					duration: 3000,
					newWindow: true,
					close: true,
					gravity: "top", // `top` or `bottom`
					position: "right", // `left`, `center` or `right`
					stopOnFocus: true, // Prevents dismissing of toast on hover
					style: {
						background: "linear-gradient(to right, #00b09b, #96c93d)",
					},
					onClick: function(){} // Callback after click
				}).showToast();
			});
		</script>
		<?php endif ?>


		
		<script type="text/javascript">
			$(document).ready(function() {

				$('#datepick').datepicker({

					format: 'yyyy-mm-dd',

					autoclose: true

				});

				$('#datepick2').datepicker({

					format: 'yyyy-mm-dd',

					autoclose: true

				});

			});



			$(function() {

				$('input[type="time"][value="now"]').each(function() {

					var d = new Date(),

						h = d.getHours(),

						m = d.getMinutes();

					if (h < 10) h = '0' + h;

					if (m < 10) m = '0' + m;

					$(this).val(h + ':' + m);

				});

			});

			// jQuery
			$("div#dropzone").dropzone({
				url: "/file/post"
			});
		</script>


		<script>
			$(function() {
				$('#tabledata_customer thead tr')
					.clone(true)
					.addClass('filters')
					.appendTo('#tabledata_customer thead');
					
				$("#tabledata_customer").DataTable({
					orderCellsTop: true,
					fixedHeader: true,
					initComplete: function() {
						var api = this.api();

						// For each column
						api
							.columns()
							.eq(0)
							.each(function(colIdx) {
								// Set the header cell to contain the input element
								var cell = $('.filters th').eq(
									$(api.column(colIdx).header()).index()
								);
								var title = $(cell).text();
								$(cell).html('<input type="text" style="width: 100%;" placeholder="' + title + '" />');

								// On every keypress in this input
								$(
										'input',
										$('.filters th').eq($(api.column(colIdx).header()).index())
									)
									.off('keyup change')
									.on('change', function(e) {
										// Get the search value
										$(this).attr('title', $(this).val());
										var regexr = '({search})'; //$(this).parents('th').find('select').val();

										var cursorPosition = this.selectionStart;
										// Search the column for that value
										api
											.column(colIdx)
											.search(
												this.value != '' ?
												regexr.replace('{search}', '(((' + this.value + ')))') :
												'',
												this.value != '',
												this.value == ''
											)
											.draw();
									})
									.on('keyup', function(e) {
										e.stopPropagation();

										$(this).trigger('change');
										$(this)
											.focus()[0]
											.setSelectionRange(cursorPosition, cursorPosition);
									});
							});
					},
				});

				$("#tabledata").DataTable();

				$(".dataTables_filter input").addClass("dataTable_search");

			});

			$(function() {

				$("#tabledata2").DataTable();

				$(".dataTables_filter input").addClass("dataTable_search");

			});
			$(function() {

				$("#tabledata3").DataTable();

				$(".dataTables_filter input").addClass("dataTable_search");

			});
			$(document).ready(function() {

				$('#rockies_table').DataTable({

					"order": [
						[0, "asc"]
					]

				});



				$('#alluser_table').DataTable({

					"order": [
						[0, "desc"]
					]

				});



				$('#common_table').DataTable({

					"order": [
						[0, "asc"]
					]

				});



				$('.mn_common_table').DataTable({

					"order": [
						[0, "asc"]
					]

				});



				$('#rank_table').DataTable({

					"order": [
						[4, "DESC"]
					]

				});



			});
		</script>

		<script type="text/javascript">
			$(document).ready(function() {

				var table = $('#example').DataTable({

					responsive: true

				});

			});
		</script>









		<script src="<?php echo base_url() ?>themes/admin/tinymce/tinymce.min.js"></script>



		<script>
			tinymce.init({

				selector: ".editor_big",

				height: 175,

				force_br_newlines: true,

				force_p_newlines: false,

				forced_root_block: '',

				automatic_uploads: true,

				paste_data_images: true,

				link_assume_external_targets: true,

				relative_urls: false,

				remove_script_host: false,

				convert_urls: true,

				toolbar: 'codesample | bold italic sizeselect fontselect fontsizeselect | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | insertfile undo redo | forecolor backcolor emoticons | code',

				fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",



				plugins: [

					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

					"save table contextmenu directionality emoticons template paste textcolor  colorpicker textpattern codesample"
				],



				style_formats: [

					{
						title: 'Headers',
						items: [

							{
								title: 'h1',
								block: 'h1'
							},

							{
								title: 'h2',
								block: 'h2'
							},

							{
								title: 'h3',
								block: 'h3'
							},

							{
								title: 'h4',
								block: 'h4'
							},

							{
								title: 'h5',
								block: 'h5'
							},

							{
								title: 'h6',
								block: 'h6'
							}

						]
					},



					{
						title: 'Blocks',
						items: [

							{
								title: 'p',
								block: 'p'
							},

							{
								title: 'div',
								block: 'div'
							},

							{
								title: 'pre',
								block: 'pre'
							}

						]
					},



					{
						title: 'Containers',
						items: [

							{
								title: 'section',
								block: 'section',
								wrapper: true,
								merge_siblings: false
							},

							{
								title: 'article',
								block: 'article',
								wrapper: true,
								merge_siblings: false
							},

							{
								title: 'blockquote',
								block: 'blockquote',
								wrapper: true
							},

							{
								title: 'hgroup',
								block: 'hgroup',
								wrapper: true
							},

							{
								title: 'aside',
								block: 'aside',
								wrapper: true
							},

							{
								title: 'figure',
								block: 'figure',
								wrapper: true
							}

						]
					}

				],

				visualblocks_default_state: false,

				end_container_on_empty_block: false,



				add_unload_trigger: false,



				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample code",



				image_advtab: true,

				image_caption: true,

				spellchecker_callback: function(method, data, success) {

					if (method == "spellcheck") {

						var words = data.match(this.getWordCharPattern());

						var suggestions = {};



						for (var i = 0; i < words.length; i++) {

							suggestions[words[i]] = ["First", "second"];

						}



						success({
							words: suggestions,
							dictionary: true
						});

					}



					if (method == "addToDictionary") {

						success();

					}

				}









			});


			tinymce.init({

				selector: ".editor_big_days",

				height: 175,

				force_br_newlines: true,

				force_p_newlines: false,

				forced_root_block: '',

				automatic_uploads: true,

				paste_data_images: true,

				link_assume_external_targets: true,

				relative_urls: false,

				remove_script_host: false,

				convert_urls: true,

				toolbar: 'codesample | bold italic sizeselect fontselect fontsizeselect | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | insertfile undo redo | forecolor backcolor emoticons | code',

				fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",



				plugins: [

					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",

					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

					"save table contextmenu directionality emoticons template paste textcolor  colorpicker textpattern codesample"
				],



				style_formats: [

					{
						title: 'Headers',
						items: [

							{
								title: 'h1',
								block: 'h1'
							},

							{
								title: 'h2',
								block: 'h2'
							},

							{
								title: 'h3',
								block: 'h3'
							},

							{
								title: 'h4',
								block: 'h4'
							},

							{
								title: 'h5',
								block: 'h5'
							},

							{
								title: 'h6',
								block: 'h6'
							}

						]
					},



					{
						title: 'Blocks',
						items: [

							{
								title: 'p',
								block: 'p'
							},

							{
								title: 'div',
								block: 'div'
							},

							{
								title: 'pre',
								block: 'pre'
							}

						]
					},



					{
						title: 'Containers',
						items: [

							{
								title: 'section',
								block: 'section',
								wrapper: true,
								merge_siblings: false
							},

							{
								title: 'article',
								block: 'article',
								wrapper: true,
								merge_siblings: false
							},

							{
								title: 'blockquote',
								block: 'blockquote',
								wrapper: true
							},

							{
								title: 'hgroup',
								block: 'hgroup',
								wrapper: true
							},

							{
								title: 'aside',
								block: 'aside',
								wrapper: true
							},

							{
								title: 'figure',
								block: 'figure',
								wrapper: true
							}

						]
					}

				],

				visualblocks_default_state: false,

				end_container_on_empty_block: false,



				add_unload_trigger: false,



				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample code",



				image_advtab: true,

				image_caption: true,

				spellchecker_callback: function(method, data, success) {

					if (method == "spellcheck") {

						var words = data.match(this.getWordCharPattern());

						var suggestions = {};



						for (var i = 0; i < words.length; i++) {

							suggestions[words[i]] = ["First", "second"];

						}



						success({
							words: suggestions,
							dictionary: true
						});

					}



					if (method == "addToDictionary") {

						success();

					}

				}









			});
		</script>





		<script type="text/javascript">
			$(document).ready(function() {

				var next = 0;

				$("#add-more").click(function(e) {

					e.preventDefault();

					var addto = "#field" + next;

					var addRemove = "#field" + (next);

					next = next + 1;



					var editorID = 'editor_big' + next;



					var newIn = '<div id="field' + next + '" name="field' + next + '"><div class="form-group"><label for="inputslidercaption">Question Title</label><input name="question_title[]" type="text" class="form-control"  placeholder="Enter Question Title"></div> <div class="form-group"><label for="inputslidercaption">Description</label><textarea name="question_descrip[]"  class="form-control editor_big" id="editor_big' + next + '" placeholder="Enter Question Description"></textarea></div></div>';

					var newInput = $(newIn);

					var removeBtn = '<button type="button" id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button><br><br></div></div><div id="field">';

					var removeButton = $(removeBtn);

					$(addto).after(newInput);

					$(addRemove).after(removeButton);

					$("#field" + next).attr('data-source', $(addto).attr('data-source'));

					$("#count").val(next);



					tinymce.EditorManager.execCommand('mceAddEditor', false, editorID);

					tinymce.EditorManager.execCommand('mceAddControl', false, editorID);



					$('.remove-me').click(function(e) {



						e.preventDefault();

						//tinymce.execCommand('mceRemoveControl', true, editorID);

						var fieldNum = this.id.charAt(this.id.length - 1);

						var fieldID = "#field" + fieldNum;

						$(this).remove();

						$(fieldID).remove();

					});





				});



			});





			$(document).ready(function() {

				var next_days = 0;

				$("#add_days").click(function(e) {





					e.preventDefault();

					var addto_days = "#field_days" + next_days;

					var addRemove_days = "#field_days" + (next_days);

					next_days = next_days + 1;



					var editorID1 = 'editor_big_days' + next_days;



					var newIn_days = '<div id="field_days' + next_days + '" name="field_days' + next_days + '"><div class="form-group"><label for="inputslidercaption">Day Number</label><input name="days_num[]" type="text" class="form-control"  placeholder="Enter Day Nuumber"></div> <div class="form-group"><label for="inputslidercaption">Description</label><textarea name="days_descrip[]"  class="form-control editor_big_days" id="editor_big_days' + next_days + '" placeholder="Enter Days Description"></textarea></div></div>';

					var newInput_days = $(newIn_days);

					var removeBtn_days = '<button type="button" id="remove_days' + (next_days - 1) + '" class="btn btn-danger removeme" >Remove</button><br><br></div></div><div id="field_days">';

					var removeButton_days = $(removeBtn_days);

					$(addto_days).after(newInput_days);

					$(addRemove_days).after(removeButton_days);

					$("#field_days" + next_days).attr('data-source', $(addto_days).attr('data-source'));

					$("#count_days").val(next_days);



					tinymce.EditorManager.execCommand('mceAddEditor', false, editorID1);

					tinymce.EditorManager.execCommand('mceAddControl', false, editorID1);



					$('.removeme').click(function(e) {



						e.preventDefault();

						//tinymce.execCommand('mceRemoveControl', true, editorID);

						var fieldNum = this.id.charAt(this.id.length - 1);

						var fieldID = "#field_days" + fieldNum;

						$(this).remove();

						$(fieldID).remove();

					});





				});



			});



			function upcoming_batch(upval)

			{

				if (upval == 'yes')

				{

					$('#batchtime').show();

				} else

				{

					$('#batchtime').hide();

				}



			}





			$(document).ready(function() {

				var next_batchtime = 0;

				$("#add_batchtime").click(function(e) {





					e.preventDefault();

					var addto_batchtime = "#field_batchtime" + next_batchtime;

					var addRemove_batchtime = "#field_batchtime" + (next_batchtime);

					next_batchtime = next_batchtime + 1;







					var newIn_batchtime = '<div id="field_batchtime' + next_batchtime + '" name="field_batchtime' + next_batchtime + '"><div class="form-group"><label for="inputslidercaption">Batch Date Time</label><input name="batch_time_all[]" type="text" class="form-control"  placeholder="Enter Batch Time"></div></div>';

					var newInput_batchtime = $(newIn_batchtime);

					var removeBtn_batchtime = '<button type="button" id="remove_batchtime' + (next_batchtime - 1) + '" class="btn btn-danger removeme" >Remove</button><br><br></div></div><div id="field_batchtime">';

					var removeButton_batchtime = $(removeBtn_batchtime);

					$(addto_batchtime).after(newInput_batchtime);

					$(addRemove_batchtime).after(removeButton_batchtime);

					$("#field_batchtime" + next_batchtime).attr('data-source', $(addto_batchtime).attr('data-source'));

					$("#count_batchtime").val(next_batchtime);





					$('.removeme').click(function(e) {



						e.preventDefault();

						//tinymce.execCommand('mceRemoveControl', true, editorID);

						var fieldNum = this.id.charAt(this.id.length - 1);

						var fieldID = "#field_batchtime" + fieldNum;

						$(this).remove();

						$(fieldID).remove();

					});





				});



			});
		</script>
</body>

</html>
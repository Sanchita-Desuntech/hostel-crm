<?php 
require_once("config.php") ;
require_once("inc/header.php"); 
if (isset($_POST['submit'])) {


    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    $err = [];
    if ($name == "") {
        $err["name"] = "Please enter name";
    }
    if ($email == "") {
        $err['email'] = "Email is Required";
    }
    if ($subject == "") {
        $err["subject"] = "Please enter a subject";
    }
    if ($phone == "") {
        $err["phone"] = "phone Number is Required";
    }
    if (empty($err)) {

        $query = "INSERT INTO `contact`(`name`, `email`, `subject`, `phone`, `message`) VALUES ('$name','$email','$subject','$phone','$message')";
        //Print_r($query);
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $msg['messsage'] = 'massage submit successfully';
        } else {
            $msg['messsage'] = 'massage not submit successfully ';

        }
    }
		//else{
			//if(!($name == "")){
				//$fill['name'] = $name;
			//}
			//if(!($email == "")){
				//$fill['email'] = $email;
			//}
			//if(!($subject == "")){
				//$fill['subject'] = $subject;
			//}
			//if(!($phone == ""){
				//$fill['phone'] = $phone;
			//}

		//}
}


      ?>
		<!--End Main Header -->

		<!-- Start main-content -->
		<section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
			<div class="auto-container">
				<div class="title-outer">
					<h1 class="title">Contact Us</h1>
					<ul class="page-breadcrumb">
						<li><a href="index.html">Home</a></li>
						<i class="fa fa-angle-right"></i>
						<li>Contact</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- end main-content -->

		<!--Contact Details Start-->
		<!--<section class="contact-details">
			<div class="container ">
				<div class="row">
					<div class="col-xl-2 col-lg-3 mb-md-60"></div>
					<div class="col-xl-6 col-lg-6 mb-md-60">
						<div class="contact-details__right">
							<div class="sec-title">
								<span class="sub-title">Need any help?</span>
								<h2>Get in touch with us</h2>
								<div class="text">Lorem ipsum is simply free text available dolor sit amet, consectetur notted
									adipisicing elit sed do eiusmod tempor incididunt simply free ut labore et dolore magna aliqua.</div>
							</div>
							<ul class="list-unstyled contact-details__info">
								<li>
									<div class="icon">
										<span class="lnr-icon-phone-plus"></span>
									</div>
									<div class="text">
										<h6>Have any question?</h6>
										<a href="tel:+13478096802"><span>Free</span>+1-347-809-6802</a>
									</div>
								</li>
								<li>
									<div class="icon">
										<span class="lnr-icon-envelope1"></span>
									</div>
									<div class="text">
										<h6>Write email</h6>
										<a href="mailto:info@valogical.com">info@taskenhance.com</a>
									</div>
								</li>
								<li>
									<div class="icon">
										<span class="lnr-icon-location"></span>
									</div>
									<div class="text">
										<h6>Visit anytime</h6>
										<span>36/1/2C, Pulin Khatick Road, Kolkata - 700015</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-7 col-lg-6">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.843149788316!2d144.9537131159042!3d-37.81714274201087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sbn!2sbd!4v1583760510840!5m2!1sbn!2sbd"
							width="100%" height="550" frameborder="0" allowfullscreen=""></iframe>
					</div>
				</div>
			</div>
		</section>-->
		<!--Contact Details End-->

		<!--Contact Details Start-->
		<section class="team-contact-form">
			<div class="container pb-100">
				<div class="sec-title text-center">
					<span class="sub-title">Contact With Us Now</span>
					<h2 class="section-title__title">Feel Free to Write Our <br> Tecnology Experts</h2>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<?php if (isset($msg['messsage'])) { echo $msg['messsage']; } ?>
						<!-- Contact Form -->
						<form id="contact_form" name="contact_form" class="" method="post">
							<div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="name" class="form-control" type="text" value="<?=(array_key_exists('name', $_POST))?$_POST["name"]:''?>" placeholder="Enter Name">
										<p style="color:red;font-size:14px;"><?php if (isset($err['name'])) { echo $err['name']; } ?> </p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="email" class="form-control required email" type="email" value="<?=(array_key_exists('email', $_POST))?$_POST["email"]:''?>" placeholder="Enter Email">
										<p style="color:red;font-size:14px;"><?php if (isset($err['email'])) { echo $err['email']; } ?> </p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="subject" class="form-control required" type="text" value="<?=(array_key_exists('subject', $_POST))?$_POST["subject"]:''?>" name="subject" placeholder="Enter Subject">
										<p style="color:red;font-size:14px;"><?php if (isset($err['subject'])) { echo $err['subject']; } ?> </p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="mb-3">
										<input name="phone" class="form-control" type="text" name="phone" value="<?=(array_key_exists('phone', $_POST))?$_POST["phone"]:''?>" placeholder="Enter Phone">
										<p style="color:red;font-size:14px;"><?php if (isset($err['phone'])) { echo $err['phone']; } ?> </p>
									</div>
								</div>
							</div>
							<div class="mb-3">
								<textarea name="message" class="form-control required" rows="5 type="text" name="phone"
									placeholder="Enter Message"></textarea>
							</div>
							<div class="mb-3 text-center">
								
								<button type="submit" name="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span
										class="btn-title">Send message</span></button>
								<button type="reset" class="theme-btn btn-style-one"><span class="btn-title">Reset</span></button>
							</div>
						</form>
						<!-- Contact Form Validation-->
					</div>
				</div>
			</div>
		</section>
		<!--Contact Details End-->

		

	<!-- form submit -->
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.form.min.js"></script>
	<script>
		(function ($) {
			$("#contact_form").validate({
				submitHandler: function (form) {
					var form_btn = $(form).find('button[type="submit"]');
					var form_result_div = '#form-result';
					$(form_result_div).remove();
					form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
					var form_btn_old_msg = form_btn.html();
					form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
					$(form).ajaxSubmit({
						dataType: 'json',
						success: function (data) {
							if (data.status == 'true') {
								$(form).find('.form-control').val('');
							}
							form_btn.prop('disabled', false).html(form_btn_old_msg);
							$(form_result_div).html(data.message).fadeIn('slow');
							setTimeout(function () { $(form_result_div).fadeOut('slow') }, 6000);
						}
					});
				}
			});
		})(jQuery);
	</script>

<?php include("inc/footer.php"); ?>
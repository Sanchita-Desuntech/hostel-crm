<div class="panel-body" style="display: block;">
<?php if($this->session->flashdata('success_msg')!="") { ?>
<div class="clearfix"></div>
<div class="alert alert-success">
<strong></strong> <?=$this->session->flashdata('success_msg');?>
</div>
<?php }elseif($this->session->flashdata('err_msg')!=""){ ?>
<div class="alert alert-danger">
<strong></strong> <?=$this->session->flashdata('err_msg');?>
</div>
<?php } ?>
</div>
<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--row-->
			<div class="row">
				<!--content-->
				<section class="content center full-width">
					<div class="modal container">
						<form method="post" action="" name="contactform" id="contactform">
							<h3>Contact us</h3>
							<div id="message" class="alert alert-danger"></div>
							<div class="f-row">
								<input type="text" placeholder="Your name" id="name" name="name" />
							</div>
							<div class="f-row">
								<input type="email" placeholder="Your email" id="email" name="email" />
							</div>
							<div class="f-row">
								<input type="text" placeholder="Your phone number" id="phone" name="phone" />
							</div>
							<div class="f-row">
								<textarea placeholder="Your message" id="comments" name="comments"></textarea>
							</div>
							<div class="f-row bwrap">
								<input type="submit" value="Send message" />
							</div>
						</form>
					</div>
				</section>
				<!--//content-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
<section class="page-header">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<h1>Corporate Training</h1>

					<ul class="list-unstyled">

						<li><a href="<?php echo base_url(); ?>">Home</a></li>

						<li class="active">Corporate Training</li>

					</ul>

				</div>

			</div>

		</div>

	</section>

    

    	<section class="about-ds">

		<div class="container">

			<div class="row">

	            <div class="col-md-9 col-sm-8 about-ds-content corporatecont">

					

                    <div class="section-header03">

						<h2>Corporate <span>Training</span></h2>

					</div>

                    <div class="corpocnt">

                    <?php foreach($pages_data as $pagesdata){?>

					<p><?php echo $pagesdata->descrip;?></p>

                    </div>

                    <?php } ?>

                    

                    <div class="clearfix"></div>

					<div class="col-lg-12 corpofrm">

                      <div class="col-lg-12"><h3>Enquiry</h3><br /></div>

                    <div class="col-lg-6">

                     <div class="form-group">

                    <input type="text" name="cfname" id="cfname" placeholder="Company Name" class="form-control" />

                    </div>

                    </div>

                     <div class="col-lg-6">

                      <div class="form-group">

                    <input type="text" name="cemail" id="cemail" placeholder="Email ID" class="form-control" />

                    </div>

                    </div>

                      <div class="col-lg-6">

                       <div class="form-group">

                    <input type="text" name="cphone" id="cphone" placeholder="Phone Number" class="form-control" />

                    </div>

                    </div>

                     <div class="col-lg-6">

                      <div class="form-group">

                    <input type="text" name="cperson" id="cperson" placeholder="Contact Person" class="form-control" />

                    </div>

                    </div>

                      <div class="col-lg-6">

                       <div class="form-group">

                    <input type="text" name="cwebsite" id="cwebsite" placeholder="Website"  class="form-control"/>

                    </div>

                    </div>

                    

                    <div class="col-lg-6">

                       <div class="form-group">

                      <?php 

						$num1_cf=rand(1,9); //Generate First number between 1 and 9  

               			$num2_cf=rand(1,9); //Generate Second number between 1 and 9  

              			$captcha_total_cf = $num1_cf+$num2_cf;



				      ?>

                         <div class="col-lg-5 captchabx">

                         <?php echo $num1_cf;?> + <?php echo $num2_cf;?> = 

                         </div>

                          <div class="col-lg-7 nopadding">

                          <input type="text" class="form-control" placeholder="Enter Captcha Code" id="cfcaptcha" >

                          <input type="hidden"  id="cf_hdn_captcha"  value="<?php echo $captcha_total_cf;?>">

                       </div>

                    </div>

                    </div>

                    

                    <div class="col-lg-12">

                      	<div class="form-group">

                   	<textarea class="form-control" placeholder="Brief about your training" id="cmessage" rows="5"></textarea>

                        </div>



                    </div>

                    

                    <div class="col-lg-12">

                      	<div class="form-group text-center">

                   <input type="button" class="cfbbtn" value="Submit" name="cfsubmit" id="cfsubmit" onclick="corporate_st_submit();" />

                        </div>



                    </div>

                    

                    

                    

<script type="text/javascript">



function isValidEmailAddress_eml(emailAddress) {

    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

    // alert( pattern.test(emailAddress) );

    return pattern.test(emailAddress);

};







   function corporate_st_submit(){

		var cfname = $('#cfname').val();

		var cemail = $('#cemail').val();

		var cphone = $('#cphone').val();

		var cperson = $('#cperson').val();

		var cwebsite = $('#cwebsite').val();

		var cfcaptcha = $('#cfcaptcha').val();

		var cf_hdn_captcha = $('#cf_hdn_captcha').val();

		var cmessage  = $('#cmessage').val();



		if(cfname == '')

		{

			alert('Please Enter Your Company Name !!');

			$('#cfname').focus();

		}

		else if(cemail =='')

		{

	     	alert('Please Enter Your Email Address !!');	

			$('#cemail').focus();

		}

		 else if(!isValidEmailAddress_eml(cemail))

		{

			alert('Please Enter Your Valid Email Address !!');

			$('#cemail').focus();

		} 

		else if(cphone =='')

		{

	     	alert('Please Enter Your Contact Number !!');	

			$('#cphone').focus();

		}

		else if(isNaN(cphone))
		{
			$('#cphone').focus();
			alert('Please Enter Your Valid Phone Number !!');	
			
		}
		else if(cphone.length !=10)
		{
			$('#cphone').focus();
			alert('Please Enter Your Valid Phone Number Digit !!');	
		}

		else if(cperson =='')

		{

	     	alert('Please Enter Contact Person !!');	

			$('#cperson').focus();

		}

		

		else if(cfcaptcha =='')

		{

	     	alert('Please Enter Your Captcha Code !!');	

			$('#cfcaptcha').focus();

		}

		else if(cfcaptcha != cf_hdn_captcha)

		{

	     	alert('Please Enter Your Valid Captcha Code !!');	

			$('#cfcaptcha').focus();

		}

		else if(cmessage =='')

		{

	     	alert('Please Enter Brief About Your Training !!');	

			$('#cmessage').focus();

		}

		else

		{

			  $.ajax({

				  type:'POST',

				  url:"<?php echo base_url(); ?>" + "corporate/form_data_submit",

				   data:{cfname:cfname,cemail:cemail,cphone:cphone,cperson:cperson,cwebsite:cwebsite,cmessage:cmessage},

				   success:function(data)

				    {

					alert('Your requeset has been proceed will touch you shortly !!');

					window.location.href= '<?php echo base_url()?>corporate-training';

					}

				  })



		}

		}

    </script>

                    

                    

                    </div>

                    

            	</div>

                

                

                <div class="col-md-3 col-sm-4">

					<div class="blog-sidebar">

						<div class="sidebar-widget clogosng">

							<h3>Our Clients</h3>

							<div class="widget-content tags-widget"><br />



								<ul class="list-unstyled client-logo ">

                                  <?php foreach($client_data as $clientdata){?>

                	<li><a href="javsacipt:void(0)"><img src="<?php echo base_url()?>uploads/client_image/<?php echo $clientdata->image_src;?>" alt="<?php echo $clientdata->title;?>" /></a>

                    <p><?php echo $clientdata->title;?></p>

                    </li>

					

                    

                    <?php } ?>

								

									

								</ul>

							</div>

						</div><!-- Ends: .sidebar-widget -->

					</div><!-- Ends: .blog-sidebar -->

				</div>

	            

			</div>

		</div>

	</section>

	

	

		
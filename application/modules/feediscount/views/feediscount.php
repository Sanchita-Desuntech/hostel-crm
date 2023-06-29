 <?php foreach($pages_data as $pagesdata){?>
 	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Get Course Fee & Discount Now !! </h1>
					<ul class="list-unstyled">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="active">Get Course Fee & Discount Now !! </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
    
    	<section class="about-ds">
		<div class="container">
			<div class="row">
	            <div class="col-md-12 col-sm-12 about-ds-content">
					<div class="section-header03">
						<h2><?php echo $pagesdata->heading_title;?></h2>
					</div>
                   
					<p><?php echo $pagesdata->descrip;?></p>
                    
                   
					
            	</div>
	            
			</div>
		</div>
	</section>
	
	<section class="">
		<div class="container text-center events">
			<div class="row">

              

	            <div class="col-sm-12 section-header header-dark">
                     <h2><?php echo $pagesdata->extra_title;?></h2>

					<span><img src="<?php echo base_url()?>themes/front/images/edu-icon.png" alt="Our success story"></span>

					<br />

                 <div style="font-size:28px; line-height:36px;"><?php echo $pagesdata->extra_descrip;?></div>
                   
                  <br/>
                  <br/>

	            </div><!-- ends: .section-header -->


				<div class="col-md-10 col-md-offset-1">
                  <div class="demosfrom">

				<form>

				<div class="list-unstyled clearfix">
                
                <div class="col-lg-6">
				<div class="form-group">

					<input type="text" class="form-control" placeholder="Name" id="f_name">

				</div>
                </div>
                <div class="col-lg-6">
				<div class="form-group">

					<input type="email" class="form-control" placeholder="Email" id="f_email">

				</div>
               </div>
               <div class="col-lg-6">
				<div class="form-group">

					<input type="text" class="form-control" placeholder="Contact No" id="f_contact">

				</div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                     	<select  class="form-control" id="f_course">
                        <option value="">Select Course Name</option>
                         <?php
						$course_list = get_course_list();
						foreach($course_list as $courselist)
						{
						?>
              			 <option value="<?php echo $courselist['course_name']; ?>"><?php echo $courselist['course_name']; ?></option>
            			  <?php } ?>
                        </select>
                     </div>

                  </div>

                  <div class="col-lg-6">

                      <div class="form-group">
                     	<select  class="form-control" id="f_city">
                        <option value="">Select City</option>
                        <?php
						$city_list = get_city_list();
						$i=1;
						foreach($city_list as $citylist)
						{
							if($i==1)
							{
						?>
                         <option value="<?php echo $citylist['city_name'];?>"><?php echo $citylist['city_name'];?></option>
                <?php } $i++;  } ?>
                        </select>
                     </div>

                 </div>

                 <div class="col-lg-6">
                       <div class="form-group">
                     	<select  class="form-control" id="f_area">
                        <option value="">Select Area</option>
                        <?php
                $ara_list = get_city_list();
                foreach($ara_list as $aralist)
                {
                ?>
                 <option value="<?php echo $aralist['area_name'];?>"><?php echo $aralist['area_name'];?></option>
                <?php } ?>
                        </select>
                     </div>
				
                 </div>

                 <div class="col-lg-12">

				<div class="form-group">

					<textarea class="form-control" placeholder="Message" id="f_message" rows="5"></textarea>

				</div>
                
                </div>

                <div class="col-lg-12">
                

                <div class="form-group">

                <?php 

				$num1=rand(1,9); //Generate First number between 1 and 9  

                $num2=rand(1,9); //Generate Second number between 1 and 9  

                $captcha_total=$num1+$num2;

				?>

                <div class="col-lg-5 captchabx">

               Captcha Code:  <?php echo $num1;?> + <?php echo $num2;?> = 

                </div>

                <div class="col-lg-7 nopadding">

                <input type="text" class="form-control" placeholder="Enter Captcha Code" id="f_captcha" >

                 <input type="hidden"  id="f_hdn_captcha"  value="<?php echo $captcha_total;?>">

                </div>

                </div>

                </div>
                <div class="col-lg-12">
				<div class="form-group text-center"><br><br>

					<a href="javascript:void(0)" onClick="contact_st_submit()" class="el-btn-medium btn-block" style="display: inline;">Submit</a>

				</div>
			</div>

				</div>

				</form>

			</div>
				</div>

                 <div class="col-md-12 col-sm-12 about-ds-content cntctdec">
                            
                  <br />
<h2 style="text-align: center !important;"><strong>OUR TRAINING <span style="color: #ff6600;">CENTERS&nbsp;IN <?php echo $this->config->item('state_name');?></span></strong></h2>

                    
                    <ul class="addresslist text-left">
                            
                     <?php foreach($address_data as $addressdata){?>
				
					 <li><?php echo $addressdata->address;?></li>
                    
                    <?php } ?>
                    
                    </ul>
					
            	</div>
                
                
                <div class="col-md-12 col-sm-12 about-ds-content cntctdec">
                       <h2 style="text-align: center !important;"><strong>OUR TRAINING <span style="color: #ff6600;">CENTERS&nbsp;IN INDIA</span></strong></h2>
                    
                    <ul class="centerlist">
                            
                     <?php foreach($center_data as $centerdata){?>
				
					 <li>
                     <a href="<?php echo $centerdata->link;?>" target="_blank">
                     <div class="icon">
                      <img src="<?php echo base_url()?>uploads/educenter_image/<?php echo $centerdata->image_src;?>" alt="" >

                    </div>
					<div class="content"><?php echo $centerdata->title;?></div>
                    <div class="clearfix"></div>
                    </a>
					</li>
                    
                    <?php } ?>
                    
                    </ul>
					
            	</div>

			</div>
		</div>
	</section>

 <?php } ?>		

		<script type="text/javascript">



function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    // alert( pattern.test(emailAddress) );
    return pattern.test(emailAddress);
};



   function contact_st_submit(){

		var f_name = $('#f_name').val();
		var f_email = $('#f_email').val();
		var f_contact = $('#f_contact').val();
		var f_subject = $('#f_subject').val();
		var f_course = $('#f_course').val();
		var f_city = $('#f_city').val();
		var f_area = $('#f_area').val();
		var f_message = $('#f_message').val();
		var f_captcha = $('#f_captcha').val();
		var f_hdn_captcha = $('#f_hdn_captcha').val();
		var qry_type  = 'Get A Quote';

		if(f_name == '')
		{
			alert('Please Enter Your Full Name !!');
			$('#f_name').focus();
		}
		else if(f_email =='')
		{
	     	alert('Please Enter Your Email Address !!');	
			$('#f_email').focus();
		}
		 else if(!isValidEmailAddress(f_email))
		{
			alert('Please Enter Your Valid Email Address !!');
			$('#f_email').focus();
		} 
		else if(f_contact =='')
		{
	     	alert('Please Enter Your Contact Number !!');	
			$('#f_contact').focus();
		}
		else if(isNaN(f_contact))
		{
			$('#f_contact').focus();
			alert('Please Enter Your Valid Phone Number !!');	
			
		}
		else if(f_contact.length !=10)
		{
			$('#f_contact').focus();
			alert('Please Enter Your Valid Phone Number Digit !!');	
		}
		else if(f_course =='')
		{
	     	alert('Please Select Course !!');	
			$('#f_course').focus();
		}
		else if(f_city =='')
		{
	     	alert('Please Select City !!');	
			$('#f_city').focus();
		}
		else if(f_area =='')
		{
	     	alert('Please Select Area !!');	
			$('#f_area').focus();
		}
		else if(f_message =='')
		{
	     	alert('Please Enter Your Message !!');	
			$('#f_message').focus();
		}
		else if(f_captcha =='')
		{
	     	alert('Please Enter Your Captcha Code !!');	
			$('#f_captcha').focus();
		}
		else if(f_captcha != f_hdn_captcha)
		{
	     	alert('Please Enter Your Valid Captcha Code !!');	
			$('#f_captcha').focus();
		}
		else
		{
			  $.ajax({
				  type:'POST',
				  url:"<?php echo base_url(); ?>" + "form/form_data_submit",
				   data:{full_name:f_name,email_id:f_email,contact_no:f_contact,course_name:f_course,city_nm:f_city,area_nm:f_area,message_qry:f_message,qry_type:qry_type},
				   success:function(data)
				    {
					alert('Your requeset has been proceed will touch you shortly !!');
					$('#f_name').val('');
					$('#f_email').val('');
					$('#f_contact').val('');
					$('#f_course').val('');
					$('#f_city').val('');
					$('#f_area').val('');
					$('#f_message').val('');
					$('#f_captcha').val('');
					}
				  })

		}
		}
    </script>    

 <?php foreach($pages_data as $pagesdata){?>
 	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Demo Class !! </h1>
					<ul class="list-unstyled">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="active">Demo Class !! </li>
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

	            </div>


				<div class="col-md-10 col-md-offset-1">
                  <div class="demosfrom">

				
              <form>
              	     <div class="col-lg-6">
                     <div class="form-group">
                     	<input type="text" class="form-control" placeholder="Name" id="dm_fname">
                     </div>
                 </div>
                 <div class="col-lg-6">
                     	<div class="form-group">
                     	<input type="text" class="form-control" placeholder="Email" id="dm_email">
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="form-group">
                     	<input type="text" class="form-control" placeholder="Contact No" id="dm_contact">
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="form-group">
                     	<select  class="form-control" id="dm_course">
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
                     	<select  class="form-control" id="dm_city">
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
                     	<select  class="form-control" id="dm_area">
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
                     	<textarea class="form-control" rows="3" placeholder="Message" id="dm_message"></textarea>
                     </div>
                 </div>
                 <div class="col-lg-12">
                     <div class="form-group">
                      <?php 
				$num_dm1=rand(1,9); //Generate First number between 1 and 9  
                $num_dm2=rand(1,9); //Generate Second number between 1 and 9  
                $captcha_total_dm =$num_dm1+$num_dm2;
				?>

                <div class="col-lg-5 captchabx" >
                Captcha Code: <?php echo $num_dm1;?> + <?php echo $num_dm2;?> = 
                </div>

                <div class="col-lg-7 nopadding">
                <input type="text" class="form-control" placeholder="Enter Captcha Code" id="dm_captcha" style="border-radius:2px;" >
                 <input type="hidden"  id="dm_hdn_captcha"  value="<?php echo $captcha_total_dm;?>">
                </div>

                      </div>
                  </div>
                      <div class="col-lg-12">
                     <div class="form-group"><br><br><br>
                     <button type="button" class="el-btn-medium btn-block" value="Send" style="display: inline;width: auto;" onClick="demo_contact_submit();">Submit</button>
     
  					</div>
  				</div>
  				<div class="clearfix"></div>
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

   function demo_contact_submit(){


		var fullname = $('#dm_fname').val();
		var emailadd = $('#dm_email').val();
		var contactno = $('#dm_contact').val();
		var messageqry = $('#dm_message').val();
		var coursename  = $('#dm_course').val();
		var city_nm = $('#dm_city').val();
		var area_nm = $('#dm_area').val();
		var qry_type  = 'Demo Class';
	    var dm_captcha = $('#dm_captcha').val();
		var dm_hdn_captcha = $('#dm_hdn_captcha').val();

		if(fullname == '')
		{
			alert('Please Enter Your Full Name !!');
			$('#dm_fname').focus();
		}
		else if(emailadd =='')
		{
	     	alert('Please Enter Your Email Address !!');	
			$('#dm_email').focus();
		}
		 else if(!isValidEmailAddress(emailadd))
		{
			alert('Please Enter Your Valid Email Address !!');
			$('#dm_email').focus();
		} 
		else if(contactno =='')
		{
	     	alert('Please Enter Your Contact Number !!');	
			$('#dm_contact').focus();
		}
		else if(isNaN(contactno))
		{
			$('#dm_contact').focus();
			alert('Please Enter Your Valid Phone Number !!');	
			
		}
		else if(contactno.length !=10)
		{
			$('#dm_contact').focus();
			alert('Please Enter Your Valid Phone Number Digit !!');	
		}
		else if(coursename =='')
		{
	     	alert('Please Select Course !!');	
			$('#dm_course').focus();
		}
		else if(city_nm =='')
		{
	     	alert('Please Select City !!');	
			$('#dm_city').focus();
		}
		else if(area_nm =='')
		{
	     	alert('Please Select Area !!');	
			$('#dm_area').focus();
		}
		else if(messageqry =='')
		{
	     	alert('Please Enter Your Message  !!');	
			$('#dm_message').focus();
		}

		else if(dm_captcha =='')
		{
	     	alert('Please Enter Your Captcha Code !!');	
			$('#dm_captcha').focus();
		}
		else if(dm_captcha != dm_hdn_captcha)
		{
	     	alert('Please Enter Your Valid Captcha Code !!');	
			$('#dm_captcha').focus();
		}
		else
		{
			  $.ajax({
				  type:'POST',
				  url:"<?php echo base_url(); ?>" + "form/form_data_submit",
				  data:{full_name:fullname,email_id:emailadd,contact_no:contactno,message_qry:messageqry,course_name:coursename,city_nm:city_nm,area_nm:area_nm,qry_type:qry_type},
				  success:function(data)
				    {
					alert(data);
					//alert('Your requeset has been proceed we will touch you shortly !!');
					$('#dm_fname').val('');
					$('#dm_email').val('');
					$('#dm_contact').val('');
					$('#dm_message').val('');
					$('#dm_captcha').val('');
					$('#dm_course').val('');
					$('#dm_city').val('');
					$('#dm_area').val('');
					}

				  })
		}
		}
    </script>




    



    



    <section class="page-header">



		<div class="container">



			<div class="row">



				<div class="col-sm-12">



					<h1>Bootcamp Training</h1>



					<ul class="list-unstyled">



						<li><a href="<?php echo base_url(); ?>">Home</a></li>



						<li class="active">Bootcamp Training</li>



					</ul>



				</div>



			</div>



		</div>



	</section>



    



  <section class="about-ds">



		<div class="container">



			<div class="row">



	            <div class="col-md-9 col-sm-8 about-ds-content corporatecont">



					 <?php foreach($pages_data as $pagesdata){?>



                    <div class="section-header03">



						<h2><?php echo $pagesdata->heading_title; ?></h2>



					</div>



                    <div class="corpocnt">



                   



					<p><?php echo $pagesdata->descrip;?></p>



                    </div>



                    <?php } ?>



                    

                  <div class="col-md-12 corpofrm">



                      <div class="col-lg-12"><h3>Enquiry</h3><br /></div>



                    <div class="col-lg-6">



                     <div class="form-group ">



                    <input type="text" name="cfname" id="cfname" placeholder="Full Name" class="form-control" />



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



                      <select name="ccourse" class="form-control" id="ccourse">



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



                       <select name="ccity" id="ccity" class="form-control">



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



                       <select name="carea" id="carea" class="form-control">



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



                    <div class="col-lg-6 captchabx text-left">



                          <div class="form-group">



                           <?php 



						$num1_cf=rand(1,9); //Generate First number between 1 and 9  



               			$num2_cf=rand(1,9); //Generate Second number between 1 and 9  



              			$captcha_total_cf = $num1_cf+$num2_cf;







				      ?>



                         <div style="color:#000;  text-align:left;">Captcha Code: <?php echo $num1_cf;?> + <?php echo $num2_cf;?> = </div>



                         </div>



                         </div>



                    <div class="col-lg-6 ">



                          <div class="form-group">



                          <input type="text" class="form-control" placeholder="Enter Captcha Code" id="cfcaptcha" >



                          <input type="hidden"  id="cf_hdn_captcha"  value="<?php echo $captcha_total_cf;?>">



                       </div>



                      </div>



                    <div class="col-lg-12">



                      	<div class="form-group">



                   	<textarea class="form-control" placeholder="Comment" id="cmessage" rows="10" style="height:125px;"></textarea>



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



		var ccourse = $('#ccourse').val();



		var ccity = $('#ccity').val();



		var carea = $('#carea').val();



		var cfcaptcha = $('#cfcaptcha').val();



		var cf_hdn_captcha = $('#cf_hdn_captcha').val();



		var cmessage  = $('#cmessage').val();



		



		var qry_type  = 'Bootcamp Query';







		if(cfname == '')



		{



			alert('Please Enter Your Name !!');



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


		else if(ccourse =='')



		{



	     	alert('Please Select Course !!');	



			$('#ccourse').focus();



		}



		



		else if(ccity =='')



		{



	     	alert('Please Select City !!');	



			$('#ccity').focus();



		}



		



		else if(carea =='')



		{



	     	alert('Please Select Area !!');	



			$('#carea').focus();



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



				  url:"<?php echo base_url(); ?>" + "form/form_data_submit",



				   data:{full_name:cfname,email_id:cemail,contact_no:cphone,course_name:ccourse,city_nm:ccity,area_nm:carea,message_qry:cmessage,qry_type:qry_type},



				   success:function(data)



				    {



					alert('Your requeset has been proceed will touch you shortly !!');



					window.location.href= '<?php echo base_url()?>/bootcamp';



					}



				  })







		}



		}



    </script>   



                    



                    </div>

                    <div class="clearfix"></div>



					



                    



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



    



   



 















<div id="myModal" class="modal fade" role="dialog">



  <div class="modal-dialog">



    <div class="modal-content border-radius">



      <div class="modal-header border-radius">



        <button type="button" class="close" data-dismiss="modal">&times;</button>



        <h4 class="modal-title title-color">Quick Enquiry</h4>



      </div>



      <div class="modal-body lod-pop-bg">



       <div class="row">



       <div class="col-md-12 col-xs-12">



       <?php $data_settings = get_settings_data();  ?>   



        <h3 class="pop-text"><b><?php echo $data_settings['q_head_1'];?></b></h3> 



        <h4><?php echo $data_settings['q_head_2'];?></h4>



       </div>



       <div class="col-md-12 col-xs-12">



      <div class="col-lg-6">



        <div class="input-group form-group input-newsltr">



        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>



        <input id="q_fname" type="text" class="form-newsletter" name="name" placeholder="Name"  >



  		</div>



      </div>



      <div class="col-lg-6">



        <div class="input-group form-group input-newsltr">



        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>



        <input id="q_email" type="email" class="form-newsletter" name="email" placeholder="Email address" >



  		</div>



      </div>



      <div class="col-lg-6">



        <div class="input-group form-group input-newsltr">



          <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>



             <input id="q_contact" type="text" class="form-newsletter" name="name" placeholder="Contact No">



  		</div>



      </div>



      <div class="col-lg-6">



        <div class="input-group form-group input-newsltr">



        <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>



     







           <script>



function coursestump(coursenm)



{



	



	$('.dropbtn').val(coursenm);



	$('#q_coursenm').val(coursenm);



	$('#myDropdown').removeClass('show');



}











/* When the user clicks on the button,



toggle between hiding and showing the dropdown content */



function myFunction() {



  document.getElementById("myDropdown").classList.toggle("show");





}







function filterFunction() {



  var input, filter, ul, li, a, i;



  input = document.getElementById("myInput");



  filter = input.value.toUpperCase();



  div = document.getElementById("myDropdown");



  a = div.getElementsByTagName("a");



  for (i = 0; i < a.length; i++) {



    txtValue = a[i].textContent || a[i].innerText;



    if (txtValue.toUpperCase().indexOf(filter) > -1) {



      a[i].style.display = "";



    } else {



      a[i].style.display = "none";



    }



  }



}







</script>    



                



        



         



         



         <div class="dropdowncrs form-newsletter">



         <input type="button" onclick="myFunction()" class="dropbtn" value="Select Course Name" />



         <input type="hidden" value="" id="q_coursenm" name="q_coursenm" />







  <div id="myDropdown" class="dropdown-content">



    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">



           <?php



			$course_list = get_course_list();



			foreach($course_list as $courselist)



			{



			?>



    <a href="javascript:void()" class="xxx" onclick="coursestump('<?php echo $courselist['course_name']; ?>')"><?php echo $courselist['course_name']; ?></a>



      <?php } ?>



  </div>



</div>



  		</div>



        </div>



         <div class="col-lg-6">



          <div class="input-group form-group input-newsltr">



              <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>



              <select id="q_city"  name="q_city" class="form-newsletter" onchange="">



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



          <div class="input-group form-group input-newsltr">



           <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>



                 <select id="q_area" class="form-newsletter" onchange="">



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



        	   <div class="col-lg-6 captchabx">



               <div class="input-group form-group input-newsltr" style="background:#fff;">



                 <?php 



				$num_pop1=rand(1,9); //Generate First number between 1 and 9  



                $num_pop2=rand(1,9); //Generate Second number between 1 and 9  



                $captcha_total_pop =$num_pop1+$num_pop2;



				?>



                &nbsp;&nbsp;Captcha Code: <?php echo $num_pop1;?> + <?php echo $num_pop2;?> = 



                </div>



                </div>



                <div class="col-lg-6">



                 <div class="input-group form-group input-newsltr">



                <input type="text" class="form-newsletter" placeholder="Enter Captcha Code" id="q_captcha" style="border-radius:2px;" >



                 <input type="hidden"  id="q_hdn_captcha"  value="<?php echo $captcha_total_pop;?>">



                </div>



           </div>



       



         <div class="col-lg-12">



            <div class="input-group form-group input-newsltr">



             



              <textarea id="q_message" class="form-newsletter" placeholder="Message"></textarea>



          </div>



         </div>



  	



        <div class="col-lg-12">



  		<div class="form-group text-center">



        <input type="button" class="btn-newsletter" value="Submit"  onclick="course_submit_qry();">



  		</div>



        </div>



     </div>



     </div>



    </div>



  <div class="modal-footer"></div>



</div>



</div>



</div>











<script type="text/javascript">



function isValidEmailAddress(emailAddress) {



    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);



    // alert( pattern.test(emailAddress) );



    return pattern.test(emailAddress);



};







   function course_submit_qry(){







		var fullname = $('#q_fname').val();



		var emailadd = $('#q_email').val();



		var contactno = $('#q_contact').val();



		var coursename = $('#q_coursenm').val();



		var city_nm = $('#q_city').val();



		var area_nm = $('#q_area').val();



		var qry_type  = 'Quick Contact Query';



        var q_captcha = $('#q_captcha').val();



		var q_hdn_captcha = $('#q_hdn_captcha').val();



		var message_qry = $('#q_message').val();







		if(fullname == '')



		{



			alert('Please Enter Your Full Name !!');



			$('#q_fname').focus();



		}



		else if(emailadd =='')



		{



	     	alert('Please Enter Your Email Address !!');	



			$('#q_email').focus();



		}



		else if(!isValidEmailAddress(emailadd))



		{



			alert('Please Enter Your Valid Email Address !!');



			$('#q_email').focus();



		} 



		else if(contactno =='')



		{



	     	alert('Please Enter Your Contact Number !!');	



			$('#q_contact').focus();



		}

else if(isNaN(contactno))
    {
      $('#q_contact').focus();
      alert('Please Enter Your Valid Phone Number !!'); 
      
    }
    else if(contactno.length !=10)
    {
      $('#q_contact').focus();
      alert('Please Enter Your Valid Phone Number Digit !!'); 
    }

		else if(coursename =='')



		{



	     	alert('Please Select Your Course Name !!');	



		}



		else if(city_nm =='')



		{



	     	alert('Please Select Your City Name !!');	



			$('#q_city').focus();



		}



		else if(area_nm =='')



		{



	     	alert('Please Select Your Area Name !!');	



			$('#q_area').focus();



		}



		else if(q_captcha =='')



		{



	     	alert('Please Enter Your Captcha Code !!');	



			$('#q_captcha').focus();



		}



		else if(q_captcha != q_hdn_captcha)



		{



	     	alert('Please Enter Your Valid Captcha Code !!');	



			$('#q_captcha').focus();



		}



		else



		{







		  $.ajax({



				  type:'POST',



				  url:"<?php echo base_url(); ?>" + "form/form_data_submit",



				  data:{full_name:fullname,email_id:emailadd,contact_no:contactno,course_name:coursename,city_nm:city_nm,area_nm:area_nm,message_qry:message_qry,qry_type:qry_type},



				  success:function(data)



				    {



					alert(data);



					//alert('Your requeset has been proceed we will touch you shortly !!');



					$('#q_fname').val('');



					$('#q_email').val('');



					$('#q_contact').val('');



					$('#q_coursename').val('');



					$('#q_captcha').val('');



					window.location.href= '<?php echo base_url();?>';



					}



				  })



		}



		}



</script>



    



<script type="text/javascript">



$(window).load(function()



{



	setTimeout(function() {



    $('#myModal').modal();



}, 30000);



  



});







</script>
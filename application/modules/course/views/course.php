  

 



<section class="page-header">

		<div class="container">

			<div class="row">

             <?php 

			 foreach($course_data as $crsdtls)

			 {

			 ?>

            

				<div class="col-sm-12">

					<h1><?php echo $crsdtls->course_name;?></h1>

					<ul class="list-unstyled">

						<li><a href="<?php echo base_url(); ?>">Home</a></li>

						<li><a href="<?php echo base_url(); ?>/courses">Courses</a></li>

						<li class="active"><?php echo $crsdtls->course_name;?></li>

					</ul>

				</div>

                

                <?php } ?>

			</div>

		</div>

	</section>







    

    		

	

	<section class="single-course-wrapper">

		<div class="container">

			<div class="row">

              <?php 

			 foreach($course_data as $coursedetails)

			 {

			 ?>

			

				<div class="col-md-8 col-sm-12">

					<div class="single-course-content">

						<h3 class="course-title"><?php  echo $coursedetails->course_name;?></h3>

						<br>

						<div class="course-gallery">

							<div id=""> 	<!--<div id="sync1">-->

								<div class="text-center">

									<img src="<?php echo base_url();?>uploads/courses_image/<?php  echo $coursedetails->image_src; ?>" alt="<?php  echo strip_tags($coursedetails->course_name);?>">

								</div>

								</div>



							

						</div><!-- Ends: .course-gallery -->

						

						<div class="course-info-tabs">

							<div role="tabpanel">

								<!-- Nav tabs -->

								<ul class="nav nav-tabs" role="tablist">

									<li role="presentation" class="active">

										<a href="#tabe1" aria-controls="tabe1" role="tab" data-toggle="tab">Description</a>

									</li>

									

								</ul>



								<!-- Tab panes -->

								<div class="tab-content">

									<div role="tabpanel" class="tab-pane active fade in" id="tabe1">

									

										<h4>Course Description</h4>

										<p><?php  echo $coursedetails->course_description; ?></p>

										<h4>Course Duration</h4>

										

										<p><?php  echo $coursedetails->course_duration; ?>

        								<br>

         								<?php  echo $coursedetails->course_duration_desc; ?></p>

										

										

										<h4>Upcomming Batches</h4>

										

										<div class="table-responsive">

											

										<table class="table">

										<thead>

										  <tr>

											<th>BATCHES</th>  </tr>

										</thead>

										<tbody>

                                        <?php foreach($batches_data as $batchesdata){?>                                      

                                    

										  <tr class="">

											<td><?php echo $batchesdata->batch_time_all;?></td>

										  </tr>

										  

                                          <?php } ?>

										  

										</tbody>

									  </table>

											

										</div>

							

                                        

                                        
                                       <?php if($training_num_row!=0){?>
										<h4>Exams & Recommended Training</h4>

										<div class="table-responsive">

											

										<table class="table">

										<thead>

										  <tr>

											<th>Required Exam(s)</th>

											<th>Recommended Training</th>

										  </tr>

										</thead>

										<tbody>

                                        <?php foreach($training_data as $traingdata){?>                                      

                                    

										  <tr class="">

											<td><?php echo $traingdata->req_exam;?></td>

											<td><?php echo $traingdata->reco_training;?> </td>

										  </tr>

										  

                                          <?php } ?>

										  

										</tbody>

									  </table>

											

										</div>
                                        
                                        <?php } ?>

                                    <?php if($syllabus_num_row!=0){?>
									<h4>Course Syllabus</h4>

									<br>
                                    

									<div class="pdf">

                                    <?php foreach($syllabus_data as $syllabusdata){?>        

									<span>

									<a href="<?php echo base_url();?>uploads/syllabus/<?php echo $syllabusdata->sylla_pdf;?>" target="blank" class="el-btn-medium"> View PDF</a>

									<br>

									<h5 class="pri-course-pdf"><?php echo $syllabusdata->sylla_name;?></h5>

									</span>

									<?php } ?>

									</div>
                                    <?php } ?>
                                    

										<h4>Course Type</h4>

										

									<div class="btn-group pri-btn-group">

                                    

                                    <?php if($coursedetails->course_type=='both'){?>

									  <a href="javascript:void(0);" class="btn btn-success">Class Room Training</a>

									  <a href="javascript:void(0);" class="btn btn-warning">Online Training</a>

                                      <?php } ?>

                                      <?php if($coursedetails->course_type=='online'){?>

									  <a href="javascript:void(0);" class="btn btn-warning">Online Training</a>

                                      <?php } ?>

                                      <?php if($coursedetails->course_type=='classroom'){?>

									   <a href="javascript:void(0);" class="btn btn-success">Class Room Training</a>

                                      <?php } ?>

									</div><br />

<br />
<br />
<br />



                                    <div class="cntfrm feedbck">

                                    <h4 class="fbtl text-center">Student Feedback</h4>

									<div class="row">

										<div class="col-lg-12 col-sm-12 col-xs-12 text-center">

										<h3 class="pri-post-date" style="margin:5px;">
                                        <?php
										 $i=0;
                                            $rat=0;
                                            foreach($get_course_data as $singlecomment){
                                            //if($singlecomment->status==1){
                                            $rat= $rat+$singlecomment->rating;
                                             $i++;
											//}
                                            }
                                            echo  number_format($rat/$i,1).'<font color="#000000"; size="+1"> /5.0</font>';
										?>

                                        </h3>

										<p class="total-review">

														<span><i class="fa fa-star"></i></span>
														<span><i class="fa fa-star"></i></span>
														<span><i class="fa fa-star"></i></span>
														<span><i class="fa fa-star"></i></span>
														<span><i class="fa fa-star"></i></span>
                                                     <span style="color:#000 !important;"> (<?php if($comment_num_row==1) {echo $comment_num_row.' Review';} else {echo $comment_num_row.' Reviews';} ?> )</span>
													</p>

													<!--<p>Average Rating</p>-->

										</div>

		                             	<!--<div class="col-lg-6 col-sm-6 col-xs-12">

			<div class="progress skill-bar ">

                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;">

                5 <i class="fa fa-star"></i>

                </div>

            </div>

                

            <div class="progress skill-bar">

                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"  style="width:90%;" >

                  4 <i class="fa fa-star"></i>

                </div>

            </div>

            

            <div class="progress skill-bar">

                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"  style="width:75%;">

                   3 <i class="fa fa-star"></i>

                </div>

            </div>  

            

            <div class="progress skill-bar">

                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"  style="width:55%;">

                   2 <i class="fa fa-star"></i>

                </div>

            </div>  

            

            <div class="progress skill-bar">

                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"  style="width:10%;">

                   1 <i class="fa fa-star"></i>

                </div>

            </div> 

            

			</div>-->

										<!--<div class="col-lg-3 col-sm-3 col-xs-12">

										        	<p class="total-review dxtop">

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

													</p>

													<p class="total-review dxtop">

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

													</p>

													<p class="total-review dxtop">

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

													</p>

													<p class="total-review dxtop">

														<span><i class="fa fa-star"></i></span>

														<span><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

													</p>

													<p class="total-review dxtop">

														<span><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

														<span class="dactive"><i class="fa fa-star"></i></span>

													</p>

										</div>-->

									</div>

										<h4>Reviews</h4>

										<div class="reviews">

										<?php foreach($get_course_data as $single_comment) { ?>

                                        

                                        <?php if($single_comment->status==1){?>

											<div class="single-review">

												<div class="author-image">

													<img src="<?php echo base_url();?>themes/front/images/feedprofile.png" alt="">

                                                  

												</div>

												<div class="author-rating-content">

													<h5><?=$single_comment->name?></h5>

													<div class = "ratingvalue" id="<?php echo $single_comment->rating;?>"></div>

													<span class="rating-subject"><?=$single_comment->comment_title?></span>

													<p><?=$single_comment->comment?></p>

													<div class="divblock"></div>

												</div>

											 

										</div><!-- Ends: .reviews -->

                                        <?php } ?>

										<?php } ?>

                                        

                                        <div class="col-lg-12">

                                       

                                        

                              <div class="rateyo-readonly-widg"></div>

                                <input type="hidden" name="rating" id="rating_hidden" value="2"/><br />
                                <input type="hidden" name="course_id" id="course_id" value="<?=$coursedetails->id?>">
                               <input type="hidden" name="url" id="course_url" value="<?=$this->uri->segment(2);?>">
                                  <div class="form-group">
                          <input type="text" class="form-control" name="name" id="face_name" value="" placeholder="Your Name">
                            </div>
                             <div class="form-group">
                         <input type="text" class="form-control" name="email" id="face_email" value="" placeholder="Your Email">
                            </div>

                            <div class="form-group">
                          <textarea required class="form-control" name="comment" placeholder="Your Message" id="face_message" rows="5"></textarea>
                            </div>
                               <div class="form-group" style="height:50px;">
                                            <?php 
											$num_fdbck1=rand(1,9); //Generate First number between 1 and 9  
											$num_fdbck2=rand(1,9); //Generate Second number between 1 and 9  
											$captcha_total_fdbck =$num_fdbck1+$num_fdbck2;
											?>
                                            <div class="col-lg-5 captchabx">
                                            <?php echo $num_fdbck1;?> + <?php echo $num_fdbck2;?> = 
                                            </div>

                                        <div class="col-lg-7 nopadding">
                                        <input type="text" class="form-control" placeholder="Enter Captcha Code" id="fdbck_captcha" style="border-radius:2px;" >
                                        <input type="hidden"  id="fdbck_hdn_captcha"  value="<?php echo $captcha_total_fdbck;?>">
                                        </div>
                            </div>
                            
                            <div class="form-group text-left"><br> 
                        <button  type="submit" class="btn el-btn-medium " onclick="facebookdate_subite();">Submit Comment</button> 
                        </div>

                                   <div class="clearfix"></div>      

                                         <!-- <div id="response"></div>-->
                                         
                                         

                                        </div>

                                        

                                        

                                        

										<!--<button id="loginBtn" class="btn btn-facebook facelogin">Login With Facebbok to comment</button>-->

											

									</div>
                                    <div class="clearfix"></div>

                                    </div>

									</div>

                                    

                                    

                                    

									

									

									

							</div>



						</div><!-- Ends: .course-info-tabs -->

						

						<div class="course-bottom-content">

							

							<?php $data_settings = get_settings_data();  ?>    

							<div class="course-share">

								<h4>Share:</h4>

                               <div data-network="facebook" class="st-custom-button"><i class="fa fa-facebook"></i></div> 

                                 <div data-network="twitter" class="st-custom-button"><i class="fa fa-twitter"></i></div>

                                <div data-network="linkedin" class="st-custom-button"><i class="fa fa-linkedin"></i></div> 

                                <div data-network="whatsapp" class="st-custom-button"><i class="fa fa-whatsapp"></i></div> 

                                

								

							</div><!-- Ends: .course-share -->

                            

                            

                            	

                            

                            

						</div><!-- Ends: .course-bottom-content -->

					</div><!-- Ends: .single-course-content -->

				</div>

				</div>

                <?php

				}

				?>

                

				<div class="col-md-4 col-sm-12">

					<div class="single-course-sidebar">
                       <?php foreach($sidebar_data as $sidebardata){?>
						<div class="sidebar-widget">
                             <div class="sidebx">
							<div class="col-md-3 col-sm-12"><img src="<?php echo base_url()?>themes/front/images/iconside.jpg" /></div>
                            <div class="col-md-9 col-sm-12 nopadding"><h3 class=""><?php echo $sidebardata->title;?></h3></div>
                          <div class="clearfix"></div>
                          </div>

							<div class="widget-content courses-widget extralist" >

                             <?php echo $sidebardata->descrip;?>

							</div>

						</div>
                      <?php } ?>
						<div class="sidebar-widget">

							<h3 class="widget-title">Upcoming Courses</h3>

							<div class="widget-content courses-widget sngcrssideht">

							   <?php foreach($upcoming_course_data as $upcoming_crs){?>

                            

								<div class="sidebar-course-single">

									<div class="course-image">

										<img src="<?php echo base_url();?>uploads/courses_image/<?php echo $upcoming_crs->image_src;?>" width="100" alt="<?php echo $upcoming_crs->course_name;?>">

									</div>

									<div class="course-prefix">

										<h4><a href="<?php echo base_url();?>course/<?php echo $upcoming_crs->course_slug;?>"><?php echo $upcoming_crs->course_name;?></a></h4>

										<a href="<?php echo base_url();?>course/<?php echo $upcoming_crs->course_slug;?>" class="feesread"><?php echo $upcoming_crs->course_fees;?></a>

									</div>

                                      

								</div>

								

                                

                                <?php } ?>

							</div>

						</div><!-- Ends: .sidebar-widget -->

					</div><!-- Ends: .single-course-sidebar -->

				</div><!-- Ends: .col-sm-4 -->

			</div>

		</div>

	</section>

    

    <section class="single-course-wrapper">

		<div class="container">

			<div class="row">

				<div class="col-md-12 col-sm-12">

					<div class="single-course-content">

						

						<div class="course-bottom-content">

						

							<div class="related-course">

								<div class="section-header04 section-header-d">

									<h2>You  <span>May Like</span></h2>

									<span class="section-devider"><span><i class="fa fa-circle"></i></span></span>

								</div><!-- ends: .section-header -->

								<div class="related-course-slide owl-carousel">

                                

                                <?php 

								

								foreach($course_related_data as $realtedcrs){

									

									?>

									<div class="online-course-single">

										<figure>

											<img src="<?php echo base_url();?>uploads/courses_image/<?php echo $realtedcrs->image_src;?>" alt="<?php echo $realtedcrs->course_name;?>" class="imglike">

											<figcaption>

												<ul class="list-unstyled">

													<li><a href="<?php echo base_url();?>course/<?php echo $realtedcrs->course_slug;?>"><i class="fa fa-paper-plane-o"></i></a></li>

												<!--	<li><a href=""><i class="fa fa-heart-o"></i></a></li>-->

												</ul>

											</figcaption>

										</figure>

										<div class="online-course-details text-center">

											

											<h3><?php echo $realtedcrs->course_name;?></h3>

											

										

											<div class="course-details-btn">

												<a href="<?php echo base_url();?>course/<?php echo $realtedcrs->course_slug;?>">View Details</a>

											</div>

										</div>

									</div>

								<?php } ?>

								</div>

							</div><!-- Ends: .related-course -->

						</div><!-- Ends: .course-bottom-content -->

						

					</div><!-- Ends: .single-course-content -->

				</div><!-- Ends: .col-sm-8 -->



			</div>

		</div>

	</section>







<script>

function getUserData() {<?php /*?>

	FB.api('/me', { locale: 'en_US', fields: 'name, email, picture,id' }, function(response) {

		

		document.getElementById('response').innerHTML = '<div class="form-group"><br /><img src=' + response.picture.data.url+' class="img-circle">&nbsp;&nbsp; '+response.name+'</div><div class="form-group"></div><input type="hidden" class="form-control" name="profile_image" id="face_image" value="' + response.id+'"><input type="hidden" name="course_id" id="course_id" value="<?=$coursedetails->id?>"><input type="hidden" name="url" id="course_url" value="<?=$this->uri->segment(2);?>"><input type="hidden" class="form-control" name="name" id="face_name" value="'+response.name+'"><input type="hidden" class="form-control" name="email" id="face_email" value="'+response.email+'"><div class="form-group text-left"><br> <button  type="submit" class="btn el-btn-medium " onclick="facebookdate_subite();">Submit Comment</button> </div></div>';

	});

<?php */?>}

 

window.fbAsyncInit = function() {

	//SDK loaded, initialize it

	FB.init({

		appId      : '289891894937656',

		xfbml      : true,

		version    : 'v2.2'

	});

 

	//check user session and refresh it

	FB.getLoginStatus(function(response) {

		if (response.status === 'connected') {

			//user is authorized

			document.getElementById('loginBtn').style.display = 'none';

			getUserData();

		} else {

			//user is not authorized

		}

	});

};

 

//load the JavaScript SDK

(function(d, s, id){

	var js, fjs = d.getElementsByTagName(s)[0];

	if (d.getElementById(id)) {return;}

	js = d.createElement(s); js.id = id;

	js.src = "//connect.facebook.com/en_US/sdk.js";

	fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));

 

//add event listener to login button

document.getElementById('loginBtn').addEventListener('click', function() {

	

	//do the login

	FB.login(function(response) {

		if (response.authResponse) {

			//user just authorized your app

			document.getElementById('loginBtn').style.display = 'none';

			getUserData();

		}

	}, {scope: 'email,public_profile', return_scopes: true});

}, false);

					</script>



<script type="text/javascript" language="javascript">



function facebookdate_subite()

{

	//var face_image = $('#face_image').val();

	var face_name = $('#face_name').val();

	var face_email = $('#face_email').val();

	var rating_hidden = $('#rating_hidden').val();

	var face_message = $('#face_message').val();

	var course_id = $('#course_id').val();

	var course_url = $('#course_url').val();
	
	var fdbck_captcha = $('#fdbck_captcha').val();
	
	var fdbck_hdn_captcha = $('#fdbck_hdn_captcha').val();

	if(face_name=='')
	{
		alert('Please enter your full name');

		$('#face_name').focus();
	}
    else if(face_email=='')
	{
		alert('Please enter your email');

		$('#face_email').focus();
	}

	else if(face_message=='')

	{

		alert('Please enter your comment');

		$('#face_message').focus();

	}
	else if(fdbck_captcha=='')

	{

		alert('Please enter your captcha code');

		$('#fdbck_captcha').focus();

	}
	else if(fdbck_captcha!=fdbck_hdn_captcha)

	{

		alert('Please enter vaild captcha code');

		$('#fdbck_captcha').focus();

	}


	else

		{

			  $.ajax({

				  type:'POST',

				  url:"<?php echo base_url(); ?>" + "courses/submit_msg ",

				   data:{course_id:course_id,email:face_email,name:face_name,url:course_url,comment:face_message,rating:rating_hidden},

				  success:function(data)

				    {

					alert('Your comment has been placed successfully and will be reflected upon approval !!');

				    window.location.href="<?php echo base_url();?>course/"+course_url;

					}

				  

				  })

		}

	

}





</script> 

 

                    

<script type="text/javascript" language="javascript">

 

 $(document).ready(function(){

		

		var rating = 2;

		 $(".rateyo-readonly-widg").rateYo({

           starWidth: "20px",

		   ratedFill: "#f06817",

          rating: rating,

          numStars: 5,

          precision: 2,

          minValue: 1,

          maxValue: 5

        }).on("rateyo.change", function (e, data) {

        

          	console.log(data.rating);

          $('#rating_hidden').val(data.rating);

        });





        $('.ratingvalue').each(function(index){

        	var value = $(this).attr('id');

        	$(this).rateYo({

				starWidth: "20px",

				 ratedFill: "#f06817",

	          	rating: value,

	          	numStars: 5,

	          	precision: 2,

	          	minValue: 1,

	          	maxValue: 5

        	});





        });

	//$(".eg-input").elistars({ callback: testFunction });

	

	});

 

 

 </script>        

 

 

 





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
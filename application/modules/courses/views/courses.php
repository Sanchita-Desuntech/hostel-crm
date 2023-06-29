
<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Courses </h1>
					<ul class="list-unstyled">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="active">Courses</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
    <section class="padd60">
    
    <div class="container">
			<div class="row" style="z-index:-2;">
     <br />
                 <br />
    <div class="col-md-12 nopadding crsfrm">
                <div class="formbox">
           <input type="text" name="search_course" id="search_course" placeholder="Search Courses" class="form-control" onkeyup="course_search()" /> 
           <input type="hidden" name="search_slug" id="search_slug" value="" />
           <span id="srschgo"><i class="fa fa-search"></i></span>
           <div class="srchres"></div>
           </div>
           
                </div>
                   <script type="text/javascript" language="javascript">
function course_search(){
	
	var coursename = $('#search_course').val();
	//alert(coursename);
	$('.searchresult').show();
	
		  $.ajax({

				  type:'POST',
				  url:"<?php echo base_url(); ?>" + "coursesearch/search_data",
				  data:{coursename:coursename},
				  success:function(data)
				    {
					//alert(data);
					$('.srchres').html(data);
					}

				  

				  })
	
	
	}

function formres(resdata,crsslug)
{
	$('#search_course').val(resdata);
	$('#search_slug').val(crsslug);
	$('.searchresult').hide();
}

$(document).ready(function(){
	
	$('#srschgo').click(function(){
		
		var crs_lug_link = $('#search_slug').val();
		window.location.href= '<?php echo base_url();?>course/'+crs_lug_link;
		
		})
	
	})


</script>
                 </div>
                 </div>
    </section>
    
    
<section class="all-course-wrapper courses-11 courses padd60">
		<div class="container">
			<div class="row">
             
            
              
                 
                 
				<div class="col-md-12">
              

                
					<div class="course11-blocks">
						<div class="row container-custom course-slide" >  <!--id="example4"-->
					
                    <div id="load_data"></div>
                    <div class="col-md-12">
                    <div id="load_data_message"></div>
                    </div>
  
  <script type="text/javascript" language="javascript">
 
$(document).ready(function(){
 
 var limit = 8;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   method:"POST",
   url:"<?php echo base_url(); ?>"+"courselist/",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
	  //alert(data);
    $('#load_data').append(data);
    if(data=='&nbsp;')
    {
		
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='loadmoregif'></button>");
     action = "inactive";
    }
   }
  });
 }
 
 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>
                    
       <?php /*?>     <?php foreach($courses_list as $courseslist){?>
            
            <div class="col-lg-3">
            <div class="course-single">
							<div class="course-thumb">
								<img src="<?php echo base_url()?>uploads/courses_image/<?php echo $courseslist->image_src;?>" alt="<?php echo strip_tags($courseslist->course_name);?>" class="img-responsive">
							</div>
							<div class="course-details">
								<h3 class="text-center"> <?php echo $courseslist->course_name;?></h3>
                                <p class="text-center"><?php echo string_limit_words(strip_tags($courseslist->course_description),3)."...";?></p>
								<div class="course-teacher">
									
								</div>
								
							</div>
                            <div class="course-excerpt">
									
								</div>
							<div class="course-hover">
								<div class="course-hover-content">
									
									<a href="<?php echo base_url();?>course/<?php echo $courseslist->course_slug;?>">Read More</a>
								</div>
							</div>
						</div>
            </div>
              
              <?php } ?><?php */?>
           
       		
			
						</div>
					</div>
					
				
				</div>

			</div>
		</div>
	</section>
	
	
		
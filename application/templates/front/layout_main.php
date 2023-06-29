
<!DOCTYPE html>
<html>
<head>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<title><?php echo $title;?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?php echo $MetaKeyword;?>">
<meta name="description" content="<?php echo $MetaDescription;?>">
<meta name="robots" content="<?php if($MainIndex!=''){ echo $MainIndex; } else  { echo 'index';}?>, <?php if($RobotIndex!=''){ echo $RobotIndex; } else  { echo 'follow';}?>" />
    <link rel="canonical" href="<?php echo $CanonicalTag;?>" />
<meta name="author" content="Desun Technology">
<link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/bootstrap-theme.min.css">
<!--Custom Css-->
<link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/custom.css">
<link rel="stylesheet" href="<?php echo base_url()?>themes/front/css/thum-slide.css">
<!--Fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

</style>
</head>
<?php $current_url=base_url(uri_string());
?>
<body <?php if(base_url()==$current_url){?>class="home"<?php } ?> >

<header class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
			 <div class="col-lg-4">
			 	<div class="logo"><a href="<?php echo base_url()?>home"><img src="<?php echo base_url()?>themes/front/images/logo2.png" alt="" /></a></div>
			 </div>
			 <div class="col-lg-5">
			 	<div class="search">
			 	 <form>
			 		<input type="search" name="search" class="search-field" placeholder="Search Movies.."/>
			 		<button><i class="fa fa-search" aria-hidden="true"></i></button>
			 	</form>
			 	<?php //print_r($this->session->all_userdata());
				 	//exit;?>
			 	</div>
			 </div>
			 
			 <?php if($this->session->userdata('is_front_logged_in')==1) { ?>
			 	 <div class="col-lg-3">
			 	 <nav>
				 	<ul class="acclogin pull-right">
				 	<li>
				 	<?php if($this->session->userdata('full_name')== '') { ?>
				 	<a href="javascript:void(0)">Hi,Guest</a>
				 	<?php } else { ?>
				 	<a href="javascript:void(0)">Hi,
				 	<?php 
				 	//echo $this->session->userdata('user_code');
				 	 $user_data = get_user_data($this->session->userdata('user_code'));?>
				 		<?php
				 		echo $user_data[0]['full_name'];
				 		?>
				 	</a>
				 	<?php } ?>
					 	<ul>
					 		<li><a href="<?php echo base_url()?>users">My Profile</a></li>
					 		<li><a href="<?php echo base_url()?>login/logout">Log Out</a></li>
					 	</ul>
				 	</li>
				 	</ul>
				 </nav>
				 </div>
				 
				<!-- The Modal -->
				

			 <?php } else { ?>
				 <div class="col-lg-3">
				 	<ul class="acclogin pull-right">
					 	<li><a href="<?php echo base_url()?>login">Sign In</a></li>
					 	<li>|</li>
					 	<li><a href="<?php echo base_url()?>userregistration">Sign Up</a></li>
					 </ul>
				 </div>
			 <?php } ?>
			 <div class="clearfix"></div>
	        </div>
	   </div>
   </div>		
</header>
<section class="container-fluid menu-wrap">
	<div class="row">
		<div class="container">
			<div class="row">
			 <div class="col-lg-6">
			 	<nav>
			 		<ul>
			 		<?php
                        $menu_list = get_menu_list();
                        
                        foreach($menu_list as $menulist)
                        { 
                        //print_r($menu_list);die();
                        ?>
				   	<li><a href="javascript:void(0)"><?php echo $menulist['cat_name'];?></a>
				   	 <ul>
				   	 	<?php
                        $dropdown_menu_list = get_dropdownmenu_list($menulist['id']);
                        
                        foreach($dropdown_menu_list as $dropdownmenulist)
                        { 
                        //print_r($dropdown_menu_list);die();
                        ?>
				   	 	<li><a href="<?php echo base_url()?>category/<?php echo $dropdownmenulist['slug'];?>"><?php echo $dropdownmenulist['cat_name'];?></a></li>
				   	 	<?php } ?>
				   	 	<!--<li><a href="<?php echo base_url()?>movies">New</a></li>
				   	 	<li><a href="<?php echo base_url()?>movies">Genres</a></li>
				   	 	<li><a href="<?php echo base_url()?>movies">Collections</a></li>-->
				   	 </ul>
				   	</li>
				   	<?php } ?>
				   </ul>
			 	</nav>
			 </div>
			 <!--<div class="col-lg-6">
			 	<ul class="cartwrap pull-right">
				 	<li><a href=""><i class="fa fa-shopping-bag" aria-hidden="true"></i> [2]</a></li>
				 </ul>
			 </div>-->
			 <div class="clearfix"></div>
			</div>
		</div>
	</div>
</section>

<?php echo $template['body']; ?>

<footer class="container-fluid pd">
	<div class="row">
		<div class="container">
			<div class="row">
			<?php
                        $menu_list = get_menu_list();
                        //print_r($menu_list);die();
                        foreach($menu_list as $menulist)
                        { 
                        
                        ?>
			  <div class="col-lg-3">
			  	<h3><a href="javascript:void(0)"><?php echo $menulist['cat_name'];?></a></h3>
			  	<ul>
			  		<?php
                        $dropdown_menu_list = get_dropdownmenu_list($menulist['id']);
                        
                        foreach($dropdown_menu_list as $dropdownmenulist)
                        { 
                        //print_r($dropdown_menu_list);die();
                        ?>
				   	 	<li><a href="<?php echo base_url()?>category/<?php echo $dropdownmenulist['slug'];?>"><?php echo $dropdownmenulist['cat_name'];?></a></li>
				   	 	<?php } ?>
			  	</ul>
			  </div>
			<?php } ?>
			  
			  <div class="clearfix"></div>
			  <center><h1><div class="logo"><a href=""><img src="<?php echo base_url()?>themes/front/images/logo.png" alt="" /></a></div></h1></center>
			  <div class="social">
			  	<ul>
			  		<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			  		<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			  		<li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			  		<li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			  		<li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
			  	</ul>
			  </div>
			  <ul class="footer-inline">
			  	<li><a href="">Terms Of Use</a></li>
			  	<li>|</li>
			  	<li><a href="">Privacy Policy</a></li>
			  	<li>|</li>
			  	<li><a href="">Rewards Terms</a></li>
			  	<li>|</li>
			  	<li><a href="<?php echo base_url()?>aboutus">About Us</a></li>
			  	<li>|</li>
			  	<li><a href="<?php echo base_url()?>terms">Terms And Conditions</a></li>
			  	<li>|</li>
			  	<li><a href="">On Demand Service Terms</a></li>
			  </ul>
			  <hr>
			  <div class="copyright">
			  	© 2019, Redbox.com
			  </div>
			  <div class="clearfix"></div>
	        </div>
	   </div>
   </div>
</footer>
<!--Js-->
<script src="<?php echo base_url()?>themes/front/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>themes/front/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>themes/front/js/slider.js"></script>
    <script type="text/javascript">
     $(function() {
      $('#slides').slidesjs({
        width: 940,
        height: 528,
        navigation: {
          effect: "fade"
        },
        pagination: {
          effect: "fade"
        },
        effect: {
          fade: {
            speed: 1800
          }
        },
        play: {
          effect: "fade",
          auto: true
        }
      });
    });
</script>
<script src="<?php echo base_url()?>themes/front/js/thum-slide.js"></script>
<script type="text/javascript">
$('.responsive').slick({
  dots: false,
  infinite: true,
  speed: 800,
  autoplay:false,
  navigation : true,
  arrows: true,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
 nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  slidesToShow: 7,
  slidesToScroll: 7,  
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 7,
        slidesToScroll:7,
        infinite: true,
        autoplay:true,
        dots: true
  
      }
    },
    {
      breakpoint: 600,
      settings: {
      	autoplay:true,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
      	autoplay:true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.responsive1').slick({
  dots: false,
	prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
 nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  infinite: true,
  speed: 800,
  autoplay:false,
  slidesToShow: 7,
  slidesToScroll: 7,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 7,
        slidesToScroll:7,
        infinite: true,
        autoplay:true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
      	autoplay:true,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
      	autoplay:true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.responsive2').slick({
  dots: false,
	prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
 nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  infinite: true,
  speed: 800,
  autoplay:false,
  slidesToShow: 7,
  slidesToScroll: 7,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 7,
        slidesToScroll:7,
        infinite: true,
        autoplay:true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
      	autoplay:true,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
      	autoplay:true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$(document).ready(function(){
  $(".load").slice(0, 5).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".load:hidden").slice(0, 5).slideDown();
    if($(".load:hidden").length == 0) {
      $("#loadMore").text("No Content").addClass("noContent");
    }
  });
  
})

</script>

</body>
</html>
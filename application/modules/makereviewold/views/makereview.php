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

<!--breadcrumbs-->
<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
<nav class="breadcrumbs">
	<ul>
		<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
		<li><a href="<?php echo base_url()?>recipe" title="Recipe">Recipe</a></li>
		<li>Ratings & Reviews</li>
	</ul>
</nav>
<!--//breadcrumbs-->
	<div class="row">
		<header class="s-title">
			<h1><?php echo ucwords($data->recipe_name);?></h1>
		</header>
		<div class="container">
			<div class="row">
			<div class="col-md-3">
			  <div class="boxwhite">
				<h4>What makes a good review</h4>
<h5>Have you used this product?</h5>
<hr>
<p>Your review should be about your experience with the product.</p>
<h5>Why review a product?</h5>
<hr>
<p>Your valuable feedback will help fellow shoppers decide!</p>
<h5>How to review a product?</h5>
<hr>
<p>Your review should include facts. An honest opinion is always appreciated. If you have an issue with the product or service please contact us from the <a href="">help centre.</a></p>
			  </div>
			</div>
			<div class="col-md-9">
			  <div class="rating-box">
			  	<h4>Rate this product</h4>
			  	
			  	<form action="" method="post">
			  	<div class="stars">
			  	<input class="star star-1" onclick="rating(this.val,this.id)" id="star-1" value="1" type="radio" name="star"/>
			    <label class="star star-1" for="star-1"></label>
			    
			    <input class="star star-2" onclick="rating(this.val,this.id)" value="2" id="star-2" type="radio" name="star"/>
			    <label class="star star-2" for="star-2"></label>
			    
			    <input class="star star-3" onclick="rating(this.val,this.id)" value="3" id="star-3" type="radio" name="star"/>
			    <label class="star star-3" for="star-3"></label>
			    
			    <input class="star star-4" onclick="rating(this.val,this.id)" id="star-4" value="2" type="radio" name="star"/>
			    <label class="star star-4" for="star-4"></label>
			    <input class="star star-5" onclick="rating(this.val,this.id)" value="5" id="star-1" type="radio" name="star"/>
			    <label class="star star-5" for="star-5"></label>
			    </div>
			  	<hr>
			  	<h5>Review this product</h5>
			  	<textarea name="description" id="description" class="form-control full" placeholder="Description"><?php echo set_value('description'); ?></textarea>
			  	<textarea name="title" id="title" class="form-control small" placeholder="Title"><?php echo set_value('title'); ?></textarea>
			  	<input type="hidden" value="<?php echo $data->recipe_code;?>" name="ref_code" id="ref_code"/>
			  	<input type="hidden" value="<?php echo $data->user_code;?>" name="user_code"/>
			  	<br>
			  	
			  	<input type="submit" name="save" value="SUBMIT" class="button form__submit pull-right"/>
			  
			  
			  	
			  	<div class="clearfix"></div>
			  	</form>
		`		
			  </div>
			<div class="clearfix"></div>
			</div>
			   
			</div>
		</div>
	</div>

		</div>
		<!--wrap-->
	</main>
<!--main-->
	
			
			
			
<script>
	function rating(val,id){
		var val=id.slice(5);
		if(val==1){
			document.getElementById("description").innerHTML="not too good";
			document.getElementById("title").innerHTML="Don't waste your money";
			
		}else if(val==2){
			document.getElementById("description").innerHTML="not too good";
			document.getElementById("title").innerHTML="Unsatisfactory";
			
		}else if(val==3){
			document.getElementById("description").innerHTML="Good";
			document.getElementById("title").innerHTML="Just okay";
			
		}else if(val==4){
			document.getElementById("description").innerHTML="Wonderful Product";
			document.getElementById("title").innerHTML="Brilliant";
			
		}else if(val==5){
			document.getElementById("description").innerHTML="Excellent Product";
			document.getElementById("title").innerHTML="Must buy!";
			
		}
	}
</script>
	
	
	
	
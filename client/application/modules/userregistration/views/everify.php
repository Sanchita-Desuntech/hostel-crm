
<style>
	.failed {
		color: #fff;
	    background: #d20e0e;
	    border-radius: 7px;
	    text-align: center;
	    padding: 2%;
	    font-size: 23px;
	    width: 24%;
	    margin: 8% 34%;
	    font-family: serif;
	    box-shadow: 2px 1px 7px 0px #333;
	}
	.succ {
		color: #fff;
	    background: #068e23;
	    border-radius: 7px;
	    text-align: center;
	    padding: 2%;
	    font-size: 23px;
	    width: 24%;
	    margin: 8% 34%;
	    font-family: serif;
	    box-shadow: 2px 1px 7px 0px #333;
	}
</style>
	
<?php	if($msg == "1"){ ?>
		<div class="succ">
		  <span>Thank You, Your email has been verified successfully.</span>	
		  <span id="dvCountDown" style = 'display:none'>You will be redirected within <span id = 'lblCount'></span>&nbsp;seconds.</span>
		</div>
		
		
		
<?php }else{ ?>
		<div class="failed">
			<span>Sorry! You have already verified this email.</span>	
			<span id="dvCountDown" style = 'display:none'>You will be redirected within <span id = 'lblCount'></span>&nbsp;seconds.</span>
		</div>
		

		
<?php } ?>

<script>
		  	var seconds = 5;
				var dvCountDown = document.getElementById("dvCountDown");
				var lblCount = document.getElementById("lblCount");
				dvCountDown.style.display = "block";
				lblCount.innerHTML = seconds;
				setInterval(function () {
					seconds--;
					lblCount.innerHTML = seconds;
					if (seconds == 0) {
						dvCountDown.style.display = "none";
						window.location = "<?php echo base_url();?>client/login";
					}
				}, 1000);
      </script>
  

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
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li>Submit a recipe</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Add a new recipe</h1>
				</header>
					
				<!--content-->
				<section class="content full-width">
					<div class="submit_recipe container">
						<form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
							<section>
								<h2>Basics</h2>
								<p>All fields are required.</p>
								<div class="f-row">
									<div class="full">
									<input name="recipe_name" type="text" value="<?php echo set_value('recipe_name'); ?>" class="form-control" placeholder="Enter Recipe Name">
										<?php echo form_error('recipe_name','<div class="error">','</div>'); ?>
									</div>
								</div>
								
								<div class="f-row">
									<div class="third">
										<select>
											<option selected="selected">Select preparation time (minutes)</option>
											<?php

										    for ($i=1; $i<=180; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"><?php echo $i;?></option>

										        <?php

										    }

										?>
										</select>
									</div>
									<div class="third">
										<select>
											<option selected="selected">Select cook time (minutes)</option>
											<?php

										    for ($i=1; $i<=180; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"><?php echo $i;?></option>

										        <?php

										    }

										?>
										</select>
									</div>
									<div class="third">
										<select>
											<option selected="selected">Select serving (people)</option>
											<?php

										    for ($i=1; $i<=10; $i++)

										    {

										        ?>

										            <option value="<?php echo $i;?>"><?php echo $i;?></option>

										        <?php

										    }

										?>
										</select>
									</div>
								
								</div>
								<div class="f-row">
								    <div class="third">
									    <select>
									    	<option selected="selected">Select Difficulty</option>

	                                    	<?php foreach($all_difficulty as $dfa){?>

												<option value=<?php echo $dfa->id;?>><?php echo $dfa->name;?></option>

											<?php } ?>
									    </select>
									    </div>
									<div class="third">
										<select>
											<option selected="selected">Select Meal Course</option>

                                    	<?php foreach($all_meal as $mav){?>

											<option value=<?php echo $mav->id;?>><?php echo $mav->name;?></option>

										<?php } ?>
										</select>
									</div>
								</div>
							</section>
							
							<section>
								<h2>Recipe categories</h2>
								<div class="f-row">
								<?php foreach ($recipe_category_data as $catdata) { ?>
									<div class="checkbox-option-wrapper">
									     <div class="checker" id="uniform-uniq-label-id-5cf64087086fe">
									            <span><input type="checkbox" id="uniq-label-id-5cf64087086fe" value="<?php echo $catdata->id;?>" name="recipe_categories[]"></span>
									     </div>
									     <label for="uniq-label-id-5cf64087086fe"><?php echo $catdata->cat_name;?></label>
									</div>
									<?php } ?>
								</div>
							</section>
							
							<section>
								<h2>Description</h2>
								<div class="f-row">
									<div class="full"><textarea placeholder="Recipe title" name="description"></textarea></div>
								</div>
							</section>	
							<section>
								<h2>Instructions <span>(enter instructions, each step at a time)</span></h2>
								<div class="f-row instruction">
									<div class="full">
									<input name="inst_name[]" type="text" value="" class="form-control" placeholder="Enter Name" id="instname1">
									</div>
									<a class="remove remove_instruction" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow1" href="javascript:void(0);" onclick="removeRowInstruction(this.id);">-</a>
									<!--<button class="remove">-</button>-->
								</div>
								<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="file" name="ins_image[]" id="inputsliderimage1" accept="image/*" />
								</div>
							</section>
								<div class="f-row full">
									<a class="add" href="javascript:void(0);" onclick="addRowInstruction();">Add a new step</a>
									<!--<button class="add">Add a new step</button>-->
								</div>
							</section>
							<section>
								<h2>Ingredients</h2>
								<div class="f-row ingredient">
									<div class="large">
									<input name="ing_name[]" type="text" value="" class="form-control" placeholder="Enter Recipe Ingredients" id="ingredient_name1">
										
									</div>
									<div class="small"><input name="ing_quantity[]" type="text" value="<?php echo set_value('quantity'); ?>" class="form-control" placeholder="Quantity" id="quantityIngredients"></div>
									<div class="third">
									<select>
									<option selected="selected">Select Ingredients Unit</option>

                                    	<?php foreach($all_unit as $alu){?>

											<option value=<?php echo $alu->id;?>><?php echo $alu->name;?></option>

										<?php } ?>
									</select>
									</div><a class="remove remove_ingredients" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow1" href="javascript:void(0);" onclick="removeRowIngredients(this.id);">-</a>
									<!--<button class="remove">-</button>-->
								</div>
								
								<div class="f-row full">
								<a class="add add_ingredient" href="javascript:void(0);" onclick="addRowIngredients();" style="color: #ff0000;font-weight: bold;">Add an ingredient</a>
										<input type="hidden" name="ingredientscount" id="ingredientscount" value="1"/>
									<!--<button class="add">Add an ingredient</button>-->
								</div>
							</section>	
							<section>
								<h2>Nutritional elements</h2>
								<div class="f-row ingredient">
									<div class="large"><input name="ne_name[]" type="text" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Enter Nutritional elements" id="nutritional_name1"></div>
									<div class="small"><input name="ne_quantity[]" type="text" value="<?php echo set_value('quantity'); ?>" class="form-control" placeholder="Quantity" id="quantityNutritional"></div>
									<div class="third">
									<select>
									<option selected="selected">Select Nutritional elements Unit</option>

                                    	<?php foreach($all_unit as $alu){?>

											<option value=<?php echo $alu->id;?>><?php echo $alu->name;?></option>

										<?php } ?>
									</select>
									</div><a class="remove remove_nutritional" style="float: right; font-size: 37px; padding: 0;width: 37px;height: 37px; text-align: center; line-height: 37px; background: #D20702 !important;" id="delRow1" href="javascript:void(0);" onclick="removeRowNutritional(this.id);">-</a>
									<!--<button class="remove">-</button>-->
								</div>
								
								<div class="f-row full">
								<a class="add add_Nutritional" href="javascript:void(0);" onclick="addRowNutritional();" style="color: #ff0000;font-weight: bold;">Add a nutritional element</a>
										<input type="hidden" name="nutritionalcount" id="nutritionalcount" value="1"/>
									<!--<button class="add">Add an nutritional elements</button>-->
								</div>
							</section>
							
							
							<section>
								<h2>Photo</h2>
								<div class="f-row full">
									<input type="file" name="feature_image" id="inputsliderimage" accept="image/*" />
								</div>
							</section>	
							
							<section>
								<h2>Status <span>(would you like to further edit this recipe or are you ready to publish it?)</span></h2>
								<p>The administrator of this website has opted to review submissions before publishing. After you hit submit, your recipe will be published as soon as the administrator has reviewed it.</p>
								<div class="f-row full">
									<input type="radio" id="r1" name="radio"/>
									<label for="r1">I am still working on it</label>
								</div>
								<div class="f-row full">
									<input type="radio" id="r2" name="radio"/>
									<label for="r2">I am ready to publish this recipe</label>
								</div>
							</section>
							
							<div class="f-row full">
								<input type="submit" class="button" id="submitRecipe" value="Save this recipe" />
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
	
	
<script>
function addRowInstruction() {

 	var lcount=jQuery("#instructionCount").val();	

	//alert(lcount);

	var name=$("#instname"+lcount).val();

	

	if(name=='NaN' || name=='' || name==null){

		alert("Please enter recipe instructuction before add new row");

	}else{

		var newCount=parseInt(lcount)+1;

		jQuery("#rowInstruction"+lcount).clone()

			.attr("id","rowInstruction"+newCount)

			.find(':input').each(function(){

				var nameOnly=this.id.replace(/\d+/g, '');

				//alert(nameOnly);

				var newId=nameOnly+newCount;

				//alert(newId);

            	jQuery(this).prev().attr('for', newId);

            	this.id = newId;

			}).end()

			.insertAfter("#rowInstruction"+lcount);

		

		jQuery("#rowInstruction"+newCount+" a").attr("id","delRow"+newCount);

		/*jQuery("#pack"+newCount+' h5').html('Package '+newCount);*/

		jQuery("#rowInstruction"+newCount).find('input:text').val('');

		
		jQuery("#instname"+newCount).focus();

		jQuery("#instname"+newCount).val('');
		jQuery("#inputsliderimage"+newCount).val('');
		

		jQuery("#instructionCount").val(newCount);

	}
}

function removeRowInstruction(id){

	var lastId=id.slice(6);

	

	if(lastId==1){

		alert("Default row cannot be deleted!");

	}else{

		jQuery("#rowInstruction"+lastId).remove();

		

		var lcount=jQuery("#instructionCount").val();	

		var newCount=parseInt(lcount)-1;

		jQuery("#instructionCount").val(newCount);

		var i=1;

		

	}

	

}

function addRowIngredients() {

 	var lcount=jQuery("#ingredientscount").val();	

	//alert(lcount);

	var ingredient_name=$("#ingredient_name"+lcount).val();

	

	if(ingredient_name=='NaN' || ingredient_name=='' || ingredient_name==null){

		alert("Please enter recipe ingredient before add new row");

	}else{

		var newCount=parseInt(lcount)+1;

		jQuery("#rowIngredients"+lcount).clone()

			.attr("id","rowIngredients"+newCount)

			.find(':input').each(function(){

				var nameOnly=this.id.replace(/\d+/g, '');

				//alert(nameOnly);

				var newId=nameOnly+newCount;

				//alert(newId);

            	jQuery(this).prev().attr('for', newId);

            	this.id = newId;

			}).end()

			.insertAfter("#rowIngredients"+lcount);

		

		jQuery("#rowIngredients"+newCount+" a").attr("id","delRow"+newCount);

		/*jQuery("#pack"+newCount+' h5').html('Package '+newCount);*/

		jQuery("#rowIngredients"+newCount).find('input:text').val('');

		
		jQuery("#name"+newCount).focus();

		jQuery("#name"+newCount).val('');
		jQuery("#quantityIngredients"+newCount).val('');
		jQuery("#unitIngredients"+newCount).val('');
		

		jQuery("#ingredientscount").val(newCount);

	}
}

function removeRowIngredients(id){

	var lastId=id.slice(6);

	

	if(lastId==1){

		alert("Default row cannot be deleted!");

	}else{

		jQuery("#rowIngredients"+lastId).remove();

		

		var lcount=jQuery("#ingredientsCount").val();	

		var newCount=parseInt(lcount)-1;

		jQuery("#ingredientsCount").val(newCount);

		var i=1;

		

	}

	

}


function addRowNutritional() {

 	var lcount=jQuery("#nutritionalcount").val();	

	//alert(lcount);

	var nutritional_name=$("#nutritional_name"+lcount).val();

	

	if(nutritional_name=='NaN' || nutritional_name=='' || nutritional_name==null){

		alert("Please enter recipe nutritional before add new row");

	}else{

		var newCount=parseInt(lcount)+1;

		jQuery("#rowNutritional"+lcount).clone()

			.attr("id","rowNutritional"+newCount)

			.find(':input').each(function(){

				var nameOnly=this.id.replace(/\d+/g, '');

				//alert(nameOnly);

				var newId=nameOnly+newCount;

				//alert(newId);

            	jQuery(this).prev().attr('for', newId);

            	this.id = newId;

			}).end()

			.insertAfter("#rowNutritional"+lcount);

		

		jQuery("#rowNutritional"+newCount+" a").attr("id","delRow"+newCount);

		/*jQuery("#pack"+newCount+' h5').html('Package '+newCount);*/

		jQuery("#rowNutritional"+newCount).find('input:text').val('');

		
		jQuery("#name"+newCount).focus();

		jQuery("#name"+newCount).val('');
		jQuery("#quantityNutritional"+newCount).val('');
		jQuery("#unitNutritional"+newCount).val('');
		

		jQuery("#nutritionalcount").val(newCount);

	}
}

function removeRowNutritional(id){

	var lastId=id.slice(6);

	

	if(lastId==1){

		alert("Default row cannot be deleted!");

	}else{

		jQuery("#rowNutritional"+lastId).remove();

		

		var lcount=jQuery("#nutritionalCount").val();	

		var newCount=parseInt(lcount)-1;

		jQuery("#nutritionalCount").val(newCount);

		var i=1;

		

	}

	

}
</script>
<?php
 function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}
?>

<?php foreach($courses_list as $courseslist){?>
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
<div class="course-excerpt"></div>
<div class="course-hover">
<div class="course-hover-content">
<a href="<?php echo base_url();?>course/<?php echo $courseslist->course_slug;?>">Read More</a>
</div>
</div>
</div>
</div>
<?php } ?>

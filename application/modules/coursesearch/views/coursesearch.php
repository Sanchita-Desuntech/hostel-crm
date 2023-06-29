<style>
.searchresult{ position:absolute !important;height:250px;width:85%;}
.searchresult ul{ list-style-type:none; width:100%; padding:0; margin:0; border-radius:3px; overflow-y:auto;height:250px;  }
.srchres .searchresult li { border-bottom:1px solid #E6E6E6; border-left:1px solid #E6E6E6; border-right:1px solid #E6E6E6; padding:7px 12px; background:#fff  !important; text-align:left !important;}
.srchres .searchresult a{ color:#333; width:100%; display:inline-block;}
.srchres .searchresult a li:hover{ background:#f06817 !important; border-left:#f06817; }
.srchres .searchresult a:hover{background:#f06817; color:#fff; padding-left:3px; display:inline-block; width:100%;}
.nodata{ position:absolute; color:#000; padding:2%;}
</style>
<div class="searchresult">
<ul class="">
<?php 
foreach($courses_list as $courseslist){?>
<a href="javascript:void(0);" onclick="formres('<?php echo $courseslist->course_name; ?>','<?php echo $courseslist->course_slug; ?>');"><li><?php echo $courseslist->course_name; ?></li></a>
<?php } ?>
</ul>
</div>


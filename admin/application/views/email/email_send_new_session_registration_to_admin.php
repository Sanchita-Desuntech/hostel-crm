<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Mastersession Registration</title>
</head>
<?php
				$doctor_name_array=array();
                 $session_doc_array=explode(",",$session_doc_id);
				foreach($session_doc_array as $single_doctor)  {
                        $var=session_doc_detail($single_doctor); 
						
						array_push($doctor_name_array,$var[0]['doctor_name']);
				}
                $name_str = implode(",",$doctor_name_array)				
						?>
<body style="padding:20px;">
<table style="font:14px normal Arial, Helvetica, sans-serif; color:#343434; width:100%;  border:1px solid #2ca688; padding:15px;">
	<tbody>
    <tr><td style=" padding:3px 10px; color:#2ca688; font-weight:700; font-size:26px;">Hello,</td></tr>
    <tr><td style=" padding:3px 10px 25px; color:#2f3030; font-size:18px;">New registration for Master Session of</td></tr>
    <tr><td style=" padding:1px 10px; color:#2f3030; font-weight:700;">MasterDoctor : <span style="font-weight:400;"><?=$name_str?></span></td></tr>
    <tr><td style=" padding:0 10px;"><span style="height:2px; vertical-align:middle; background-color:#2ca688; width:30px; display:inline-block;"></span></td></tr>
    <tr><td style=" padding:18px 10px 1px 10px; color:#2f3030; font-weight:700;">Topic : <span style="font-weight:400;">{topic}</span></td></tr>
    <tr><td style=" padding:0 10px;"><span style="height:2px; vertical-align:middle; background-color:#2ca688; width:30px; display:inline-block;"></span></td></tr>
    <tr><td style=" padding:18px 10px 1px 10px; color:#2f3030; font-weight:700;">Registrant Detail : <span style="font-weight:400;">{first_name} {last_name}({memid})</span></td></tr>
    <tr><td style=" padding:0 10px;"><span style="height:2px; vertical-align:middle; background-color:#2ca688; width:30px; display:inline-block;"></span></td></tr>
  <tr><td style=" padding:18px 10px 1px 10px; color:#2f3030; font-weight:700;">Contact No : <span style="font-weight:400;">{mobile}</span></td></tr>
    <tr><td style=" padding:0 10px;"><span style="height:2px; vertical-align:middle; background-color:#2ca688; width:30px; display:inline-block;"></span></td></tr>
    <tr><td style=" padding:18px 10px 1px 10px; color:#2f3030; font-weight:700;">Notes : <span style="font-weight:400;">{notes}</span></td></tr>
    <tr><td style=" padding:0 10px;"><span style="height:2px; vertical-align:middle; background-color:#2ca688; width:30px; display:inline-block;"></span></td></tr>
    </tbody>
</table>
</body>
</html>
<!--Hello,
New registration for Master Session of

MasterDoctor: 
Topic:
Registrant Detail:
Contact No: 
Notes: -->
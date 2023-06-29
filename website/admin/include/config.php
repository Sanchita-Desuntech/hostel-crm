<?php

$hostname     = "localhost";

$username     = "ehostsx4_crmvalogical";

$password     = "-oXKu@DWb^y%";

$databasename = "ehostsx4_valogical_website";

session_start();

// Create connection 

$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection 

if ($conn->connect_error) {

  die("Unable to Connect database: " . $conn->connect_error);
}

if ($_SESSION['logged_in'] != 1) {

  header("location:login.php?log=At First You Need To Login For Access other Pages");
}



function UploadFile($file)

{

  $data = [];

  $target_dir = "upload/";



  $image = basename($file['image']['name']);



  $image_tep_name = $_FILES['image']['tmp_name'];



  if (!move_uploaded_file($image_tep_name, $target_dir . $image)) {

    $data = [

      'success' => false,

      'image' => $image

    ];

    return $data;
  }

  $data = [

    'success' => true,

    'image' => $image

  ];



  return $data;
}

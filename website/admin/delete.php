<?php
include("include/config.php");
$id = $_GET['id'];

$sql = "DELETE FROM testimonials WHERE `testimonial_id` = '$id'";
$results = mysqli_query($conn, $sql);

if ($results) {
    $err['msg'] = "Deleted Successfully.";
    header('Location: testimonialse.php');
} else {
    $err = mysqli_error($conn);
    echo "Not Delete successfully due to this error -----> $err";
}

<?php

session_start();

$hostname     = "localhost";

$username     = "ehostsx4_crmvalogical";

$password     = "-oXKu@DWb^y%";

$databasename = "ehostsx4_valogical_website";

$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection 

if ($conn->connect_error) {

  die("Unable to Connect database: " . $conn->connect_error);
}

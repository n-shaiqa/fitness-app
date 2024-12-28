<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "FitnessBuddySecure";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed: " . mysqli_conenct_error());
}
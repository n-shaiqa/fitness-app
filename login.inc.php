<?php

if(isset($_POST["submit"])){
	
	require_once 'dbh.inc.php';
	require_once 'loginFunctionsALLsafe.inc.php';
	
	/*
	-make "functionsBRUTEvuln.inc.php" for brute-force vulenrable
	-make "functionsBRUTEsafe.inc.php" for brute-force secure
	-make "functionsSQLIvuln.inc.php" for SQLi vulnerable
	---------------------------------------------------------------
	-make "loginFunctionsALLsafe.php" for Brute, SQLi, captcha, and password encryption: USE THIS FOR ATTACKING PROGRAM!!!!
	---------------------------------------------------------------
	- 'signupFunctions.inc.php'
	- ' OR '1'='1' -- ' OR '1'='1' 
	*/
	
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	
	
	$username = mysqli_real_escape_string($conn, $username);
    $pwd = mysqli_real_escape_string($conn, $pwd);
	//comment out the empty password check for SQLi and bruteforce
	
if(emptyInputLogin($username,$pwd) !== False){
	header("location: ../login.php?error=emptylogin");
		  exit;
}

	
	loginUser($conn, $username, $pwd);
	}
	else{
		header("location: ../login.php");
		exit();
	}
	

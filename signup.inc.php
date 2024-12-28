<?php

if(isset($_POST["submit"])){
	require_once 'dbh.inc.php';
	require_once 'signupFunctions.inc.php';
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];
	
	//--------------------------------------
	//All variables below are captcha related
	//--------------------------------------
	$secretkey = "6Leu3osdAAAAAGk0GfeoiDr7wrTe9UtR5IvwGUL2";
	$responsekey = $_POST['g-recaptcha-response'];
	$userIP = $_SERVER['REMOTE_ADDR'];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$userIP";
	$response = file_get_contents($url);
	$response = json_decode($response);
	
	//--------------------------------------
	//All variables above are captcha related
	//--------------------------------------
	
	$name = mysqli_real_escape_string($conn, $name);
	$email = mysqli_real_escape_string($conn, $email);
	$username = mysqli_real_escape_string($conn, $username);
	$pwd = mysqli_real_escape_string($conn, $pwd);
	$pwdRepeat = mysqli_real_escape_string($conn, $pwdRepeat);
	
	if(emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat) !== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if(invalidUid($username) !== false){
		header("location: ../signup.php?error=invaliduid");
		exit();
	}
	if(invalidEmail($email) !== false){
		header("location: ../signup.php?error=invalidemail");
		exit();
	}
	if(pwdMatch($pwd,$pwdRepeat) !== false){
		header("location: ../signup.php?error=passwordsdontmatch");
		exit();
	}
	if(uidExists($conn,$username,$email) !== false){
		header("location: ../signup.php?error=usernametaken");
		exit();
	}
	if(certifyCaptcha($response) !== false){
		header("location: ../signup.php?error=checkcaptcha");
		exit();
	}
	
	createUser($conn, $name, $email,$username, $pwd);
	
}
else {
	header("location: ../signup.php");
	exit();
}
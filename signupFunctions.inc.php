<?php

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){
	
	$result;
	
	if( empty($name) || empty($email) ||
		empty($username) || empty($pwd) || 
		empty($pwdRepeat)){
		
		$result = true;
	}else{
		$result = false;
	}
	return $result;
	}

function invalidUid($username){
	
	$result;
	
	if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		$result = true;
	}else{
		$result =false;
	}
	return $result;
	}
function invalidEmail($email){
	
	$result;
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result = true;
	}else{
		$result =false;
	}
	return $result;
	}
function pwdMatch($pwd,$pwdRepeat){
	
	$result;
	
	if($pwd !== $pwdRepeat){
		$result = true;
	}else{
		$result =false;
	}
	return $result;
	}
function uidExists($conn, $username,$email){
	
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtbrehfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt,"ss", $username,$email);
	mysqli_stmt_execute($stmt);
	
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
	
	}
function emptyInputLogin($username,$pwd){
	
	$result;
	
	if( empty($username) || empty($pwd)){
		
		$result = true;
	}else{
		$result = false;
	}
	return $result;
	}
function createUser($conn, $name, $email,$username, $pwd){
	
	$sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES(?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt,"ssss", $name,$email,$username,$hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?error=none");
	exit();
	
	
	}
	
function certifyCaptcha($response){
	if($response->success){
		return false;
	}
	else
		return true;
}

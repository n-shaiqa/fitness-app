<?php
	
	function emptyInputLogin($username,$pwd){
	
	$result;
	
	if( empty($username) || empty($pwd)){
		
		$result = true;
	}else{
		$result = false;
	}
	return $result;
	}
	function uidExists($conn, $username){
	
	$sql = "SELECT * FROM users WHERE usersUid = ?;";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtbrehfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt,"s", $username);
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
	function loginUser($conn,$username,$pwd){
		
		$uidExists = uidExists($conn, $username);

		$result = mysqli_query($conn, "delete FROM loginattempt WHERE `timestamp` < (now() - interval 5 minute)");
		
        $ip = $_SERVER["REMOTE_ADDR"];
        $result = mysqli_query($conn, "SELECT COUNT(*) FROM loginattempt WHERE `ipaddress` LIKE '$ip' AND `timestamp` > (now() - interval 5 minute)");
		
		$count = mysqli_fetch_array($result, MYSQLI_NUM);

		if($count[0] >= 3){
		  header("location: ../login.php?error=toomanyattempts");
		  exit;
		}

		$pwdHashed = $uidExists["usersPwd"];
		
		$checkPwd = password_verify($pwd,$pwdHashed);

	
		if($uidExists === false){
				
				mysqli_query($conn, "INSERT INTO loginattempt (ipaddress ,timestamp)VALUES ('$ip',CURRENT_TIMESTAMP)");		
				header("location: ../login.php?error=wronglogin");
					exit();;
			}
		   else if ($checkPwd === true) {
					session_start();
					$_SESSION["userid"] = true;
					$_SESSION["useruid"] = true;
					header("location: ../index.php?error=validloginattempt");
					exit();
			
			}
			else{
				mysqli_query($conn, "INSERT INTO loginattempt (ipaddress ,timestamp)VALUES ('$ip',CURRENT_TIMESTAMP)");		
				header("location: ../login.php?error=wronglogin");
					exit();;
			
			}
		
	}
	

		 
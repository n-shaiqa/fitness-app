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
	function loginUser($conn,$username,$pwd){
		
		
		
		
		$result = mysqli_query($conn, "delete FROM loginattempt WHERE `timestamp` < (now() - interval 2 minute)");
		
        $ip = $_SERVER["REMOTE_ADDR"];
        $result = mysqli_query($conn, "SELECT COUNT(*) FROM loginattempt WHERE `ipaddress` LIKE '$ip' AND `timestamp` > (now() - interval 2 minute)");
		
		$count = mysqli_fetch_array($result, MYSQLI_NUM);

		if($count[0] >= 3){
		  header("location: ../login.php?error=toomanyattempts");
		  exit;
		}

		
		  $sql = "SELECT  * FROM users WHERE usersUid = '$username' AND usersPwd = '$pwd'";


			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				
			session_start();
			$_SESSION["userid"] = true;
			$_SESSION["useruid"] = true;
			header("location: ../index.php?error=validloginattempt");
			exit();
			
			}else{
				
				mysqli_query($conn, "INSERT INTO loginattempt (ipaddress ,timestamp)VALUES ('$ip',CURRENT_TIMESTAMP)");		
				header("location: ../login.php?error=wronglogin");
					exit();;
			}
		
		
	}
	

		 
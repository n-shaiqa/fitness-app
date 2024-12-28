<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		
		<meta charset="utf-8">
		<title> PHP Project 01</title>
		<link href="">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/stylesheet.css">
	</head>
	<body>
	
		<nav>
			<div class ="wrapper">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="discover.php">About Us</a></li>
					
					<?php
						if(isset($_SESSION["useruid"])){
							echo "<li><a href='bmrcalculate.php'>Calculate BMR</a></li>";
							echo "<li><a href='profile.php'>profile page</a></li>";
							echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
						}
						else{
							echo "<li><a href='signup.php'>Sign Up</a></li>";
							echo "<li><a href='login.php'>Log In</a></li>";
						}
					?>
				</ul>
			</div>
		</nav>
		
		
	<div class="wrapper">
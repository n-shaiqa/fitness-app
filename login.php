<?php
	include_once 'header.php';
?>
	
		<section class="signup-form">
			<h2>Log In</h2>
			<div class="signup-form-form">
			<form action="includes/login.inc.php" method="post">
			<link rel="stylesheet" href="css/stylesheet.css">
			
			<input type="text" name="uid" placeholder="Username/Email...">
			<input type="password" name="pwd" placeholder="Password...">
			<button type="submit" name="submit">Log In</button>
			
			</form>
			</div>
		</section>
<?php

	if(isset($_GET["error"])){
		if($_GET["error"] == "wronglogin"){
			echo "<p>incorrect login information!</p>";
		}
		else if($_GET["error"] == "emptylogin"){
			echo "<p>Fill all Fields!</p>";
		}
		else if($_GET["error"] == "stmtbrehfailed"){
			echo "<p>oops!</p>";
		}
		else if($_GET["error"] == "toomanyattempts"){
			echo "<p>Too many attempts, wait 5 minutes to retry!</p>";
		}
		
		
		
	}

?>	
<?php
	include_once 'footer.php';
?>

<?php
	include_once 'header.php';
?>
	
		<section class="signup-form">
			<h2>Sign Up</h2>
			<div class="signup-form-form">
			<form action="includes/signup.inc.php" method="post">
			
			<link rel="stylesheet" href="css/stylesheet.css">

			<input type="text" name="name" placeholder="Full name...">
			<input type="text" name="email" placeholder="Email...">
			<input type="text" name="uid" placeholder="Username...">
			<input type="password" name="pwd" placeholder="Password...">
			<input type="password" name="pwdrepeat" placeholder="Repeat password...">
			<div class="g-recaptcha" data-sitekey="6Leu3osdAAAAALjCfo8ZliAmnwQwWe0diGzVJPao"></div>
			
			<button type="submit" name="submit">Sign Up</button>

			</form>
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			</div>
		</section>
<?php

	if(isset($_GET["error"])){
		if($_GET["error"] == "emptyinput"){
			echo "<p>Fill in all fields!</p>";
		}
		else if($_GET["error"] == "invaliduid"){
			echo "<p>Choose a proper username!</p>";
		}
		else if($_GET["error"] == "invalidemail"){
			echo "<p>Choose a real Email!</p>";
		}
		else if($_GET["error"] == "passswordsdontmatch"){
			echo "<p>passwords do not match!</p>";
		}
		else if($_GET["error"] == "usernametaken"){
			echo "<p>Username already taken!</p>";
		}
		else if($_GET["error"] == "stmtfailed"){
			echo "<p>oops something went wrong, try again!</p>";
		}
		else if($_GET["error"] == "checkcaptcha"){
			echo "<p>Check Captcha!</p>";
		}
		else if($_GET["error"] == "none"){
			echo "<p>You have successfully signed up!</p>";
		}
	}

?>		
		
		
<?php
	include_once 'footer.php';
?>

<?php
include_once 'header.php';
?>
	
		<section class="index-intro">
		
		<?php
			if(isset($_SESSION["useruid"])){
				echo "<p>Welcome ". $_SESSION["useruid"] . " to Fitness Buddy Secure!</p>";
			}
		?>
			<h1>Fitness Buddy Secure is a Fantastic Choice for Weight Management</h1>
			<p>Here is an important paragraph that explains various activities...</p>
		</section>
		
		<section class="index-categories">
			<h2>Here are Three Activties You Can Use Fitness Buddy Secure for Today!</h2>
			<div class ="index-categories-list">
				<div>
				<h3>Weight Loss</h3>
				</div>
				<div>
				<h3>Weight Stability/Sustainability</h3>
				</div>
				<div>
				<h3>Weight Gain</h3>
				</div>
			</div>
		</section>
<?php
include_once 'footer.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- connecting to the css -->
		<link rel="stylesheet" href="../../css/styles.css"/> 
		<title> <?php echo $headingOfPage ?> </title>  <!-- displaying the title of the pages -->
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p>
			</aside>
			<h1>Fran's Furniture</h1>
		</section>
	</header>
	<nav>
		<!-- navigation bars -->
		<ul>
			<li><a href="../homePage">Home</a></li>
			<li><a href="../ourFurniture">Our Furniture</a></li>
			<li><a href="../about">About Us</a></li>
			<li><a href="../enquiryForm">Contact us</a></li>
			<li><a href="../faq">FAQs</a></li>
		</ul>
	</nav>
<img src="../../images/randombanner.php"/>

<!-- for displaying the navigation of the admin if only logged in -->
<main class="admin">
	<?php
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	?>
	<section class="left">
		<ul>
			<?php if($_SESSION['sessionBackUserId'] == 1){
					echo '<li><a href="admin_List">Admin</a></li>';}?> <!-- link for  managing admin -->
			<li><a href="categories_List">Categories</a></li> <!-- link for  managing categories -->
			<li><a href="furniture_List">Furniture</a></li> <!-- link for  managing furnitures -->
			<li><a href="enquiry_List">Enquiries</a></li> <!-- link for  managing enquiries -->
			<li><a href="offer_list">Offers</a></li> <!-- link for  managing offers -->
			<li><a href="logout">Logout</a></li> <!-- link for logging out -->
		</ul>
	</section>
		<?php } 
			else{
?>
<!-- logging form of the admin -->
<form action="admin_Home" method="POST">
		<fieldset>
			<legend align ="center"><img src ="../../images/adminlogo.png" alt="Adminlogo" style= "border-radius: 50%;height:100px;"></legend>
			<h2><center>Log in to your account</center></h2>
			
			<label>Username</label><br>
			<input type="username" name="userName" placeholder="Enter your username" required=""> <!-- field for username -->
			
			<label>Password</label><br>
			<input type="password" name="password" placeholder="Enter your password" required=""> <!-- field for password -->
			
			<input id="login_btn" type="submit" name="click_loginbtn" value="Log in"><br>
		</fieldset>
	</form>
	<?php } ?>
	<section class="right"><?php echo $contents ; ?></section> <!-- displaying the contents -->
		</main>
	<footer>
		&copy; Fran's Furniture <?php echo date ('Y'); ?> <!-- code for displaying year according to the year-->
	</footer>
</body>
</html>

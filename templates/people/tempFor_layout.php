<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/styles.css"/> <!-- linking the css-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- fa-fa search icon-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> <!-- linking the jquery-->
		<title> <?php echo $headingOfPage ?> </title> <!-- displays the heading of eah page-->
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
		<ul>
			<!-- navigation links-->
			<li><a href="homePage">Home</a></li>
    		<li><a href="ourFurniture">Our Furniture</a></li>
			<li><a href="about">About Us</a></li>
			<li><a href="enquiryForm">Contact us</a></li>
			<li><a href="faq">FAQs</a></li>
			<li><a href="admin/admin_Home">Admin</a></li> <!-- admin login-->
		</ul>
	</nav>
<img src="../images/randombanner.php"/>
	<?php echo $contents ?> <!-- displaying the contents of each page using different templates-->
	<footer>
		&copy; Fran's Furniture <?php echo date ('Y'); ?> <!-- code for displaying year according to the year-->
	</footer>
</body>
</html>

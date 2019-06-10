<?php
	session_start(); //it creates a session for calling the session save handlers of the templates.
		$_SESSION['message'] = '';
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //if and only logged in is true
		?>
		<!-- temlate for adding form of the admin -->
			<h2>Add Admin</h2>
			<form action="manage_Admin" method="POST"> 
			<fieldset>
			
			<label>Full Name</label>
			<input type="text" name="fullName" placeholder="Enter full name" required=""><!-- field for full name of the admin -->
			
			<label>Contact Number</label>
			<input type="text" name="contactNum" placeholder="Enter the contact number" required=""><!-- field for conatct number of the admin -->
			
			<label>Email</label>
			<input type="email" name="email" placeholder="Enter the email address" required=""><!-- field for email address of the admin -->
			
			<label>Username</label>
			<input type="text" name="userName" placeholder="Enter the username" required=""><!-- field for username of the admin -->  
			
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter password" required=""><!-- field for password of the admin --> 
			
			<label>Confirm Password</label>
			<input type="password" name="confpassword" required="" /><!-- field for confirming password of the admin -->
			
			<input type="submit" name="add_submitBtn" value="ADD"><!-- field for submit button  of the admin --> 
		</fieldset>
	</form>
		<?php
		}
	?>

  


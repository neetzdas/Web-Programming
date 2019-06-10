<?php
	session_start(); //it creates a session for calling the session save handlers.
	if(isset($_POST['click_loginbtn'])){ //cheking if the variable is set
		//selecting the contents of the admin table 
		$stmtForAdminLogin = $loggingIn->selectFunc('userName',$_POST['userName']);
		$rowOfAdmin = $stmtForAdminLogin->fetch(); //fetching from the prepared query
			if(password_verify($_POST['password'],$rowOfAdmin['password'])){ //if the password stored and inserted while logging in are same
			$_SESSION['sessionBackUserId'] = $rowOfAdmin['admin_id'];  //for setting the admin_id
			$_SESSION ['userName']=$_POST['userName']; //for fetching the username
			$_SESSION['loggedin'] = true; //for the consition if logged in
		}
		else{
			echo'<h5>Sorry! You cannot log in. Please check if the username or password is wrong.</h5>'; //error message
		}
	}
	//if and only logged in is true, diplay the contents
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	?>
	<center><h2>HELLO <?php echo $_SESSION ['userName']; ?>!<br><br> <marquee>YOU ARE NOW LOGGED IN.</marquee></h2></center>
	<!-- for the date, day and time -->
	<li style="list-style: none; float: right;"><?php
        			date_default_timezone_set("Asia/Kathmandu"); 
					echo "It's ".date("h:i:s a") ."<br><br>";  
					echo "<b>" .date("Y/m/d") ." , " ."</b>";
					echo date(' l');?>
	</li>
	<?php
}
?>
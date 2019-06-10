<?php
	$headingOfPage = "Fran's Furniture - Admin Home"; ////is the heading of the running page of the site
	$admin_Login = new FromDatabase('tab_of_admin'); //get the contents from admin table for logging in 
	$contents = loadTemplate('../../templates/admin/tempFor_adminHome.php',['loggingIn'=>$admin_Login]);  //contents to be displayed from the respective template

?>

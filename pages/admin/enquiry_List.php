<?php
	$headingOfPage ="Fran's Furniture - Enquiries List"; //title of the page 
	$enquiryTab = new FromDatabase('tab_of_enquiry'); //for list of enquiries left to be checked
	$adminTab = new FromDatabase('tab_of_admin'); //for list of admins to reply the enquiries 

//variables for the displaying enquiries
	$tempVars = [
  	'enquiry_list'=>$enquiryTab,
  	'admin_sel'=>$adminTab,
  	'updateStmt'=>$enquiryTab
  ];

$contents = loadTemplate('../../templates/admin/tempFor_enquiries.php',$tempVars);
?>
<?php
	$headingOfPage = "Fran's Furniture - Replied Enquiries"; //title of the current page
	$enquiryTab = new FromDatabase('tab_of_enquiry'); //for the replied enquiry list
	$adminTab = new FromDatabase('tab_of_admin'); //from the admin table

//variables for the replied enquiries and who checked them
	$tempVars =[
		'checkedMsgStmt'=>$enquiryTab,
		'admin_list'=>$adminTab,
		'loggingIn'=>$adminTab
	];

$contents = loadTemplate('../../templates/admin/tempFor_compMsg.php',$tempVars);
?>
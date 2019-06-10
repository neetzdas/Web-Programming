<?php
	$headingOfPage = "Fran's Furniture - Categories List"; //heading of the respective pages
	$categoryTab = new FromDatabase('category'); //for list of categories from the category table
	$contents = loadTemplate('../../templates/admin/tempFor_categories.php',['select_category'=>$categoryTab]);
//contents to be displayed from the respective template
?>


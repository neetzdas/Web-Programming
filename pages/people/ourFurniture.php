<?php
	$headingOfPage = "Fran's Furniture - Our Furniture"; //heading is 'Our Furniture' for the page
	$get_furniture = new FromDatabase('furniture'); //getting the details from furniture table using class
	$categoryTab = new FromDatabase('category'); //getting the details from category table using class
	
	//variables for displaying furnitures
	$varsOf =[
		'get_furniture' => $get_furniture,
		'categoryQuery' => $categoryTab
	];
	//contents for displaying furniture and their details from our Furniture template
	$contents = loadTemplate('../templates/people/tempFor_ourFurniture.php',$varsOf);
?>
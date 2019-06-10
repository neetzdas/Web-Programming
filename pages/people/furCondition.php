<?php
	$headingOfPage = "Fran's Furniture - Our Furniture"; //heading for the page
	$get_furniture = new FromDatabase('furniture'); //furniture table from the database
	$categoryTab = new FromDatabase('category'); //category table from the database

//variavles for the condition of the furniture
	$tempVars =[
		'get_furniture' => $get_furniture,
		'categoryQuery' => $categoryTab
	];

	//contents of the furniture condition template 
	$contents = loadTemplate('../templates/people/tempFor_furCondition.php',$tempVars);
?>

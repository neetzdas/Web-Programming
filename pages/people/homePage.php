<?php
	$headingOfPage = "Fran's Furniture - Home Page"; //heading of the homepage of the site
	$get_offer = new FromDatabase('tab_of_offer');//from offer table of the database of the phpmyadmin
	$category = new FromDatabase('category'); //category table of the database from phmyadmn

//variables for displaying contents in the homepage
	$varsOf =[
		'get_offer' => $get_offer,
		'categoryQuery' => $category
	];
	//contents to be displayed from the index template
	$contents = loadTemplate('../templates/people/tempFor_index.php', $varsOf);
?>
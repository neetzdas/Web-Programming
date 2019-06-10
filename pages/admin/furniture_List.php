<?php
	$headingOfPage = "Fran's Furniture - Furniture List"; //title of the page
	$furnitureTab = new FromDatabase('furniture'); //for the list of furnitures
	$contents = loadTemplate('../../templates/admin/tempFor_furniture.php',['select_furniture'=>$furnitureTab]);
//list of tables displayed.
?>


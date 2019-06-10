<?php
$headingOfPage = "Fran's Furniture - Add Furniture"; //is the heading of the running page of the site
$adding_furniture = new FromDatabase('furniture'); // furniture table from the database table using class 
$categoryTab = new FromDatabase('category'); //category table from the database table using class

//after clicking the add submit button 
	if (isset($_POST['add_submitBtn'])) {
		if($_POST['name'] == "" || $_POST['description'] == "") {
			echo "All the fields in the form are not filled!";
		} //to fill the required fields 
		else{
	    unset($_POST['add_submitBtn']);
	    $adding_furniture->saveFunc($_POST); //saving the values of the fields

//for uploading the imaga using imageUpload function 
		if ($_FILES['image']['error'] == 0) { //uses the last insert id here
			$fileName = $adding_furniture->imageUpload() . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../../images/furniture/' . $fileName); //uploads the image from the temp file
		}
		
		header('location:furniture_List');
	}
}
//variables for adding the furniture
	$tempVars = [
		'adding_furniture' => $adding_furniture,		
		'categoryQueryStmt' => $categoryTab
	];
$contents = loadTemplate('../../templates/admin/tempFor_addFurniture.php',$tempVars); //contents to be displayed from the respective template
	?>
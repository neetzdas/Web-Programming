<?php
	$headingOfPage = "Fran's Furniture - Save Category"; //title of the page of saving category
	$managing_category = new FromDatabase('category'); 

//editing the category from tha databasse
	if(isset($_GET['edit_Id'])){ 
		$currentCategory = $managing_category->selectFunc('id' , $_GET['edit_Id']); //getting edit id from the category to be edited
		$rowOfCategory=$currentCategory->fetch();
	}
	else{
		$rowOfCategory =[];
	}

//after clicking the submit button
	if (isset($_POST['submitBtn'])) {
		$properTest = saveFuncCategory($_POST); //function used from testing to save the details 
		//if and only test is true
		if($properTest == true){
			$criteriaForCat = [
			'id' => $_POST['id'],
			'name' => $_POST['name']
		];
		$managing_category->saveFunc($criteriaForCat,'id'); //saving the details of the added or edited category
		}
		header('location:categories_List');
	}

//for deletion of the category
	if (isset($_GET['del_Id'])) {
			$deletecategoryStmt = $managing_category->deleteFunc('id', $_GET['del_Id']); //deleting the category after getting the delete id from the respective category
			echo "<script>alert('Category Deleted!');
			window.location.href='categories_List';</script>";
		}
	//contents displayed fo managing the categoy by adding, editing or deleting it
	$contents = loadTemplate('../../templates/admin/tempFor_manageCategory.php',['rowOfCategory'=>$rowOfCategory]);
?>


<?php
	$headingOfPage = "Fran's Furniture - Add Offer"; //is the heading of the running page of the admin site
	$select_Furniture = new FromDatabase('furniture'); //furniture table from the database table using class 
	$managing_Offer = new FromDatabase('tab_of_offer'); //offer table of the database
	$categoryTab = new FromDatabase('category'); //category table of the database

//after getting the edit id from the furniture to add the existing furniture as offer
	if(isset($_GET['editOf_id'])){
		$furnitureStmt = $select_Furniture->selectFunc('id', $_GET['editOf_id']); //get the edit id
		$rowOfOffer=$furnitureStmt->fetch(); //fetching the id to the rowOfOffer
	}
	else{
	$rowOfOffer =[];
	}

//after clicking the submi button 
	if (isset($_POST['submit_btn'])) {
		$properTest = saveFuncOffer($_POST); //from the function testing of adding and editing offer using only a form

//if only the testing is true, the offer is added or edited.
		if($properTest == true){
			$criteriaOfOffer = [
				'name' => $_POST['name'],
				'categoryId' => $_POST['categoryId'],
				'description' => $_POST['description'],
				'price' => $_POST['price'],
				'postedDate'=>$_POST['postedDate'],
				'endingDate' => $_POST['endingDate']
			];

			$managing_Offer->saveFunc($criteriaOfOffer);

//for uploading the image to the offer
			if ($_FILES['image']['error'] == 0) {
				$fileName = $managing_Offer->imageUpload() . '.jpg';
				move_uploaded_file($_FILES['image']['tmp_name'], '../../images/offer/' . $fileName); //uploads the image for the offers from the temp file.
			}
			echo ' Added as Special Offer!';
    		header('location:offer_list');
    	}
    }

//for deleting the offer after getting the delete id of the offer
	if(isset($_GET['del_Id'])) {
		$deleteOfferStmt = $managing_Offer->deleteFunc('offer_id', $_GET['del_Id']); //to delete the offer
		echo 'Offer Deleted!';
		header('Location:offer_list');
	}

//variables to add an offer or edit the furniture as an offer
	$tempVars=[
		'select_Furniture'=>$select_Furniture,
		'categoryQueryStmt'=>$categoryTab,
		'rowOfOffer'=> $rowOfOffer
	];

	$contents = loadTemplate('../../templates/admin/tempFor_manageOffer.php', $tempVars);  //contents to be displayed from the respective template
?>
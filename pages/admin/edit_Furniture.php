<?php
	$headingOfPage = "Fran's Furniture - Edit Furniture"; //title of the edit furniture page
	$editing_Furniture = new FromDatabase('furniture'); //from the furniture table using class
	$categoryTab = new FromDatabase('category'); //from the category table using class

//after clicking the edit button
	if (isset($_POST['edit_submitBtn'])) {
		//variables for editing the furniture
		$criteriaForEdit = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'price' => $_POST['price'],
			'categoryId' => $_POST['categoryId'],
			'fur_condition' => $_POST['fur_condition'],
			'id' => $_POST['id']
		];

		$furnitureStmt = $editing_Furniture->saveFunc($criteriaForEdit, 'id'); //saving the values after editing

//image editing code
		if ($_FILES['image']['error'] == 0) {
			$fileName = $_POST['id'] . '.jpg';
			move_uploaded_file($_FILES['image']['tmp_name'], '../../images/furniture/' . $fileName);
		}

		header('location:furniture_List');

	}

//code for hiding the furniture whenever required
	if (isset($_GET['hide_Id'])) { //getting the id from the furniture that needs to be hidden
		$criteriaForHide = [
            'statusForHide' => 1,
             'id' =>$_GET['hide_Id']
         ];

         $editing_Furniture->updateFunc($criteriaForHide,'id'); //updated after hidden
         echo "<script>alert('Furniture Hidden!');
         window.location.href='furniture_List';</script>";
     }
  //code for displaying the furniture whenever required after hiding   
     else if(isset($_GET['show_Id'])){ //getting the id from the furniture that needs to be displayed after being hidden
     	$criteriaForShow = [
            'statusForHide' => 0,
            'id' =>$_GET['show_Id']
        ];

		$editing_Furniture->updateFunc($criteriaForShow,'id'); //updated after displayed
		echo "<script>alert('Furniture Shown!');
    	window.location.href='furniture_List';</script>";
    }

//code for deleting the furniture 
    if (isset($_GET['del_Id'])) { //gets the delete id of the furniture which needs to be deleted
		$deleteFurniureStmt = $editing_Furniture->deleteFunc('id', $_GET['del_Id']); //deleting
		echo "<script>alert('Furniture Deleted!');
		window.location.href='furniture_List';</script>";
	}
	
//variables for editing, hiding, unhiding and delete furnitures	
	$tempVars=[
	'select_Furniture'=>$editing_Furniture, 
	'editing_Furniture'=>$editing_Furniture,
	'categoryQueryStmt'=>$categoryTab
];

$contents = loadTemplate('../../templates/admin/tempFor_editFurniture.php', $tempVars);

	?>

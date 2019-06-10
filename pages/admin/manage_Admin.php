<?php
	$headingOfPage = "Fran's Furniture - Add Admin"; //title of the page
	$managing_Admin = new FromDatabase('tab_of_admin');

//after clicking the add submit button
	if (isset($_POST['add_submitBtn'])) { 
		if($_POST['password'] == $_POST['confpassword']){ //for confirming password
			$user_Validation = $managing_Admin->validatingFunc('userName',$_POST['userName']); //validating the username to reduce the duplicacy in the username
		    $row = $user_Validation->fetch();

		    if($row['row'] > 0 ){
		    	echo "Duplicate username!!"; //error messsage
		  	}
		  	//variables for adding admin
		  	else{
		  		$criteriaForAdmin =[
		            'fullName'=> $_POST['fullName'],
		            'contactNum' => $_POST['contactNum'],
		            'userName' => $_POST['userName'],
		            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT), //for hash password
		            'email' => $_POST['email']
		        ];
		          
			   	$managing_Admin->saveFunc($criteriaForAdmin); //saving the details of the added admin
			   	echo 'Admin Added';
			   	header('Location:admin_List');
			}
		}
		else{
			echo "Passwords do not match"; //error message for not matching the password
		}
	}

//after getting delete i from the admin the admi is deleted. 
	if (isset($_GET['del_Id'])) {
		$admindeleteStmt= $managing_Admin->deleteFunc('admin_id', $_GET['del_Id']); //deleting function used
		echo "<script>alert('Admin Deleted!');
		window.location.href='admin_List';</script>";
	}

//variables for adding and deleting admin
	$tempVars =[
		'managing_Admin'=>$managing_Admin
	];
	
	//contents to be displyed from manage admin template
	$contents = loadTemplate('../../templates/admin/tempFor_manageAdmin.php',$tempVars);
?>

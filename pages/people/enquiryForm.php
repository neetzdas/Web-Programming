<?php
$headingOfPage = "Fran's Furniture - Enquiry Form"; //title of the enquiry form displaying page
$enquirySave = new FromDatabase('tab_of_enquiry'); //save the form in the enquiry table of he database

//after submitting te form
if (isset($_POST['enquirySubmit'])) {
	unset($_POST['enquirySubmit']);
	$enquirySave->saveFunc($_POST); //saved in the database and in the admin area

	echo "<script>alert('Enquiry Sent Sucessfully!');</script>";
}

//contents from the enquiry template 
$contents = loadTemplate('../templates/people/tempFor_enquiry.php',['enquirySave'=> $enquirySave]);
?>

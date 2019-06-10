<!-- function for testing the submit form of the enquiry -->
<?php
	function testEnquirySubmit($enquiryVars) {
	     $properTest = true;
	     if ($enquiryVars['firstName'] == '') {
	        $properTest = false;
	     }

	     if ($enquiryVars['familyName'] == '') {
	        $properTest = false;
	     }
	     if ($enquiryVars['contactNum'] == '') {
	        $properTest = false;
	     }
	     if ($enquiryVars['email'] == '') {
	        $properTest = false;
	     }

	     if ($enquiryVars['enquiryMsg'] == '') {
	        $properTest = false;
	     }
	     return $properTest; 
	} 
?>
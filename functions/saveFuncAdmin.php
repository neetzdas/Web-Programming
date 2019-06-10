<!-- function for testing the form of the admin -->
<?php
	function saveFuncAdmin($adminVars) {
	     $properTest = true;
	     if ($adminVars['fullName'] == '') {
	        $properTest = false;
	     }
	     if ($adminVars['contactNum'] == '') {
	        $properTest = false;
	     }
	     if ($adminVars['email'] == '') {
	        $properTest = false;
	     }
	     
	     if ($adminVars['userName'] == '') {
	        $properTest = false;
	     }

	     if ($adminVars['password'] == '') {
	        $properTest = false;
	     }
	     return $properTest; 
	} 
?>
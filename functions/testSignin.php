<!-- function for testing the login of the admin -->
<?php
	function testSignin($signinForm){
		$properLogin = true;
		if($signinForm['userName'] == ''){
			$properLogin = false;
		}
		if($signinForm['password'] == ''){
			$properLogin = false;
		}
		return $properLogin;
	}
?>
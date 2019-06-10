<!-- test of the signing in of the admin -->
<?php
require 'functions/testSignin.php'; //linking to the function testing of the signin form of the administrator 
class signinFormTest extends \PHPUnit_Framework_TestCase {
	public function setUp() { //setting up
		}
		//for invalid values of the signin  form
		public function testSigninname(){
			$signinForm = [
				'userName' => '',
				'password' => ''
			];
			$properLogin = testSignin($signinForm);
			$this->assertFalse($properLogin);
		}
		//for invalid value of the username
		public function testSigninUsername(){
			$signinForm = [
				'userName' => '',
				'password' => 'hellosuper'
			];
			$properLogin = testSignin($signinForm);
			$this->assertFalse($properLogin);
		}
		//for invalid value of the password
		public function testSigninPassword(){
			$signinForm = [
				'userName' => 'Okay',
				'password' => ''
			];
			$properLogin = testSignin($signinForm);
			$this->assertFalse($properLogin);
		}
		//for valid values of the signin form
		public function testSigninValid(){
			$signinForm = [
				'userName' => 'Okay',
				'password' => 'hellosuper'
			];
			$properLogin = testSignin($signinForm);
			$this->assertTrue($properLogin);
		}
	}
?>
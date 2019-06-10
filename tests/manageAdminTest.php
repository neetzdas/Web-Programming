<!-- test of the admin form -->
<?php
	require 'functions/saveFuncAdmin.php'; //linking to the function of the admin test
	class manageAdminTest extends \PHPUnit_Framework_TestCase {
		public function setUp() { //setting up

		}
		//for invalid admin values
		public function testInValidAdmin(){
			$adminVars = [
				'fullName' => '',
				'contactNum' => '',
				'email' => '',
				'userName' => '',
				'password' => ''
			];
			$properTest = saveFuncAdmin($adminVars);
			$this->assertFalse($properTest);
		}
		//for invalid admin name
		public function testInValidAdminName(){
			$adminVars = [
				'fullName' => '',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'userName' => '',
				'password' => 'hellosuper'
			];
			$properTest = saveFuncAdmin($adminVars);
			$this->assertFalse($properTest);
		}
		//for invalid admin contact number
		public function testInValidAdminNumber(){
			$adminVars = [
				'fullName' => 'Neeraj Das',
				'contactNum' => '',
				'email' => 'neeraj@gmail.com',
				'userName' => '',
				'password' => 'hellosuper'
			];
			$properTest = saveFuncAdmin($adminVars);
			$this->assertFalse($properTest);
		}
		//for invalid admin email address
		public function testInValidAdminEmail(){
			$adminVars = [
				'fullName' => 'Neeraj Das',
				'contactNum' => '9845678789',
				'email' => '',
				'userName' => 'neetu',
				'password' => 'hellosuper'
			];
			$properTest = saveFuncAdmin($adminVars);
			$this->assertFalse($properTest);
		}
		//for invalid admin username
		public function testInValidUsername(){
			$adminVars = [
				'fullName' => 'Neeraj Das',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'userName' => '',
				'password' => 'hellosuper'
			];
			$properTest = saveFuncAdmin($adminVars);
			$this->assertFalse($properTest);
		}
		//for invalid admin password
		public function testInValidAdminPassword(){
			$adminVars = [
				'fullName' => 'Neeraj Das',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'userName' => 'Okay',
				'password' => ''
			];
			$properTest = saveFuncAdmin($adminVars);
			$this->assertFalse($properTest);
		}
		//for valid values of the admin
		public function testAdminValid(){
			$adminVars = [
				'fullName' => 'Neeraj Das',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'userName' => 'Okay',
				'password' => 'hellosuper'
			];
			$properTest = saveFuncAdmin($adminVars);
			$this->assertTrue($properTest);
		}
	}
?>
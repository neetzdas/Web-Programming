<!-- tests for the category form  -->
<?php
	require 'functions/saveFuncCategory.php'; //linking the function of category form test
	class categoryTest extends \PHPUnit_Framework_TestCase {
		//setting up
		public function setUp() {

		}
		//for invalid category name
		public function testInvalidCategoryname(){
			$categoryVars = [
				'name' => '',
				
			];
			$properTest= saveFuncCategory($categoryVars);
			$this->assertFalse($properTest);
		}
		//for valid category name
			public function testValidCategory(){
			$categoryVars = [
				'name' => 'Dressers',				
			];
			$properTest= saveFuncCategory($categoryVars);
			$this->assertTrue($properTest);
		}
}
?> 
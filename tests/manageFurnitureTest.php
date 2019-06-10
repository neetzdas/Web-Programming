<!-- test of the furniture form -->
<?php
	require 'functions/saveFuncFurniture.php'; //linking to the function of the furniture form test
	
	class manageFurnitureTest extends \PHPUnit_Framework_TestCase
	{
		public function setUp(){//setting up
	
		}
		//for invalid values of the furniture
		public function testInvalidFurniture(){
			$furVars =[
				'name' => '',
				'description' => '',
				'price' => '',
				'categoryId' => '',
				'fur_condition' => ''
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for invalid furniture name of the furniture
		public function testInvalidFurName(){
			$furVars =[
				'name' => '',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '5',
				'fur_condition' => 'NEW'
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for invalid description of the furniture
		public function testInvalidFurDesc(){
			$furVars =[
				'name' => 'White Dresser',
				'description' => '',
				'price' => '900.12',
				'categoryId' => '5',
				'fur_condition' => 'NEW'
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for invalid price of the furniture
		public function testInvalidFurPrice(){
			$furVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '',
				'categoryId' => '5',
				'fur_condition' => 'NEW'
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for invalid category id of the furniture
		public function testInvalidFurCatId(){
			$furVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '',
				'fur_condition' => 'NEW'
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for invalid condition of the furniture
		public function testInvalidFurCondition(){
			$furVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '5',
				'fur_condition' => ''
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for invalid two blanks
		public function testInvalidFurTwo(){
			$furVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '2',
				'fur_condition' => ''
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for invalid four blank 
		public function testInvalidFurFour(){
			$furVars =[
				'name' => '',
				'description' => 'Nice Dresser',
				'price' => '',
				'categoryId' => '',
				'fur_condition' => 'NEW'
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertFalse($properTest);
		}
		//for Valid values of the furniture
		public function testValidFurniture(){
			$furVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '5',
				'fur_condition' => 'NEW'
			];
			$properTest = saveFuncFurniture($furVars);
			$this->assertTrue($properTest);
		}

	}
?>
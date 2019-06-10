<!-- test of the offer form -->
<?php
	require 'functions/saveFuncOffer.php'; //linking to the function testing of the offer form
	class manageOfferTest extends \PHPUnit_Framework_TestCase
	{
		public function setUp(){ //setting up
	
		}
		//for invalid values of the offer
		public function testInvalidOffer(){
			$offerVars =[
				'name' => '',
				'description' => '',
				'price' => '',
				'categoryId' => '',
				'postedDate' => '',
				'endingDate' =>''
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for invalid value of the offer name
		public function testInvalidofferName(){
			$offerVars =[
				'name' => '',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '5',
				'postedDate' => '05-09-2019',
				'endingDate' =>'06-09-2019'
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for invalid value of the offer description
		public function testInvalidofferDesc(){
			$offerVars =[
				'name' => 'White Dresser',
				'description' => '',
				'price' => '900.12',
				'categoryId' => '5',
				'postedDate' => '05-09-2019',
				'endingDate' =>'06-09-2019'
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for invalid value of the offer price
		public function testInvalidofferPrice(){
			$offerVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '',
				'categoryId' => '5',
				'postedDate' => '05-09-2019',
				'endingDate' =>'06-09-2019'
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for invalid value of the offer category id
		public function testInvalidofferCatId(){
			$offerVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '',
				'postedDate' => '05-09-2019',
				'endingDate' =>'06-09-2019'
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for invalid value of the offer posted date
		public function testInvalidOfferDate(){
			$offerVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '5',
				'postedDate' => '',
				'endingDate' =>'06-09-2019'
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for invalid value of the offer left two blank
		public function testInvalidofferTwo(){
			$offerVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '2',
				'postedDate' => '',
				'endingDate' =>'06-09-2019'
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for invalid value of the offer left three blank
		public function testInvalidofferFour(){
			$offerVars =[
				'name' => '',
				'description' => 'Nice Dresser',
				'price' => '',
				'categoryId' => '',
				'postedDate' => '05-09-2019',
				'endingDate' =>''
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertFalse($properTest);
		}
		//for valid values of the offer
		public function testValidOffer(){
			$offerVars =[
				'name' => 'White Dresser',
				'description' => 'Nice Dresser',
				'price' => '900.12',
				'categoryId' => '5',
				'postedDate' => '05-09-2019',
				'endingDate' =>'06-09-2019'
			];
			$properTest = saveFuncOffer($offerVars);
			$this->assertTrue($properTest);
		}

	}
?>
<!-- test of the enquiry form -->
<?php
	require 'functions/testEnquirySubmit.php'; //linking to the function testing of the enquiry form
	class submitEnquiryTest extends \PHPUnit_Framework_TestCase {
		public function setUp() {//setting up

		}
		//test for invalid values of the enquiry form 
		public function testInValidEnquiry(){
			$enquiryVars = [
				'firstName' => '',
				'familyName' => '',
				'contactNum' => '',
				'email' => '',
				'enquiryMsg' => ''
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for invalid value of name of the messenger 
			public function testInValidEnquiryName(){
			$enquiryVars = [
				'firstName' => '',
				'familyName' => 'Collision',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'enquiryMsg' => 'Wow! Nice site'
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for invalid value of contact number of the messenger 
		public function testInValidNumber(){
			$enquiryVars = [
				'firstName' => 'Rebecca',
				'familyName' => 'Collision',
				'contactNum' => '',
				'email' => 'neeraj@gmail.com',
				'enquiryMsg' => 'Wow! Nice site'
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for invalid value of email address of the messenger 
		public function testInValidEmail(){
			$enquiryVars = [
				'firstName' => 'Rebecca',
				'familyName' => 'Collision',
				'contactNum' => '9845678789',
				'email' => '',
				'enquiryMsg' => 'Wow! Nice site'
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for invalid value of lastname of the messenger 
		public function testInValidSurname(){
			$enquiryVars = [
				'firstName' => 'Rebecca',
				'familyName' => '',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'enquiryMsg' => 'Wow! Nice site'
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for invalid value of enquiry message 
		public function testInValidEnquiryMsg(){
			$enquiryVars = [
				'firstName' => 'Rebecca',
				'familyName' => 'Collision',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'enquiryMsg' => ''
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for invalid value of form two blanks left
		public function testInValidTwo(){
			$enquiryVars = [
				'firstName' => '',
				'familyName' => 'Collision',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'enquiryMsg' => ''
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for invalid value of dorm three blanks left
		public function testInValidThree(){
			$enquiryVars = [
				'firstName' => 'Rebecca',
				'familyName' => '',
				'contactNum' => '',
				'email' => 'neeraj@gmail.com',
				'enquiryMsg' => ''
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertFalse($properTest);
		}
		//test for valid values of the form 
		public function testEnquiryValid(){
			$enquiryVars = [
				'firstName' => 'Rebecca',
				'familyName' => 'Collision',
				'contactNum' => '9845678789',
				'email' => 'neeraj@gmail.com',
				'enquiryMsg' => 'Wow! Nice site'
			];
			$properTest = testEnquirySubmit($enquiryVars);
			$this->assertTrue($properTest);
		}
	}
?>
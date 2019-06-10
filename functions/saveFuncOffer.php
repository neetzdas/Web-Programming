<!-- function used for testing the add offer and edit furniture as offer form  -->
<?php
	function saveFuncOffer($offerVars){
		$properTest = true;
		if($offerVars['name'] == ''){
			$properTest= false;
		}
		if($offerVars['description'] == ''){
			$properTest= false;
		}
		if($offerVars['price'] == ''){
			$properTest= false;
		}
		if($offerVars['categoryId'] == ''){
			$properTest= false;
		}
		if($offerVars['postedDate'] == ''){
			$properTest= false;
		}
		if($offerVars['endingDate'] == ''){
			$properTest= false;
		}
		return $properTest;
	}
?>
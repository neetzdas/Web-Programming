<!-- function to test the add and edit form of the furniture -->
<?php
	function saveFuncFurniture($furVars){
		$properTest = true;
		if($furVars['name'] == ''){
			$properTest= false;
		}
		if($furVars['description'] == ''){
			$properTest= false;
		}
		if($furVars['price'] == ''){
			$properTest= false;
		}
		if($furVars['categoryId'] == ''){
			$properTest= false;
		}
		if($furVars['fur_condition'] == ''){
			$properTest= false;
		}
		return $properTest;
	}
?>
<!-- function to test the add and edit form of the category -->
 <?php
	function saveFuncCategory($categoryVars){
		$properTest = true;
		if ($categoryVars['name'] == '') {
			$properTest = false;
		}
		return $properTest;
	}
?>